<?php
namespace Agi\Action;

use IvozProvider\Model as Model;
use IvozProvider\Mapper\Sql as Mapper;

class FaxCallAction extends RouterAction
{
    protected $_timeout;
    
    protected $_dialStatus = null;
    
    protected $_dialContext = 'fax-in';
    
    protected $_processDialStatus = true;
    
    protected $_fax = null;
    
    protected $_faxInOut = null;

    public function setTimeout($timeout)
    {
        $this->_timeout = $timeout;
        return $this;
    }
    
    public function setDialContext($context)
    {
        $this->_dialContext = $context;
        return $this;
    }
    
	public function setProcessDialStatus($process)
	{
	    $this->_processDialStatus = $process;
	    return $this;
	}
	
	public function getDialStatus()
	{
	    return $this->_dialStatus;
	}
	
	public function setFax($fax)
	{
	    $this->_fax = $fax;
	    return $this;
	}
	
	public function setFaxInOut($faxInOut)
	{
	    $this->_faxInOut = $faxInOut;
	    return $this;
	}
	
  	public function call()
    {
  	    if (empty($this->_fax)) {
  	        $this->agi->error("fax is not properly defined. Check configuration.");
  	        $this->_dialStatus = "INVALIDARGS";
  	        $this->processDialStatus();
            return;
  	    }

        // Local variables to improve readability
  	    $fax = $this->_fax;

        // This fax routed from DDI
        $did = $this->agi->getExtension();

        // Fax location is lbased on asterisk configuration
        $faxdir = $this->agi->getVariable(
                        "AST_CONFIG(asterisk.conf,directories,astspooldir)");
  	    
        // Set destination file an fax options
        $this->agi->setVariable("FAXFILE",
                        $faxdir . "/faxes/fax-" . $did . "-" . time() . ".tif");
        $this->agi->setVariable("FAXOPT(headerinfo)", $fax->getName());
        $this->agi->setVariable("FAXOPT(localstationid)", $did);

        // Create a new items for received fax data
        $faxIn = new Model\FaxesInOut();
        $faxIn->setFaxId($fax->getId())
            ->setSrc($this->agi->getVariable("CALLERID(number)"))
            ->setDst($did)
            ->setType("In")
            ->setStatus("inprogress")
            ->save();

        // Store FaxId for later searchs
        $this->agi->setVariable("FAXIN_ID", $faxIn->getId());

        // Some verbose dolan pls
        $this->agi->verbose("Incoming fax from %d did. Preparing fax to send to %s)", 
                   $did,$fax->getName());
        
        // Redirect to the calling dialplan context
        if ($this->_dialContext) {
            $this->agi->redirect($this->_dialContext, $did);
        }
    }
    
    public function sendFax()
    {
        if (empty($this->_fax) || empty($this->_faxInOut)) {
            $this->agi->error("fax is not properly defined. Check configuration.");
            return;
        }
    
        // Local variables to improve readability
        $fax = $this->_fax;
        $faxOut = $this->_faxInOut;
         
        // Prepare to call destination
        $DDIOut = $fax->getOutgoingDDI();

        // Fax without assigned DDIout
        if (! $DDIOut) {
            $this->agi->error("Fax " . $fax->getId() . "does not have DDIOut");
            $faxOut->setStats("error")->save();
            $this->agi->hangup();
            return;
        }

        // Set headers to place the outgoing call
        $this->agi->setVariable("CALLERID(num)", $DDIOut->getDDI());
        $this->agi->setVariable("CALLERID(name)", $fax->getName());    

        $faxOut->setStatus("inprogress")->save();
        
    }
    
    public function processDialStatus()
    {
        //! Requested no to parse dialo status
        if (!$this->_processDialStatus) {
            return; 
        }
        
        if (empty($this->_fax) || empty($this->_faxInOut)) {
            $this->agi->error("fax is not properly defined. Check configuration.");
            return;
        }
        
        // Local variables to improve readability
        $fax = $this->_fax;
        $faxIn = $this->_faxInOut;
        
        // Check no errors happened during ReceiveFax
        $error = $this->agi->getVariable("FAXOPT(error)");
        $statusstr = $this->agi->getVariable("FAXOPT(statusstr)");
        if (! empty($error) && $statusstr != "OK") {
            // Show error message in asterisk CLI
            $this->agi->error("Error receiving fax: $statusstr ($error)");
            // Mark this fax as error and save
            $faxIn->setStatus('error')->save();
            return;
        }
        
        // Get final PDF name
        $faxTIF = $this->agi->getVariable("FAXOPT(filename)");
        $faxPDF = str_replace(".tif", ".pdf", $faxTIF);
        if (! file_exists($faxTIF)) {
            // Show error message in asterisk CLI
            $this->agi->error("File $faxTIF does not exists.");
            // Mark this fax as error and save
            $faxIn->setStatus('error')->save();
            return;
        }
        
        // Some asterisk cli output
        $this->agi->verbose("Converting Fax [faxInOut%d] [fax%d] TIFF to PDF", $faxIn->getId(), $fax->getId());
        // Convert TIF file to PDF before storing
        $output = shell_exec("/usr/bin/tiff2pdf -o $faxPDF $faxTIF 2>/dev/null");
        // TODO Check return value for errors (use exec instead of shell_exec?)
        // Remove received tif file after conversion
        $this->agi->verbose("bORRANDO FAX");
        unlink($faxTIF);
        $this->agi->verbose("fAX BORRADO haora hay que enviar el mail????? %s ????",$fax->getSendByEmail());
        // Check if this fax is associated with an email address
        if ($fax->getSendByEmail()) {
            $this->agi->verbose("Sending Fax [faxInOut%d] to %s", $faxIn->getId(), $fax->getEmail());
            
            // Get faxdata values for mail message body and subject
            $faxSrc = $faxIn->getSrc();
            $faxDst = $faxIn->getDst();

            // Create attachment for PDF file
            $att = new \Zend_Mime_Part(file_get_contents($faxPDF));
            $att->type = "application/pdf";
            $att->disposition = \Zend_Mime::DISPOSITION_ATTACHMENT;
            $att->encoding = \Zend_Mime::ENCODING_BASE64;
            $att->filename = "fax-$faxSrc-$faxDst.pdf";
            
            // Create an email for destination and send it
            $mail = new \Zend_Mail();
            $mail->setBodyText(
                    "New fax received in $faxDst.\nSee attached PDF file.")
                    ->setFrom("fax@as001.oasis-dev.irontec.com")
                    ->addTo($fax->getEmail())
                    ->setSubject("New fax received in $faxDst from $faxSrc")
                    ->addAttachment($att)
                    ->send();
        }

        // Store fax pages
        $faxIn->setPages($this->agi->getVariable("FAXOPT(pages)"));
        // Store FSO for this fax
        $faxIn->putFile($faxPDF);
        // Success!!
        $faxIn->setStatus('completed')->save();
        $this->agi->verbose("Fax [faxInOut%d] completed (%d pages)", $faxIn->getId(), $faxIn->getPages());
    }
}
