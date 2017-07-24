<?php

namespace Ivoz\Domain\Model\PickUpGroup;

use Core\Domain\Model\EntityInterface;

interface PickUpGroupInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();



}

