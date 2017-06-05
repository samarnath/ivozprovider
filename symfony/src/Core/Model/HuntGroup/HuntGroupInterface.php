<?php

namespace Core\Model\HuntGroup;



interface HuntGroupInterface
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
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy();


    /**
     * Get ringAllTimeout
     *
     * @return integer
     */
    public function getRingAllTimeout();


    /**
     * Get nextUserPosition
     *
     * @return integer
     */
    public function getNextUserPosition();


    /**
     * Get noAnswerTargetType
     *
     * @return string
     */
    public function getNoAnswerTargetType();


    /**
     * Get noAnswerNumberValue
     *
     * @return string
     */
    public function getNoAnswerNumberValue();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get noAnswerLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution();


    /**
     * Get noAnswerExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getNoAnswerExtension();


    /**
     * Get noAnswerVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getNoAnswerVoiceMailUser();



}

