<?php

namespace Core\Model\ConferenceRoom;



interface ConferenceRoomInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get pinProtected
     *
     * @return boolean
     */
    public function getPinProtected();


    /**
     * Get pinCode
     *
     * @return string
     */
    public function getPinCode();


    /**
     * Get maxMembers
     *
     * @return boolean
     */
    public function getMaxMembers();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();



}

