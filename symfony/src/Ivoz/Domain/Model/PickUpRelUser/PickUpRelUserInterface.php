<?php

namespace Ivoz\Domain\Model\PickUpRelUser;



interface PickUpRelUserInterface
{
    /**
     * Get pickUpGroup
     *
     * @return \Ivoz\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup();


    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();



}

