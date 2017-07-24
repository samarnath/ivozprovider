<?php

namespace Ivoz\Domain\Model\IVRCustom;

use Core\Domain\Model\EntityInterface;

interface IVRCustomInterface extends EntityInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();


    /**
     * Get noAnswerLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution();


    /**
     * Get errorLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getErrorLocution();


    /**
     * Get successLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution();


    /**
     * Get timeoutExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension();


    /**
     * Get errorExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension();


    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser();


    /**
     * Get errorVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser();



}

