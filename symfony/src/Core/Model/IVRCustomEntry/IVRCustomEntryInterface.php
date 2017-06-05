<?php

namespace Core\Model\IVRCustomEntry;



interface IVRCustomEntryInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();


    /**
     * Get targetExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getTargetExtension();


    /**
     * Get targetVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getTargetVoiceMailUser();



}

