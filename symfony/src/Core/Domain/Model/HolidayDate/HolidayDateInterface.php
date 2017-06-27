<?php

namespace Core\Domain\Model\HolidayDate;



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
     * @return \Core\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar();


    /**
     * Get locution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getLocution();



}

