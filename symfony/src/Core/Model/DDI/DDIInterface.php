<?php

namespace Core\Model\DDI;



interface DDIInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get ddi
     *
     * @return string
     */
    public function getDdi();


    /**
     * Get ddie164
     *
     * @return string
     */
    public function getDdie164();


    /**
     * Get recordCalls
     *
     * @return string
     */
    public function getRecordCalls();


    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName();


    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType();


    /**
     * Get billInboundCalls
     *
     * @return boolean
     */
    public function getBillInboundCalls();


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
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();


    /**
     * Get conferenceRoom
     *
     * @return \Core\Model\ConferenceRoom\ConferenceRoom
     */
    public function getConferenceRoom();


    /**
     * Get language
     *
     * @return \Core\Model\Language\Language
     */
    public function getLanguage();


    /**
     * Get queue
     *
     * @return \Core\Model\Queue\Queue
     */
    public function getQueue();


    /**
     * Get externalCallFilter
     *
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getExternalCallFilter();


    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser();


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
     * Get fax
     *
     * @return \Core\Model\Fax\Fax
     */
    public function getFax();


    /**
     * Get peeringContract
     *
     * @return \Core\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract();


    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry();



}

