<?php

namespace Core\Domain\Model\IVRCommon;



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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();


    /**
     * Get noAnswerLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution();


    /**
     * Get errorLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getErrorLocution();


    /**
     * Get successLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension();


    /**
     * Get errorExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get errorVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser();



}

