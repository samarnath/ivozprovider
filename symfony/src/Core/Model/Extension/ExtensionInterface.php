<?php

namespace Core\Model\Extension;



interface ExtensionInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get number
     *
     * @return string
     */
    public function getNumber();


    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType();


    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue();


    /**
     * Get friendValue
     *
     * @return string
     */
    public function getFriendValue();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get iVRCommon
     *
     * @return \Core\Model\IVRCommon\IVRCommon
     */
    public function getIVRCommon();


    /**
     * Get iVRCustom
     *
     * @return \Core\Model\IVRCustom\IVRCustom
     */
    public function getIVRCustom();


    /**
     * Get huntGroup
     *
     * @return \Core\Model\HuntGroup\HuntGroup
     */
    public function getHuntGroup();


    /**
     * Get conferenceRoom
     *
     * @return \Core\Model\ConferenceRoom\ConferenceRoom
     */
    public function getConferenceRoom();


    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser();


    /**
     * Get queue
     *
     * @return \Core\Model\Queue\Queue
     */
    public function getQueue();



}

