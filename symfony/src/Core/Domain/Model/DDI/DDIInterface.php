<?php

namespace Core\Domain\Model\DDI;



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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get conferenceRoom
     *
     * @return \Core\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();


    /**
     * Get language
     *
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get queue
     *
     * @return \Core\Domain\Model\Queue\QueueInterface
     */
    public function getQueue();


    /**
     * Get externalCallFilter
     *
     * @return \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getExternalCallFilter();


    /**
     * Get user
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser();


    /**
     * Get iVRCommon
     *
     * @return \Core\Domain\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon();


    /**
     * Get iVRCustom
     *
     * @return \Core\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom();


    /**
     * Get huntGroup
     *
     * @return \Core\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();


    /**
     * Get fax
     *
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax();


    /**
     * Get peeringContract
     *
     * @return \Core\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();


    /**
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry();


    /**
     * Get retailAccount
     *
     * @return \Core\Domain\Model\RetailAccount\RetailAccountInterface
     */
    public function getRetailAccount();



}

