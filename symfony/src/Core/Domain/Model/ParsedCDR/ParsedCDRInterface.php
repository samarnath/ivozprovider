<?php

namespace Core\Domain\Model\ParsedCDR;



interface ParsedCDRInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get statId
     *
     * @return integer
     */
    public function getStatId();


    /**
     * Get xstatId
     *
     * @return integer
     */
    public function getXstatId();


    /**
     * Get statType
     *
     * @return string
     */
    public function getStatType();


    /**
     * Get initialLeg
     *
     * @return string
     */
    public function getInitialLeg();


    /**
     * Get initialLegHash
     *
     * @return string
     */
    public function getInitialLegHash();


    /**
     * Get cid
     *
     * @return string
     */
    public function getCid();


    /**
     * Get cidHash
     *
     * @return string
     */
    public function getCidHash();


    /**
     * Get xcid
     *
     * @return string
     */
    public function getXcid();


    /**
     * Get xcidHash
     *
     * @return string
     */
    public function getXcidHash();


    /**
     * Get proxies
     *
     * @return string
     */
    public function getProxies();


    /**
     * Get type
     *
     * @return string
     */
    public function getType();


    /**
     * Get subtype
     *
     * @return string
     */
    public function getSubtype();


    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate();


    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration();


    /**
     * Get aParty
     *
     * @return string
     */
    public function getAParty();


    /**
     * Get bParty
     *
     * @return string
     */
    public function getBParty();


    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller();


    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee();


    /**
     * Get xCaller
     *
     * @return string
     */
    public function getXCaller();


    /**
     * Get xCallee
     *
     * @return string
     */
    public function getXCallee();


    /**
     * Get initialReferrer
     *
     * @return string
     */
    public function getInitialReferrer();


    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer();


    /**
     * Get referee
     *
     * @return string
     */
    public function getReferee();


    /**
     * Get lastForwarder
     *
     * @return string
     */
    public function getLastForwarder();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get peeringContract
     *
     * @return \Core\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();



}

