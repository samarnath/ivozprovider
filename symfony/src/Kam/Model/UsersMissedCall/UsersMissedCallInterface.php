<?php

namespace Kam\Model\UsersMissedCall;



interface UsersMissedCallInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get method
     *
     * @return string
     */
    public function getMethod();


    /**
     * Get fromTag
     *
     * @return string
     */
    public function getFromTag();


    /**
     * Get toTag
     *
     * @return string
     */
    public function getToTag();


    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid();


    /**
     * Get sipCode
     *
     * @return string
     */
    public function getSipCode();


    /**
     * Get sipReason
     *
     * @return string
     */
    public function getSipReason();


    /**
     * Get srcIp
     *
     * @return string
     */
    public function getSrcIp();


    /**
     * Get fromUser
     *
     * @return string
     */
    public function getFromUser();


    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain();


    /**
     * Get ruriUser
     *
     * @return string
     */
    public function getRuriUser();


    /**
     * Get ruriDomain
     *
     * @return string
     */
    public function getRuriDomain();


    /**
     * Get cseq
     *
     * @return integer
     */
    public function getCseq();


    /**
     * Get localtime
     *
     * @return \DateTime
     */
    public function getLocaltime();


    /**
     * Get utctime
     *
     * @return string
     */
    public function getUtctime();



}

