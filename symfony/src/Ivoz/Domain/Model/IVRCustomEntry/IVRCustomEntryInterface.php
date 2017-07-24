<?php

namespace Ivoz\Domain\Model\IVRCustomEntry;

use Core\Domain\Model\EntityInterface;

interface IVRCustomEntryInterface extends EntityInterface
{
    /**
     * Get entry
     *
     * @return string
     */
    public function getEntry();


    /**
     * Get targetType
     *
     * @return string
     */
    public function getTargetType();


    /**
     * Get targetNumberValue
     *
     * @return string
     */
    public function getTargetNumberValue();


    /**
     * Get iVRCustom
     *
     * @return \Ivoz\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom();


    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();


    /**
     * Get targetExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTargetExtension();


    /**
     * Get targetVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTargetVoiceMailUser();



}

