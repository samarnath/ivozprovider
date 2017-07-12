<?php

namespace Ivoz\Domain\Model\HolidayDate;



interface HolidayDateInterface
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

