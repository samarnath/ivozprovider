<?php

namespace Ivoz\Domain\Model\FixedCostsRelInvoice;



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
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get fixedCost
     *
     * @return \Ivoz\Domain\Model\FixedCost\FixedCostInterface
     */
    public function getFixedCost();


    /**
     * Get invoice
     *
     * @return \Ivoz\Domain\Model\Invoice\InvoiceInterface
     */
    public function getInvoice();



}

