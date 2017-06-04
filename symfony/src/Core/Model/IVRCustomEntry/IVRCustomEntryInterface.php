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
     * @return \Core\Model\IVRCustom\IVRCustom
     */
    public function getIVRCustom();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getWelcomeLocution();


    /**
     * Get targetExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getTargetExtension();


    /**
     * Get targetVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getTargetVoiceMailUser();



}

