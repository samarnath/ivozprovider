<?php

namespace Ivoz\Domain\Model\HuntGroupsRelUser;

use Core\Domain\Model\EntityInterface;

interface HuntGroupsRelUserInterface extends EntityInterface
{
    /**
     * Get timeoutTime
     *
     * @return integer
     */
    public function getTimeoutTime();


    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();


    /**
     * Get huntGroup
     *
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();


    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();



}

