<?php

namespace Core\Domain\Model\FixedCostsRelInvoice;



interface FixedCostsRelInvoiceInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity();


    /**
     * Get fixedCost
     *
     * @return \Core\Domain\Model\FixedCost\FixedCostInterfaceInterface
     */
    public function getFixedCost();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get invoice
     *
     * @return \Core\Domain\Model\Invoice\InvoiceInterface
     */
    public function getInvoice();



}

