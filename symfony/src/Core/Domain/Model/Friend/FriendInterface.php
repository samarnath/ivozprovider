<?php

namespace Core\Domain\Model\Friend;



interface FriendInterface
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
     * Get priority
     *
     * @return integer
     */
    public function getPriority();


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
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry();


    /**
     * Get callACL
     *
     * @return \Core\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL();


    /**
     * Get outgoingDDI
     *
     * @return \Core\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI();


    /**
     * Get language
     *
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();



}

