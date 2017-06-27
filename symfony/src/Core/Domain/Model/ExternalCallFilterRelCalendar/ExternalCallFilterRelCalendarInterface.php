<?php

namespace Core\Domain\Model\ExternalCallFilterRelCalendar;



interface ExternalCallFilterRelCalendarInterface
{
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

