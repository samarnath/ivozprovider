<?php

namespace Core\Model\Invoice;



interface InvoiceInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * Get pdfFileFileSize
     *
     * @return integer
     */
    public function getPdfFileFileSize();


    /**
     * Get pdfFileMimeType
     *
     * @return string
     */
    public function getPdfFileMimeType();


    /**
     * Get pdfFileBaseName
     *
     * @return string
     */
    public function getPdfFileBaseName();


    /**
     * Get invoiceTemplate
     *
     * @return \Core\Model\InvoiceTemplate\InvoiceTemplateInterface
     */
    public function getInvoiceTemplate();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();



}

