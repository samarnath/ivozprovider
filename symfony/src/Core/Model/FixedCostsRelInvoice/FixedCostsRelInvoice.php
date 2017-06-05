<?php

namespace Core\Model\FixedCostsRelInvoice;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FixedCostsRelInvoice
 */
class FixedCostsRelInvoice implements EntityInterface, FixedCostsRelInvoiceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $quantity;

    /**
     * @var \Core\Model\FixedCost\FixedCostInterfaceInterface
     */
    protected $fixedCost;

    /**
     * @var \Core\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Core\Model\Invoice\InvoiceInterface
     */
    protected $invoice;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return FixedCostsRelInvoiceDTO
     */
    public static function createDTO()
    {
        return new FixedCostsRelInvoiceDTO();
    }

    /**
     * Factory method
     * @param FixedCostsRelInvoiceDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FixedCostsRelInvoiceDTO::class);

        $self = new self();

        return $self
            ->setQuantity($dto->getQuantity())
            ->setFixedCost($dto->getFixedCost())
            ->setBrand($dto->getBrand())
            ->setInvoice($dto->getInvoice());
    }

    /**
     * @param FixedCostsRelInvoiceDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FixedCostsRelInvoiceDTO::class);

        $this
            ->setQuantity($dto->getQuantity())
            ->setFixedCost($dto->getFixedCost())
            ->setBrand($dto->getBrand())
            ->setInvoice($dto->getInvoice());


        return $this;
    }

    /**
     * @return FixedCostsRelInvoiceDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setQuantity($this->getQuantity())
            ->setFixedCostId($this->getFixedCost() ? $this->getFixedCost()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setInvoiceId($this->getInvoice() ? $this->getInvoice()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'quantity' => $this->getQuantity(),
            'fixedCostId' => $this->getFixedCost() ? $this->getFixedCost()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'invoiceId' => $this->getInvoice() ? $this->getInvoice()->getId() : null
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return FixedCostsRelInvoice
     */
    protected function setQuantity($quantity = null)
    {
        if (!is_null($quantity)) {
            if (!is_null($quantity)) {
                Assertion::integerish($quantity);
            }
        }

        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set fixedCost
     *
     * @param \Core\Model\FixedCost\FixedCostInterfaceInterface $fixedCost
     *
     * @return FixedCostsRelInvoice
     */
    protected function setFixedCost(\Core\Model\FixedCost\FixedCostInterfaceInterface $fixedCost)
    {
        $this->fixedCost = $fixedCost;

        return $this;
    }

    /**
     * Get fixedCost
     *
     * @return \Core\Model\FixedCost\FixedCostInterfaceInterface
     */
    public function getFixedCost()
    {
        return $this->fixedCost;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\BrandInterface $brand
     *
     * @return FixedCostsRelInvoice
     */
    protected function setBrand(\Core\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set invoice
     *
     * @param \Core\Model\Invoice\InvoiceInterface $invoice
     *
     * @return FixedCostsRelInvoice
     */
    protected function setInvoice(\Core\Model\Invoice\InvoiceInterface $invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Core\Model\Invoice\InvoiceInterface
     */
    public function getInvoice()
    {
        return $this->invoice;
    }



    // @codeCoverageIgnoreEnd
}

