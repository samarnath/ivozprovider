<?php

namespace Core\Domain\Model\ExternalCallFilterRelCalendar;



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
     * @return \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get calendar
     *
     * @return \Core\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar();



}

