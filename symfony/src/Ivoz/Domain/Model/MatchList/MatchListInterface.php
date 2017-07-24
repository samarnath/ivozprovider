<?php

namespace Ivoz\Domain\Model\MatchList;

use Core\Domain\Model\EntityInterface;

interface MatchListInterface extends EntityInterface
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

