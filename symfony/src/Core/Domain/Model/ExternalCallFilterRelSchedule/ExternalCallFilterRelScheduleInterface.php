<?php

namespace Core\Domain\Model\ExternalCallFilterRelSchedule;



interface ExternalCallFilterRelScheduleInterface
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
     * Get schedule
     *
     * @return \Core\Domain\Model\Schedule\ScheduleInterface
     */
    public function getSchedule();



}

