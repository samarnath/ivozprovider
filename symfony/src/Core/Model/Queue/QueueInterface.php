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
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get periodicAnnounceLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getPeriodicAnnounceLocution();


    /**
     * Get timeoutLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getTimeoutLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get fullLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getFullLocution();


    /**
     * Get fullExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getFullExtension();


    /**
     * Get fullVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getFullVoiceMailUser();



}

