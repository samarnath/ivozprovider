<?php

namespace Core\Domain\Model\Invoice;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Invoice
 */
class Invoice implements EntityInterface, InvoiceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var \DateTime
     */
    protected $inDate;

    /**
     * @var \DateTime
     */
    protected $outDate;

    /**
     * @var string
     */
    protected $total;

    /**
     * @var string
     */
    protected $taxRate;

    /**
     * @var string
     */
    protected $totalWithTax;

    /**
     * @comment enum:waiting|processing|created|error
     * @var string
     */
    protected $status;

    /**
     * @comment FSO
     * @var integer
     */
    protected $pdfFileFileSize;

    /**
     * @var string
     */
    protected $pdfFileMimeType;

    /**
     * @var string
     */
    protected $pdfFileBaseName;

    /**
     * @var \Core\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    protected $invoiceTemplate;

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Core\Domain\Model\Company\CompanyInterface
     */
    protected $company;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($number)
    {
        $this->setNumber($number);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return InvoiceDTO
     */
    public static function createDTO()
    {
        return new InvoiceDTO();
    }

    /**
     * Factory method
     * @param InvoiceDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, InvoiceDTO::class);

        $self = new self(
            $dto->getNumber()
        );

        return $self
            ->setInDate($dto->getInDate())
            ->setOutDate($dto->getOutDate())
            ->setTotal($dto->getTotal())
            ->setTaxRate($dto->getTaxRate())
            ->setTotalWithTax($dto->getTotalWithTax())
            ->setStatus($dto->getStatus())
            ->setPdfFileFileSize($dto->getPdfFileFileSize())
            ->setPdfFileMimeType($dto->getPdfFileMimeType())
            ->setPdfFileBaseName($dto->getPdfFileBaseName())
            ->setInvoiceTemplate($dto->getInvoiceTemplate())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany());
    }

    /**
     * @param InvoiceDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, InvoiceDTO::class);

        $this
            ->setNumber($dto->getNumber())
            ->setInDate($dto->getInDate())
            ->setOutDate($dto->getOutDate())
            ->setTotal($dto->getTotal())
            ->setTaxRate($dto->getTaxRate())
            ->setTotalWithTax($dto->getTotalWithTax())
            ->setStatus($dto->getStatus())
            ->setPdfFileFileSize($dto->getPdfFileFileSize())
            ->setPdfFileMimeType($dto->getPdfFileMimeType())
            ->setPdfFileBaseName($dto->getPdfFileBaseName())
            ->setInvoiceTemplate($dto->getInvoiceTemplate())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return InvoiceDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setNumber($this->getNumber())
            ->setInDate($this->getInDate())
            ->setOutDate($this->getOutDate())
            ->setTotal($this->getTotal())
            ->setTaxRate($this->getTaxRate())
            ->setTotalWithTax($this->getTotalWithTax())
            ->setStatus($this->getStatus())
            ->setPdfFileFileSize($this->getPdfFileFileSize())
            ->setPdfFileMimeType($this->getPdfFileMimeType())
            ->setPdfFileBaseName($this->getPdfFileBaseName())
            ->setInvoiceTemplateId($this->getInvoiceTemplate() ? $this->getInvoiceTemplate()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'inDate' => $this->getInDate(),
            'outDate' => $this->getOutDate(),
            'total' => $this->getTotal(),
            'taxRate' => $this->getTaxRate(),
            'totalWithTax' => $this->getTotalWithTax(),
            'status' => $this->getStatus(),
            'pdfFileFileSize' => $this->getPdfFileFileSize(),
            'pdfFileMimeType' => $this->getPdfFileMimeType(),
            'pdfFileBaseName' => $this->getPdfFileBaseName(),
            'invoiceTemplateId' => $this->getInvoiceTemplate() ? $this->getInvoiceTemplate()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Invoice
     */
    protected function setNumber($number)
    {
        Assertion::notNull($number);
        Assertion::maxLength($number, 30);

        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set inDate
     *
     * @param \DateTime $inDate
     *
     * @return Invoice
     */
    protected function setInDate($inDate = null)
    {
        if (!is_null($inDate)) {
        }

        $this->inDate = $inDate;

        return $this;
    }

    /**
     * Get inDate
     *
     * @return \DateTime
     */
    public function getInDate()
    {
        return $this->inDate;
    }

    /**
     * Set outDate
     *
     * @param \DateTime $outDate
     *
     * @return Invoice
     */
    protected function setOutDate($outDate = null)
    {
        if (!is_null($outDate)) {
        }

        $this->outDate = $outDate;

        return $this;
    }

    /**
     * Get outDate
     *
     * @return \DateTime
     */
    public function getOutDate()
    {
        return $this->outDate;
    }

    /**
     * Set total
     *
     * @param string $total
     *
     * @return Invoice
     */
    protected function setTotal($total = null)
    {
        if (!is_null($total)) {
            if (!is_null($total)) {
                //Assertion::float($total);
            }
        }

        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set taxRate
     *
     * @param string $taxRate
     *
     * @return Invoice
     */
    protected function setTaxRate($taxRate = null)
    {
        if (!is_null($taxRate)) {
            if (!is_null($taxRate)) {
                //Assertion::float($taxRate);
            }
        }

        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return string
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * Set totalWithTax
     *
     * @param string $totalWithTax
     *
     * @return Invoice
     */
    protected function setTotalWithTax($totalWithTax = null)
    {
        if (!is_null($totalWithTax)) {
            if (!is_null($totalWithTax)) {
                //Assertion::float($totalWithTax);
            }
        }

        $this->totalWithTax = $totalWithTax;

        return $this;
    }

    /**
     * Get totalWithTax
     *
     * @return string
     */
    public function getTotalWithTax()
    {
        return $this->totalWithTax;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Invoice
     */
    protected function setStatus($status = null)
    {
        if (!is_null($status)) {
            Assertion::maxLength($status, 25);
        Assertion::choice($status, array (
          0 => '    waiting',
          1 => '    processing',
          2 => '    created',
          3 => '    error',
        ));
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set pdfFileFileSize
     *
     * @param integer $pdfFileFileSize
     *
     * @return Invoice
     */
    protected function setPdfFileFileSize($pdfFileFileSize = null)
    {
        if (!is_null($pdfFileFileSize)) {
            if (!is_null($pdfFileFileSize)) {
                Assertion::integerish($pdfFileFileSize);
                Assertion::greaterOrEqualThan($pdfFileFileSize, 0);
            }
        }

        $this->pdfFileFileSize = $pdfFileFileSize;

        return $this;
    }

    /**
     * Get pdfFileFileSize
     *
     * @return integer
     */
    public function getPdfFileFileSize()
    {
        return $this->pdfFileFileSize;
    }

    /**
     * Set pdfFileMimeType
     *
     * @param string $pdfFileMimeType
     *
     * @return Invoice
     */
    protected function setPdfFileMimeType($pdfFileMimeType = null)
    {
        if (!is_null($pdfFileMimeType)) {
            Assertion::maxLength($pdfFileMimeType, 80);
        }

        $this->pdfFileMimeType = $pdfFileMimeType;

        return $this;
    }

    /**
     * Get pdfFileMimeType
     *
     * @return string
     */
    public function getPdfFileMimeType()
    {
        return $this->pdfFileMimeType;
    }

    /**
     * Set pdfFileBaseName
     *
     * @param string $pdfFileBaseName
     *
     * @return Invoice
     */
    protected function setPdfFileBaseName($pdfFileBaseName = null)
    {
        if (!is_null($pdfFileBaseName)) {
            Assertion::maxLength($pdfFileBaseName, 255);
        }

        $this->pdfFileBaseName = $pdfFileBaseName;

        return $this;
    }

    /**
     * Get pdfFileBaseName
     *
     * @return string
     */
    public function getPdfFileBaseName()
    {
        return $this->pdfFileBaseName;
    }

    /**
     * Set invoiceTemplate
     *
     * @param \Core\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface $invoiceTemplate
     *
     * @return Invoice
     */
    protected function setInvoiceTemplate(\Core\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface $invoiceTemplate = null)
    {
        $this->invoiceTemplate = $invoiceTemplate;

        return $this;
    }

    /**
     * Get invoiceTemplate
     *
     * @return \Core\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    public function getInvoiceTemplate()
    {
        return $this->invoiceTemplate;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return Invoice
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return Invoice
     */
    protected function setCompany(\Core\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

