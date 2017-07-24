<?php

namespace Ivoz\Domain\Model\CallACL;

use Core\Domain\Model\EntityInterface;

interface CallACLInterface extends EntityInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();



}

