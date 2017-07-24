<?php

namespace Ivoz\Domain\Model\HolidayDate;

use Core\Domain\Model\EntityInterface;

interface HolidayDateInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate();


    /**
     * Get calendar
     *
     * @return \Ivoz\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar();


    /**
     * Get locution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getLocution();



}

