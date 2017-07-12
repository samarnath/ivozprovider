<?php

namespace Ivoz\Domain\Model\Brand;



interface BrandInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get nif
     *
     * @return string
     */
    public function getNif();


    /**
     * Get domainUsers
     *
     * @return string
     */
    public function getDomainUsers();


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
     * Get registryData
     *
     * @return string
     */
    public function getRegistryData();


    /**
     * Get fromName
     *
     * @return string
     */
    public function getFromName();


    /**
     * Get fromAddress
     *
     * @return string
     */
    public function getFromAddress();


    /**
     * Get recordingsLimitMB
     *
     * @return integer
     */
    public function getRecordingsLimitMB();


    /**
     * Get recordingslimitemail
     *
     * @return string
     */
    public function getRecordingslimitemail();


    /**
     * Get language
     *
     * @return \Ivoz\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get defaultTimezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone();


    /**
     * Get logo
     *
     * @return Logo
     */
    public function getLogo();

}

