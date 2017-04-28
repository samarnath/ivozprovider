<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class FixedCostsRelInvoiceDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $quantity;

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $fixedCostId;

    /**
     * @var mixed
     */
    public $invoiceId;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $fixedCost;

    /**
     * @var mixed
     */
    public $invoice;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'quantity' => $this->getQuantity(),
            'brandId' => $this->getBrandId(),
            'fixedCostId' => $this->getFixedCostId(),
            'invoiceId' => $this->getInvoiceId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setQuantity(isset($data['quantity']) ? $data['quantity'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setFixedCostId(isset($data['fixedCostId']) ? $data['fixedCostId'] : null)
            ->setInvoiceId(isset($data['invoiceId']) ? $data['invoiceId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->fixedCost = $transformer->transform('Core\\Model\\FixedCost\\FixedCost', $this->getFixedCostId());
        $this->invoice = $transformer->transform('Core\\Model\\Invoice\\Invoice', $this->getInvoiceId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return FixedCostsRelInvoiceDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $quantity
     *
     * @return FixedCostsRelInvoiceDTO
     */
    public function setQuantity($quantity = null)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param integer $brandId
     *
     * @return FixedCostsRelInvoiceDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $fixedCostId
     *
     * @return FixedCostsRelInvoiceDTO
     */
    public function setFixedCostId($fixedCostId)
    {
        $this->fixedCostId = $fixedCostId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFixedCostId()
    {
        return $this->fixedCostId;
    }

    /**
     * @return \Core\Model\FixedCost\FixedCost
     */
    public function getFixedCost()
    {
        return $this->fixedCost;
    }

    /**
     * @param integer $invoiceId
     *
     * @return FixedCostsRelInvoiceDTO
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return \Core\Model\Invoice\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}

