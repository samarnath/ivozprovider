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
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get iVRCommon
     *
     * @return \Core\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon();


    /**
     * Get iVRCustom
     *
     * @return \Core\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom();


    /**
     * Get huntGroup
     *
     * @return \Core\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();


    /**
     * Get conferenceRoom
     *
     * @return \Core\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();


    /**
     * Get user
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getUser();


    /**
     * Get queue
     *
     * @return \Core\Model\Queue\QueueInterface
     */
    public function getQueue();



}

