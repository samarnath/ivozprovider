<?php

namespace Ivoz\Domain\Model\User;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * UserAbstract
 */
abstract class UserAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $email;

    /**
     * @comment password
     * @var string
     */
    protected $pass;

    /**
     * @var boolean
     */
    protected $doNotDisturb = '0';

    /**
     * @var boolean
     */
    protected $isBoss = '0';

    /**
     * @var string
     */
    protected $exceptionBoosAssistantRegExp;

    /**
     * @var boolean
     */
    protected $active = '0';

    /**
     * @var integer
     */
    protected $maxCalls = '0';

    /**
     * @comment enum:0|1|2|3
     * @var boolean
     */
    protected $externalIpCalls = '0';

    /**
     * @var boolean
     */
    protected $voicemailEnabled = '1';

    /**
     * @var boolean
     */
    protected $voicemailSendMail = '0';

    /**
     * @var boolean
     */
    protected $voicemailAttachSound = '1';

    /**
     * @var string
     */
    protected $tokenKey;

    /**
     * @var string
     */
    protected $areaCode;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    protected $callACL;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $bossAssistant;

    /**
     * @var \Ivoz\Domain\Model\Country\CountryInterface
     */
    protected $country;

    /**
     * @var \Ivoz\Domain\Model\Language\LanguageInterface
     */
    protected $language;

    /**
     * @var \Ivoz\Domain\Model\Terminal\TerminalInterface
     */
    protected $terminal;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $extension;

    /**
     * @var \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    protected $timezone;

    /**
     * @var \Ivoz\Domain\Model\DDI\DDIInterface
     */
    protected $outgoingDDI;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $name,
        $lastname,
        $doNotDisturb,
        $isBoss,
        $active,
        $maxCalls,
        $externalIpCalls,
        $voicemailEnabled,
        $voicemailSendMail,
        $voicemailAttachSound
    ) {
        $this->setName($name);
        $this->setLastname($lastname);
        $this->setDoNotDisturb($doNotDisturb);
        $this->setIsBoss($isBoss);
        $this->setActive($active);
        $this->setMaxCalls($maxCalls);
        $this->setExternalIpCalls($externalIpCalls);
        $this->setVoicemailEnabled($voicemailEnabled);
        $this->setVoicemailSendMail($voicemailSendMail);
        $this->setVoicemailAttachSound($voicemailAttachSound);
    }

    abstract public function __wakeup();

    /**
     * @return UserDTO
     */
    public static function createDTO()
    {
        return new UserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UserDTO
         */
        Assertion::isInstanceOf($dto, UserDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getLastname(),
            $dto->getDoNotDisturb(),
            $dto->getIsBoss(),
            $dto->getActive(),
            $dto->getMaxCalls(),
            $dto->getExternalIpCalls(),
            $dto->getVoicemailEnabled(),
            $dto->getVoicemailSendMail(),
            $dto->getVoicemailAttachSound());

        return $self
            ->setEmail($dto->getEmail())
            ->setPass($dto->getPass())
            ->setExceptionBoosAssistantRegExp($dto->getExceptionBoosAssistantRegExp())
            ->setTokenKey($dto->getTokenKey())
            ->setAreaCode($dto->getAreaCode())
            ->setCompany($dto->getCompany())
            ->setCallACL($dto->getCallACL())
            ->setBossAssistant($dto->getBossAssistant())
            ->setCountry($dto->getCountry())
            ->setLanguage($dto->getLanguage())
            ->setTerminal($dto->getTerminal())
            ->setExtension($dto->getExtension())
            ->setTimezone($dto->getTimezone())
            ->setOutgoingDDI($dto->getOutgoingDDI())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UserDTO
         */
        Assertion::isInstanceOf($dto, UserDTO::class);

        $this
            ->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setEmail($dto->getEmail())
            ->setPass($dto->getPass())
            ->setDoNotDisturb($dto->getDoNotDisturb())
            ->setIsBoss($dto->getIsBoss())
            ->setExceptionBoosAssistantRegExp($dto->getExceptionBoosAssistantRegExp())
            ->setActive($dto->getActive())
            ->setMaxCalls($dto->getMaxCalls())
            ->setExternalIpCalls($dto->getExternalIpCalls())
            ->setVoicemailEnabled($dto->getVoicemailEnabled())
            ->setVoicemailSendMail($dto->getVoicemailSendMail())
            ->setVoicemailAttachSound($dto->getVoicemailAttachSound())
            ->setTokenKey($dto->getTokenKey())
            ->setAreaCode($dto->getAreaCode())
            ->setCompany($dto->getCompany())
            ->setCallACL($dto->getCallACL())
            ->setBossAssistant($dto->getBossAssistant())
            ->setCountry($dto->getCountry())
            ->setLanguage($dto->getLanguage())
            ->setTerminal($dto->getTerminal())
            ->setExtension($dto->getExtension())
            ->setTimezone($dto->getTimezone())
            ->setOutgoingDDI($dto->getOutgoingDDI());


        return $this;
    }

    /**
     * @return UserDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setLastname($this->getLastname())
            ->setEmail($this->getEmail())
            ->setPass($this->getPass())
            ->setDoNotDisturb($this->getDoNotDisturb())
            ->setIsBoss($this->getIsBoss())
            ->setExceptionBoosAssistantRegExp($this->getExceptionBoosAssistantRegExp())
            ->setActive($this->getActive())
            ->setMaxCalls($this->getMaxCalls())
            ->setExternalIpCalls($this->getExternalIpCalls())
            ->setVoicemailEnabled($this->getVoicemailEnabled())
            ->setVoicemailSendMail($this->getVoicemailSendMail())
            ->setVoicemailAttachSound($this->getVoicemailAttachSound())
            ->setTokenKey($this->getTokenKey())
            ->setAreaCode($this->getAreaCode())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setCallACLId($this->getCallACL() ? $this->getCallACL()->getId() : null)
            ->setBossAssistantId($this->getBossAssistant() ? $this->getBossAssistant()->getId() : null)
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null)
            ->setLanguageId($this->getLanguage() ? $this->getLanguage()->getId() : null)
            ->setTerminalId($this->getTerminal() ? $this->getTerminal()->getId() : null)
            ->setExtensionId($this->getExtension() ? $this->getExtension()->getId() : null)
            ->setTimezoneId($this->getTimezone() ? $this->getTimezone()->getId() : null)
            ->setOutgoingDDIId($this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'lastname' => $this->getLastname(),
            'email' => $this->getEmail(),
            'pass' => $this->getPass(),
            'doNotDisturb' => $this->getDoNotDisturb(),
            'isBoss' => $this->getIsBoss(),
            'exceptionBoosAssistantRegExp' => $this->getExceptionBoosAssistantRegExp(),
            'active' => $this->getActive(),
            'maxCalls' => $this->getMaxCalls(),
            'externalIpCalls' => $this->getExternalIpCalls(),
            'voicemailEnabled' => $this->getVoicemailEnabled(),
            'voicemailSendMail' => $this->getVoicemailSendMail(),
            'voicemailAttachSound' => $this->getVoicemailAttachSound(),
            'tokenKey' => $this->getTokenKey(),
            'areaCode' => $this->getAreaCode(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'callACLId' => $this->getCallACL() ? $this->getCallACL()->getId() : null,
            'bossAssistantId' => $this->getBossAssistant() ? $this->getBossAssistant()->getId() : null,
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'terminalId' => $this->getTerminal() ? $this->getTerminal()->getId() : null,
            'extensionId' => $this->getExtension() ? $this->getExtension()->getId() : null,
            'timezoneId' => $this->getTimezone() ? $this->getTimezone()->getId() : null,
            'outgoingDDIId' => $this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 100);

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return self
     */
    protected function setLastname($lastname)
    {
        Assertion::notNull($lastname);
        Assertion::maxLength($lastname, 100);

        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return self
     */
    protected function setEmail($email = null)
    {
        if (!is_null($email)) {
            Assertion::maxLength($email, 100);
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return self
     */
    protected function setPass($pass = null)
    {
        if (!is_null($pass)) {
            Assertion::maxLength($pass, 80);
        }

        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set doNotDisturb
     *
     * @param boolean $doNotDisturb
     *
     * @return self
     */
    protected function setDoNotDisturb($doNotDisturb)
    {
        Assertion::notNull($doNotDisturb);
        Assertion::between(intval($doNotDisturb), 0, 1);

        $this->doNotDisturb = $doNotDisturb;

        return $this;
    }

    /**
     * Get doNotDisturb
     *
     * @return boolean
     */
    public function getDoNotDisturb()
    {
        return $this->doNotDisturb;
    }

    /**
     * Set isBoss
     *
     * @param boolean $isBoss
     *
     * @return self
     */
    protected function setIsBoss($isBoss)
    {
        Assertion::notNull($isBoss);
        Assertion::between(intval($isBoss), 0, 1);

        $this->isBoss = $isBoss;

        return $this;
    }

    /**
     * Get isBoss
     *
     * @return boolean
     */
    public function getIsBoss()
    {
        return $this->isBoss;
    }

    /**
     * Set exceptionBoosAssistantRegExp
     *
     * @param string $exceptionBoosAssistantRegExp
     *
     * @return self
     */
    protected function setExceptionBoosAssistantRegExp($exceptionBoosAssistantRegExp = null)
    {
        if (!is_null($exceptionBoosAssistantRegExp)) {
            Assertion::maxLength($exceptionBoosAssistantRegExp, 255);
        }

        $this->exceptionBoosAssistantRegExp = $exceptionBoosAssistantRegExp;

        return $this;
    }

    /**
     * Get exceptionBoosAssistantRegExp
     *
     * @return string
     */
    public function getExceptionBoosAssistantRegExp()
    {
        return $this->exceptionBoosAssistantRegExp;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return self
     */
    protected function setActive($active)
    {
        Assertion::notNull($active);
        Assertion::between(intval($active), 0, 1);

        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set maxCalls
     *
     * @param integer $maxCalls
     *
     * @return self
     */
    protected function setMaxCalls($maxCalls)
    {
        Assertion::notNull($maxCalls);
        Assertion::integerish($maxCalls);
        Assertion::greaterOrEqualThan($maxCalls, 0);

        $this->maxCalls = $maxCalls;

        return $this;
    }

    /**
     * Get maxCalls
     *
     * @return integer
     */
    public function getMaxCalls()
    {
        return $this->maxCalls;
    }

    /**
     * Set externalIpCalls
     *
     * @param boolean $externalIpCalls
     *
     * @return self
     */
    protected function setExternalIpCalls($externalIpCalls)
    {
        Assertion::notNull($externalIpCalls);
        Assertion::between(intval($externalIpCalls), 0, 1);
        Assertion::choice($externalIpCalls, array (
          0 => '0',
          1 => '1',
          2 => '2',
          3 => '3',
        ));

        $this->externalIpCalls = $externalIpCalls;

        return $this;
    }

    /**
     * Get externalIpCalls
     *
     * @return boolean
     */
    public function getExternalIpCalls()
    {
        return $this->externalIpCalls;
    }

    /**
     * Set voicemailEnabled
     *
     * @param boolean $voicemailEnabled
     *
     * @return self
     */
    protected function setVoicemailEnabled($voicemailEnabled)
    {
        Assertion::notNull($voicemailEnabled);
        Assertion::between(intval($voicemailEnabled), 0, 1);

        $this->voicemailEnabled = $voicemailEnabled;

        return $this;
    }

    /**
     * Get voicemailEnabled
     *
     * @return boolean
     */
    public function getVoicemailEnabled()
    {
        return $this->voicemailEnabled;
    }

    /**
     * Set voicemailSendMail
     *
     * @param boolean $voicemailSendMail
     *
     * @return self
     */
    protected function setVoicemailSendMail($voicemailSendMail)
    {
        Assertion::notNull($voicemailSendMail);
        Assertion::between(intval($voicemailSendMail), 0, 1);

        $this->voicemailSendMail = $voicemailSendMail;

        return $this;
    }

    /**
     * Get voicemailSendMail
     *
     * @return boolean
     */
    public function getVoicemailSendMail()
    {
        return $this->voicemailSendMail;
    }

    /**
     * Set voicemailAttachSound
     *
     * @param boolean $voicemailAttachSound
     *
     * @return self
     */
    protected function setVoicemailAttachSound($voicemailAttachSound)
    {
        Assertion::notNull($voicemailAttachSound);
        Assertion::between(intval($voicemailAttachSound), 0, 1);

        $this->voicemailAttachSound = $voicemailAttachSound;

        return $this;
    }

    /**
     * Get voicemailAttachSound
     *
     * @return boolean
     */
    public function getVoicemailAttachSound()
    {
        return $this->voicemailAttachSound;
    }

    /**
     * Set tokenKey
     *
     * @param string $tokenKey
     *
     * @return self
     */
    protected function setTokenKey($tokenKey = null)
    {
        if (!is_null($tokenKey)) {
            Assertion::maxLength($tokenKey, 125);
        }

        $this->tokenKey = $tokenKey;

        return $this;
    }

    /**
     * Get tokenKey
     *
     * @return string
     */
    public function getTokenKey()
    {
        return $this->tokenKey;
    }

    /**
     * Set areaCode
     *
     * @param string $areaCode
     *
     * @return self
     */
    protected function setAreaCode($areaCode = null)
    {
        if (!is_null($areaCode)) {
            Assertion::maxLength($areaCode, 10);
        }

        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set callACL
     *
     * @param \Ivoz\Domain\Model\CallACL\CallACLInterface $callACL
     *
     * @return self
     */
    protected function setCallACL(\Ivoz\Domain\Model\CallACL\CallACLInterface $callACL = null)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set bossAssistant
     *
     * @param UserInterface $bossAssistant
     *
     * @return self
     */
    protected function setBossAssistant(UserInterface $bossAssistant = null)
    {
        $this->bossAssistant = $bossAssistant;

        return $this;
    }

    /**
     * Get bossAssistant
     *
     * @return UserInterface
     */
    public function getBossAssistant()
    {
        return $this->bossAssistant;
    }

    /**
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    protected function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set language
     *
     * @param \Ivoz\Domain\Model\Language\LanguageInterface $language
     *
     * @return self
     */
    protected function setLanguage(\Ivoz\Domain\Model\Language\LanguageInterface $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Ivoz\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set terminal
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface $terminal
     *
     * @return self
     */
    protected function setTerminal(\Ivoz\Domain\Model\Terminal\TerminalInterface $terminal = null)
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get terminal
     *
     * @return \Ivoz\Domain\Model\Terminal\TerminalInterface
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Set extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    protected function setExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set timezone
     *
     * @param \Ivoz\Domain\Model\Timezone\TimezoneInterface $timezone
     *
     * @return self
     */
    protected function setTimezone(\Ivoz\Domain\Model\Timezone\TimezoneInterface $timezone = null)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set outgoingDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI
     *
     * @return self
     */
    protected function setOutgoingDDI(\Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI = null)
    {
        $this->outgoingDDI = $outgoingDDI;

        return $this;
    }

    /**
     * Get outgoingDDI
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }



    // @codeCoverageIgnoreEnd
}

