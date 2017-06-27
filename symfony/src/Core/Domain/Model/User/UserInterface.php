<?php

namespace Core\Domain\Model\User;



interface UserInterface
{
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
     * Get externalIpCalls
     *
     * @return boolean
     */
    public function getExternalIpCalls();


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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get callACL
     *
     * @return \Core\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL();


    /**
     * Get bossAssistant
     *
     * @return UserInterface
     */
    public function getBossAssistant();


    /**
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry();


    /**
     * Get language
     *
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage();


    /**
     * Get terminal
     *
     * @return \Core\Domain\Model\Terminal\TerminalInterface
     */
    public function getTerminal();


    /**
     * Get extension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension();


    /**
     * Get timezone
     *
     * @return \Core\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone();


    /**
     * Get outgoingDDI
     *
     * @return \Core\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI();



}

