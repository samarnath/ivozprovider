<?php

namespace Core\Model\IVRCustom;



interface IVRCustomInterface
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
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();


    /**
     * Get noAnswerLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution();


    /**
     * Get errorLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getErrorLocution();


    /**
     * Get successLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension();


    /**
     * Get errorExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get errorVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser();



}

