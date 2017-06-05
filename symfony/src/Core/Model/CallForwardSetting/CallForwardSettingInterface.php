<?php

namespace Core\Model\CallForwardSetting;



interface CallForwardSettingInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get callTypeFilter
     *
     * @return string
     */
    public function getCallTypeFilter();


    /**
     * Get callForwardType
     *
     * @return string
     */
    public function getCallForwardType();


    /**
     * Get targetType
     *
     * @return string
     */
    public function getTargetType();


    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue();


    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout();


    /**
     * Get user
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getUser();


    /**
     * Get extension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getExtension();


    /**
     * Get voiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getVoiceMailUser();



}

