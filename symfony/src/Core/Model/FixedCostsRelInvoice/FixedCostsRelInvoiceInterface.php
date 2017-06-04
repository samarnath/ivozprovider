<?php

namespace Core\Model\FixedCostsRelInvoice;



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
     * @return \Core\Model\FixedCost\FixedCostInterface
     */
    public function getFixedCost();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();


    /**
     * Get invoice
     *
     * @return \Core\Model\Invoice\Invoice
     */
    public function getInvoice();



}

