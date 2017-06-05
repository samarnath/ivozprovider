<?php

namespace Core\Model\ExternalCallFilterRelCalendar;



interface ExternalCallFilterRelCalendarInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get filter
     *
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get calendar
     *
     * @return \Core\Model\Calendar\CalendarInterface
     */
    public function getCalendar();



}

