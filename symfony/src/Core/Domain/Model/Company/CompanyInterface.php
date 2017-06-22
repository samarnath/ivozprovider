<?php

namespace Core\Domain\Model\Company;



interface CompanyInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get type
     *
     * @return string
     */
    public function getType();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get domainUsers
     *
     * @return string
     */
    public function getDomainUsers();


    /**
     * Get nif
     *
     * @return string
     */
    public function getNif();


    /**
     * Get externalMaxCalls
     *
     * @return integer
     */
    public function getExternalMaxCalls();


    /**
     * Get postalAddress
     *
     * @return string
     */
    public function getPostalAddress();


    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode();


    /**
     * Get town
     *
     * @return string
     */
    public function getTown();


    /**
     * Get province
     *
     * @return string
     */
    public function getProvince();


    /**
     * Get country
     *
     * @return string
     */
    public function getCountry();


    /**
     * Get outboundPrefix
     *
     * @return string
     */
    public function getOutboundPrefix();


    /**
     * Get ipfilter
     *
     * @return boolean
     */
    public function getIpfilter();


    /**
     * Get onDemandRecord
     *
     * @return boolean
     */
    public function getOnDemandRecord();


    /**
     * Get onDemandRecordCode
     *
     * @return string
     */
    public function getOnDemandRecordCode();


    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode();


    /**
     * Get externallyextraopts
     *
     * @return string
     */
    public function getExternallyextraopts();


    /**
     * Get recordingsLimitMB
     *
     * @return integer
     */
    public function getRecordingsLimitMB();


    /**
     * Get recordingsLimitEmail
     *
     * @return string
     */
    public function getRecordingsLimitEmail();


    /**
     * Get language
     *
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get mediaRelaySets
     *
     * @return \Core\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    public function getMediaRelaySets();


    /**
     * Get defaultTimezone
     *
     * @return \Core\Domain\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get applicationServer
     *
     * @return \Core\Domain\Model\ApplicationServer\ApplicationServerInterface
     */
    public function getApplicationServer();


    /**
     * Get countryCode
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountryCode();


    /**
     * Get outgoingDDI
     *
     * @return \Core\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI();



}

