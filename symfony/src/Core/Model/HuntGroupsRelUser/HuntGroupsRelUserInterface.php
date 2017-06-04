<?php

namespace Core\Model\HuntGroupsRelUser;



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
     * @return \Core\Model\HuntGroup\HuntGroup
     */
    public function getHuntGroup();


    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser();



}

