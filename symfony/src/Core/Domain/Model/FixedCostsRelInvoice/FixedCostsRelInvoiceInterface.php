<?php

namespace Core\Domain\Model\FixedCostsRelInvoice;



interface FixedCostsRelInvoiceInterface
{
    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get fixedCost
     *
     * @return \Core\Domain\Model\FixedCost\FixedCostInterface
     */
    public function getFixedCost();


    /**
     * Get invoice
     *
     * @return \Core\Domain\Model\Invoice\InvoiceInterface
     */
    public function getInvoice();



}

