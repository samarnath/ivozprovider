<?php

namespace Core\Domain\Model\InvoiceTemplate;



interface InvoiceTemplateInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate();


    /**
     * Get templateHeader
     *
     * @return string
     */
    public function getTemplateHeader();


    /**
     * Get templateFooter
     *
     * @return string
     */
    public function getTemplateFooter();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

