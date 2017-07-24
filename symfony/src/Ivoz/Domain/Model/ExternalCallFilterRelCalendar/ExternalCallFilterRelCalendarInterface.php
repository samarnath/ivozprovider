<?php

namespace Ivoz\Domain\Model\ExternalCallFilterRelCalendar;

use Core\Domain\Model\EntityInterface;

interface ExternalCallFilterRelCalendarInterface extends EntityInterface
{
    /**
     * Get filter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get calendar
     *
     * @return \Ivoz\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar();



}

