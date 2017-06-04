<?php

namespace Core\Model\User;



interface UserInterface
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
     * Get lastname
     *
     * @return string
     */
    public function getLastname();


    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();


    /**
     * Get pass
     *
     * @return string
     */
    public function getPass();


    /**
     * Get doNotDisturb
     *
     * @return boolean
     */
    public function getDoNotDisturb();


    /**
     * Get isBoss
     *
     * @return boolean
     */
    public function getIsBoss();


    /**
     * Get exceptionBoosAssistantRegExp
     *
     * @return string
     */
    public function getExceptionBoosAssistantRegExp();


    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive();


    /**
     * Get maxCalls
     *
     * @return integer
     */
    public function getMaxCalls();


    /**
     * Get voicemailEnabled
     *
     * @return boolean
     */
    public function getVoicemailEnabled();


    /**
     * Get voicemailSendMail
     *
     * @return boolean
     */
    public function getVoicemailSendMail();


    /**
     * Get voicemailAttachSound
     *
     * @return boolean
     */
    public function getVoicemailAttachSound();


    /**
     * Get tokenKey
     *
     * @return string
     */
    public function getTokenKey();


    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get callACL
     *
     * @return \Core\Model\CallACL\CallACL
     */
    public function getCallACL();


    /**
     * Get bossAssistant
     *
     * @return \Core\Model\User\User
     */
    public function getBossAssistant();


    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry();


    /**
     * Get language
     *
     * @return \Core\Model\Language\Language
     */
    public function getLanguage();


    /**
     * Get terminal
     *
     * @return \Core\Model\Terminal\Terminal
     */
    public function getTerminal();


    /**
     * Get extension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getExtension();


    /**
     * Get timezone
     *
     * @return \Core\Model\Timezone\Timezone
     */
    public function getTimezone();


    /**
     * Get outgoingDDI
     *
     * @return \Core\Model\DDI\DDI
     */
    public function getOutgoingDDI();



}

