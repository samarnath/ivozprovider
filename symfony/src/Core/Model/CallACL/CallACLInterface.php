<?php

namespace Core\Model\CallACL;



interface CallACLInterface
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
     * Get defaultPolicy
     *
     * @return string
     */
    public function getDefaultPolicy();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();



}

