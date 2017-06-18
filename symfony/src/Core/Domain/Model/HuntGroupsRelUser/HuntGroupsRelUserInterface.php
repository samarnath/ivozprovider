<?php

namespace Core\Domain\Model\HuntGroupsRelUser;



interface HuntGroupsRelUserInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();


    /**
     * Get user
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser();



}

