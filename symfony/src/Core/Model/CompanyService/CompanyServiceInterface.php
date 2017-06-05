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
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get service
     *
     * @return \Core\Model\Service\ServiceInterface
     */
    public function getService();



}

