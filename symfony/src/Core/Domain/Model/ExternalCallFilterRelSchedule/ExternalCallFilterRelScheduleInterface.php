<?php

namespace Core\Domain\Model\ExternalCallFilterRelSchedule;



interface ExternalCallFilterRelScheduleInterface
{
    /**
     * Get filter
     *
     * @return \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get schedule
     *
     * @return \Core\Domain\Model\Schedule\ScheduleInterface
     */
    public function getSchedule();



}

