<?php

namespace Ivoz\Domain\Model\CallForwardSetting;

use Core\Domain\Model\EntityInterface;

interface CallForwardSettingInterface extends EntityInterface
{
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
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();


    /**
     * Get extension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension();


    /**
     * Get voiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getVoiceMailUser();



}

