<?php

namespace Ivoz\Domain\Model\Extension;



interface ExtensionInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get iVRCommon
     *
     * @return \Ivoz\Domain\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon();


    /**
     * Get iVRCustom
     *
     * @return \Ivoz\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom();


    /**
     * Get huntGroup
     *
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();


    /**
     * Get conferenceRoom
     *
     * @return \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();


    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();


    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue();



}

