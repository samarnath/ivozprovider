<?php

namespace Ivoz\Domain\Model\Schedule;

use Core\Domain\Model\EntityInterface;

interface ScheduleInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get timeIn
     *
     * @return \DateTime
     */
    public function getTimeIn();


    /**
     * Get timeout
     *
     * @return \DateTime
     */
    public function getTimeout();


    /**
     * Get monday
     *
     * @return boolean
     */
    public function getMonday();


    /**
     * Get tuesday
     *
     * @return boolean
     */
    public function getTuesday();


    /**
     * Get wednesday
     *
     * @return boolean
     */
    public function getWednesday();


    /**
     * Get thursday
     *
     * @return boolean
     */
    public function getThursday();


    /**
     * Get friday
     *
     * @return boolean
     */
    public function getFriday();


    /**
     * Get saturday
     *
     * @return boolean
     */
    public function getSaturday();


    /**
     * Get sunday
     *
     * @return boolean
     */
    public function getSunday();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();



}

