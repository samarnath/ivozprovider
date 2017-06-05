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
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get conferenceRoom
     *
     * @return \Core\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();


    /**
     * Get language
     *
     * @return \Core\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get queue
     *
     * @return \Core\Model\Queue\QueueInterface
     */
    public function getQueue();


    /**
     * Get externalCallFilter
     *
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getExternalCallFilter();


    /**
     * Get user
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getUser();


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
     * Get fax
     *
     * @return \Core\Model\Fax\FaxInterface
     */
    public function getFax();


    /**
     * Get peeringContract
     *
     * @return \Core\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();


    /**
     * Get country
     *
     * @return \Core\Model\Country\CountryInterface
     */
    public function getCountry();



}

