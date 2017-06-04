<?php

namespace Core\Model\CompanyService;



interface CompanyServiceInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get code
     *
     * @return string
     */
    public function getCode();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get service
     *
     * @return \Core\Model\Service\Service
     */
    public function getService();



}

