<?php

namespace Core\Domain\Model\PickUpRelUser;



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
     * @return \Core\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup();


    /**
     * Get user
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser();



}

