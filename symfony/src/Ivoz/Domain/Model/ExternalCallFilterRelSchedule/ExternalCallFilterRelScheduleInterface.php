<?php

namespace Ivoz\Domain\Model\ExternalCallFilterRelSchedule;



interface ExternalCallFilterRelScheduleInterface
{
    /**
     * Get filter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get schedule
     *
     * @return \Ivoz\Domain\Model\Schedule\ScheduleInterface
     */
    public function getSchedule();



}

