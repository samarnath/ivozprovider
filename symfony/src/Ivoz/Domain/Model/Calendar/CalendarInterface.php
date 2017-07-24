<?php

namespace Ivoz\Domain\Model\Calendar;

use Core\Domain\Model\EntityInterface;

interface CalendarInterface extends EntityInterface
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

