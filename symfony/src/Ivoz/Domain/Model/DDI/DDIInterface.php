<?php

namespace Ivoz\Domain\Model\DDI;

use Core\Domain\Model\EntityInterface;

interface DDIInterface extends EntityInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get conferenceRoom
     *
     * @return \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();


    /**
     * Get language
     *
     * @return \Ivoz\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue();


    /**
     * Get externalCallFilter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getExternalCallFilter();


    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();


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
     * Get fax
     *
     * @return \Ivoz\Domain\Model\Fax\FaxInterface
     */
    public function getFax();


    /**
     * Get peeringContract
     *
     * @return \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();


    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry();


    /**
     * Get retailAccount
     *
     * @return \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface
     */
    public function getRetailAccount();



}

