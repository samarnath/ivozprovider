<?php

namespace Ivoz\Domain\Model\Queue;



interface QueueInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get periodicAnnounceLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getPeriodicAnnounceLocution();


    /**
     * Get timeoutLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getTimeoutLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get fullLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getFullLocution();


    /**
     * Get fullExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getFullExtension();


    /**
     * Get fullVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getFullVoiceMailUser();



}

