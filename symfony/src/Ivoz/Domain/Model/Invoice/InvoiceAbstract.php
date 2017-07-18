<?php

namespace Ivoz\Domain\Model\Invoice;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * InvoiceAbstract
 */
abstract class InvoiceAbstract
{
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
     * @var Pdf
     */
    protected $pdf;

    /**
     * @var \Ivoz\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    protected $invoiceTemplate;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
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
    public function __construct($number, Pdf $pdf)
    {
        $this->setNumber($number);
        $this->setPdf($pdf);
    }

    abstract public function __wakeup();

    /**
     * @return InvoiceDTO
     */
    public static function createDTO()
    {
        return new InvoiceDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto InvoiceDTO
         */
        Assertion::isInstanceOf($dto, InvoiceDTO::class);

        $pdf = new Pdf(
            $dto->getPdfFileSize(),
            $dto->getPdfMimeType(),
            $dto->getPdfBaseName()
        );

        $self = new static(
            $dto->getNumber(),
            $pdf
        );

        return $self
            ->setInDate($dto->getInDate())
            ->setOutDate($dto->getOutDate())
            ->setTotal($dto->getTotal())
            ->setTaxRate($dto->getTaxRate())
            ->setTotalWithTax($dto->getTotalWithTax())
            ->setStatus($dto->getStatus())
            ->setInvoiceTemplate($dto->getInvoiceTemplate())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto InvoiceDTO
         */
        Assertion::isInstanceOf($dto, InvoiceDTO::class);

        $pdf = new Pdf(
            $dto->getPdfFileSize(),
            $dto->getPdfMimeType(),
            $dto->getPdfBaseName()
        );

        $this
            ->setNumber($dto->getNumber())
            ->setInDate($dto->getInDate())
            ->setOutDate($dto->getOutDate())
            ->setTotal($dto->getTotal())
            ->setTaxRate($dto->getTaxRate())
            ->setTotalWithTax($dto->getTotalWithTax())
            ->setStatus($dto->getStatus())
            ->setPdf($pdf)
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
            ->setNumber($this->getNumber())
            ->setInDate($this->getInDate())
            ->setOutDate($this->getOutDate())
            ->setTotal($this->getTotal())
            ->setTaxRate($this->getTaxRate())
            ->setTotalWithTax($this->getTotalWithTax())
            ->setStatus($this->getStatus())
            ->setPdfFileSize($this->getPdf()->getFileSize())
            ->setPdfMimeType($this->getPdf()->getMimeType())
            ->setPdfBaseName($this->getPdf()->getBaseName())
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
            'number' => $this->getNumber(),
            'inDate' => $this->getInDate(),
            'outDate' => $this->getOutDate(),
            'total' => $this->getTotal(),
            'taxRate' => $this->getTaxRate(),
            'totalWithTax' => $this->getTotalWithTax(),
            'status' => $this->getStatus(),
            'fileSize' => $this->getPdf()->getFileSize(),
            'mimeType' => $this->getPdf()->getMimeType(),
            'baseName' => $this->getPdf()->getBaseName(),
            'invoiceTemplateId' => $this->getInvoiceTemplate() ? $this->getInvoiceTemplate()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set number
     *
     * @param string $number
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
     */
    protected function setTotal($total = null)
    {
        if (!is_null($total)) {
            if (!is_null($total)) {
                Assertion::numeric($total);
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
     * @return self
     */
    protected function setTaxRate($taxRate = null)
    {
        if (!is_null($taxRate)) {
            if (!is_null($taxRate)) {
                Assertion::numeric($taxRate);
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
     * @return self
     */
    protected function setTotalWithTax($totalWithTax = null)
    {
        if (!is_null($totalWithTax)) {
            if (!is_null($totalWithTax)) {
                Assertion::numeric($totalWithTax);
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
     * @return self
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
     * Set invoiceTemplate
     *
     * @param \Ivoz\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface $invoiceTemplate
     *
     * @return self
     */
    protected function setInvoiceTemplate(\Ivoz\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface $invoiceTemplate = null)
    {
        $this->invoiceTemplate = $invoiceTemplate;

        return $this;
    }

    /**
     * Get invoiceTemplate
     *
     * @return \Ivoz\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    public function getInvoiceTemplate()
    {
        return $this->invoiceTemplate;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set pdf
     *
     * @param Pdf $pdf
     *
     * @return self
     */
    protected function setPdf(Pdf $pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return Pdf
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    // @codeCoverageIgnoreEnd
}

