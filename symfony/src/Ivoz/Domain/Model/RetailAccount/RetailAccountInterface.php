<?php

namespace Ivoz\Domain\Model\RetailAccount;



interface RetailAccountInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport();


    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();


    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();


    /**
     * Get authNeeded
     *
     * @return string
     */
    public function getAuthNeeded();


    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();


    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode();


    /**
     * Get disallow
     *
     * @return string
     */
    public function getDisallow();


    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow();


    /**
     * Get directMediaMethod
     *
     * @return string
     */
    public function getDirectMediaMethod();


    /**
     * Get calleridUpdateHeader
     *
     * @return string
     */
    public function getCalleridUpdateHeader();


    /**
     * Get updateCallerid
     *
     * @return string
     */
    public function getUpdateCallerid();


    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain();


    /**
     * Get directConnectivity
     *
     * @return string
     */
    public function getDirectConnectivity();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry();


    /**
     * Get outgoingDDI
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI();


    /**
     * Get language
     *
     * @return \Ivoz\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();



}

