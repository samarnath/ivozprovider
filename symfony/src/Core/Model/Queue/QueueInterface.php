<?php

namespace Core\Model\Queue;



interface QueueInterface
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
     * Get maxWaitTime
     *
     * @return integer
     */
    public function getMaxWaitTime();


    /**
     * Get timeoutTargetType
     *
     * @return string
     */
    public function getTimeoutTargetType();


    /**
     * Get timeoutNumberValue
     *
     * @return string
     */
    public function getTimeoutNumberValue();


    /**
     * Get maxlen
     *
     * @return integer
     */
    public function getMaxlen();


    /**
     * Get fullTargetType
     *
     * @return string
     */
    public function getFullTargetType();


    /**
     * Get fullNumberValue
     *
     * @return string
     */
    public function getFullNumberValue();


    /**
     * Get periodicAnnounceFrequency
     *
     * @return integer
     */
    public function getPeriodicAnnounceFrequency();


    /**
     * Get memberCallRest
     *
     * @return integer
     */
    public function getMemberCallRest();


    /**
     * Get memberCallTimeout
     *
     * @return integer
     */
    public function getMemberCallTimeout();


    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy();


    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get periodicAnnounceLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getPeriodicAnnounceLocution();


    /**
     * Get timeoutLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getTimeoutLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getTimeoutExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get fullLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getFullLocution();


    /**
     * Get fullExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getFullExtension();


    /**
     * Get fullVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getFullVoiceMailUser();



}

