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
     * @return \Core\Model\PickUpGroup\PickUpGroup
     */
    public function getPickUpGroup();


    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser();



}

