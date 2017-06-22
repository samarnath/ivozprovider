<?php

namespace Core\Domain\Model\Brand;

use Doctrine\Common\Collections\Criteria;

interface BrandInterface
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
     * Get logoFileSize
     *
     * @return integer
     */
    public function getLogoFileSize();


    /**
     * Get logoMimeType
     *
     * @return string
     */
    public function getLogoMimeType();


    /**
     * Get logoBaseName
     *
     * @return string
     */
    public function getLogoBaseName();


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
     * Get operators
     *
     * @return ArrayCollection
     */
    public function getOperators(Criteria $criteria = null);


    /**
     * Get services
     *
     * @return ArrayCollection
     */
    public function getServices(Criteria $criteria = null);


    /**
     * Get urls
     *
     * @return ArrayCollection
     */
    public function getUrls(Criteria $criteria = null);


    /**
     * Get relFeatures
     *
     * @return ArrayCollection
     */
    public function getRelFeatures(Criteria $criteria = null);


    /**
     * Get domains
     *
     * @return ArrayCollection
     */
    public function getDomains(Criteria $criteria = null);


    /**
     * Get language
     *
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get defaultTimezone
     *
     * @return \Core\Domain\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone();



}

