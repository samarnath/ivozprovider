<?php

namespace Core\Model\PickUpRelUser;



interface PickUpRelUserInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get pickUpGroup
     *
     * @return \Core\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup();


    /**
     * Get user
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getUser();



}

