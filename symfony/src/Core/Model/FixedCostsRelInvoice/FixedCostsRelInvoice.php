<?php

namespace Core\Model\FixedCostsRelInvoice;

use Assert\Assertion;
use Core\Application\DTO\FixedCostsRelInvoiceDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FixedCostsRelInvoice
 */
class FixedCostsRelInvoice implements EntityInterface
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
     * @var \Core\Model\Brand\Brand
     */
    protected $brand;

    /**
     * @var \Core\Model\FixedCost\FixedCost
     */
    protected $fixedCost;

    /**
     * @var \Core\Model\Invoice\Invoice
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
            ->setBrand($dto->getBrand())
            ->setFixedCost($dto->getFixedCost())
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
            ->setBrand($dto->getBrand())
            ->setFixedCost($dto->getFixedCost())
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
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setFixedCostId($this->getFixedCost() ? $this->getFixedCost()->getId() : null)
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
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'fixedCostId' => $this->getFixedCost() ? $this->getFixedCost()->getId() : null,
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
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return FixedCostsRelInvoice
     */
    protected function setBrand(\Core\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set fixedCost
     *
     * @param \Core\Model\FixedCost\FixedCost $fixedCost
     *
     * @return FixedCostsRelInvoice
     */
    protected function setFixedCost(\Core\Model\FixedCost\FixedCost $fixedCost)
    {
        $this->fixedCost = $fixedCost;

        return $this;
    }

    /**
     * Get fixedCost
     *
     * @return \Core\Model\FixedCost\FixedCost
     */
    public function getFixedCost()
    {
        return $this->fixedCost;
    }

    /**
     * Set invoice
     *
     * @param \Core\Model\Invoice\Invoice $invoice
     *
     * @return FixedCostsRelInvoice
     */
    protected function setInvoice(\Core\Model\Invoice\Invoice $invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Core\Model\Invoice\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }



    // @codeCoverageIgnoreEnd
}

