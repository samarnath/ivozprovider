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
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter();


    /**
     * Get calendar
     *
     * @return \Core\Model\Calendar\Calendar
     */
    public function getCalendar();



}

