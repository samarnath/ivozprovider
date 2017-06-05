<?php

namespace Core\Model\ExternalCallFilterRelSchedule;



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
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get schedule
     *
     * @return \Core\Model\Schedule\ScheduleInterface
     */
    public function getSchedule();



}

