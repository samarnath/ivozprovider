<?php

namespace Ivoz\Domain\Model\ExternalCallFilterRelSchedule;

use Core\Domain\Model\EntityInterface;

interface ExternalCallFilterRelScheduleInterface extends EntityInterface
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

