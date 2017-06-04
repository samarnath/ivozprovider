<?php

namespace Core\Model\IVRCommon;



interface IVRCommonInterface
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
     * Get blackListRegExp
     *
     * @return string
     */
    public function getBlackListRegExp();


    /**
     * Get timeout
     *
     * @return integer
     */
    public function getTimeout();


    /**
     * Get maxDigits
     *
     * @return integer
     */
    public function getMaxDigits();


    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout();


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
     * Get errorTargetType
     *
     * @return string
     */
    public function getErrorTargetType();


    /**
     * Get errorNumberValue
     *
     * @return string
     */
    public function getErrorNumberValue();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getWelcomeLocution();


    /**
     * Get noAnswerLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getNoAnswerLocution();


    /**
     * Get errorLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getErrorLocution();


    /**
     * Get successLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getSuccessLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getTimeoutExtension();


    /**
     * Get errorExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getErrorExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get errorVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getErrorVoiceMailUser();



}

