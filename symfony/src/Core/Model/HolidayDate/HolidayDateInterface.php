<?php

namespace Core\Model\HolidayDate;



interface HolidayDateInterface
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
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate();


    /**
     * Get calendar
     *
     * @return \Core\Model\Calendar\CalendarInterface
     */
    public function getCalendar();


    /**
     * Get locution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getLocution();



}

