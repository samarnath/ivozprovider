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
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter();


    /**
     * Get schedule
     *
     * @return \Core\Model\Schedule\Schedule
     */
    public function getSchedule();



}

