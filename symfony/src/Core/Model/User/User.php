<?php

namespace Core\Model\User;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * User
 */
class User implements EntityInterface, UserInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\CallACL\CallACL
     */
    protected $callACL;

    /**
     * @var \Core\Model\User\User
     */
    protected $bossAssistant;

    /**
     * @var \Core\Model\Country\Country
     */
    protected $country;

    /**
     * @var \Core\Model\Language\Language
     */
    protected $language;

    /**
     * @var \Core\Model\Terminal\Terminal
     */
    protected $terminal;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $extension;

    /**
     * @var \Core\Model\Timezone\Timezone
     */
    protected $timezone;

    /**
     * @var \Core\Model\DDI\DDI
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
        $this->setVoicemailEnabled($voicemailEnabled);
        $this->setVoicemailSendMail($voicemailSendMail);
        $this->setVoicemailAttachSound($voicemailAttachSound);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return UserDTO
     */
    public static function createDTO()
    {
        return new UserDTO();
    }

    /**
     * Factory method
     * @param UserDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UserDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getLastname(),
            $dto->getDoNotDisturb(),
            $dto->getIsBoss(),
            $dto->getActive(),
            $dto->getMaxCalls(),
            $dto->getVoicemailEnabled(),
            $dto->getVoicemailSendMail(),
            $dto->getVoicemailAttachSound()
        );

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
            ->setOutgoingDDI($dto->getOutgoingDDI());
    }

    /**
     * @param UserDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
            ->setName($this->getName())
            ->setLastname($this->getLastname())
            ->setEmail($this->getEmail())
            ->setPass($this->getPass())
            ->setDoNotDisturb($this->getDoNotDisturb())
            ->setIsBoss($this->getIsBoss())
            ->setExceptionBoosAssistantRegExp($this->getExceptionBoosAssistantRegExp())
            ->setActive($this->getActive())
            ->setMaxCalls($this->getMaxCalls())
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
            'id' => $this->getId(),
            'name' => $this->getName(),
            'lastname' => $this->getLastname(),
            'email' => $this->getEmail(),
            'pass' => $this->getPass(),
            'doNotDisturb' => $this->getDoNotDisturb(),
            'isBoss' => $this->getIsBoss(),
            'exceptionBoosAssistantRegExp' => $this->getExceptionBoosAssistantRegExp(),
            'active' => $this->getActive(),
            'maxCalls' => $this->getMaxCalls(),
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * Set voicemailEnabled
     *
     * @param boolean $voicemailEnabled
     *
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @param \Core\Model\Company\Company $company
     *
     * @return User
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set callACL
     *
     * @param \Core\Model\CallACL\CallACL $callACL
     *
     * @return User
     */
    protected function setCallACL(\Core\Model\CallACL\CallACL $callACL = null)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Core\Model\CallACL\CallACL
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set bossAssistant
     *
     * @param \Core\Model\User\User $bossAssistant
     *
     * @return User
     */
    protected function setBossAssistant(\Core\Model\User\User $bossAssistant = null)
    {
        $this->bossAssistant = $bossAssistant;

        return $this;
    }

    /**
     * Get bossAssistant
     *
     * @return \Core\Model\User\User
     */
    public function getBossAssistant()
    {
        return $this->bossAssistant;
    }

    /**
     * Set country
     *
     * @param \Core\Model\Country\Country $country
     *
     * @return User
     */
    protected function setCountry(\Core\Model\Country\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set language
     *
     * @param \Core\Model\Language\Language $language
     *
     * @return User
     */
    protected function setLanguage(\Core\Model\Language\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Core\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set terminal
     *
     * @param \Core\Model\Terminal\Terminal $terminal
     *
     * @return User
     */
    protected function setTerminal(\Core\Model\Terminal\Terminal $terminal = null)
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get terminal
     *
     * @return \Core\Model\Terminal\Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Set extension
     *
     * @param \Core\Model\Extension\Extension $extension
     *
     * @return User
     */
    protected function setExtension(\Core\Model\Extension\Extension $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set timezone
     *
     * @param \Core\Model\Timezone\Timezone $timezone
     *
     * @return User
     */
    protected function setTimezone(\Core\Model\Timezone\Timezone $timezone = null)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \Core\Model\Timezone\Timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set outgoingDDI
     *
     * @param \Core\Model\DDI\DDI $outgoingDDI
     *
     * @return User
     */
    protected function setOutgoingDDI(\Core\Model\DDI\DDI $outgoingDDI = null)
    {
        $this->outgoingDDI = $outgoingDDI;

        return $this;
    }

    /**
     * Get outgoingDDI
     *
     * @return \Core\Model\DDI\DDI
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }



    // @codeCoverageIgnoreEnd
}

