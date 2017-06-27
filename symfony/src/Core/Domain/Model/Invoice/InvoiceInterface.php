<?php

namespace Core\Domain\Model\Invoice;



interface InvoiceInterface
{
    /**
     * Get number
     *
     * @return string
     */
    public function getNumber();


    /**
     * Get inDate
     *
     * @return \DateTime
     */
    public function getInDate();


    /**
     * Get outDate
     *
     * @return \DateTime
     */
    public function getOutDate();


    /**
     * Get total
     *
     * @return string
     */
    public function getTotal();


    /**
     * Get taxRate
     *
     * @return string
     */
    public function getTaxRate();


    /**
     * Get totalWithTax
     *
     * @return string
     */
    public function getTotalWithTax();


    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();


    /**
     * Get invoiceTemplate
     *
     * @return \Core\Domain\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    public function getInvoiceTemplate();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get pdf
     *
     * @return Pdf
     */
    public function getPdf();

}

