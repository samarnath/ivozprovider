<?php

namespace Core\Domain\Model\User;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UserDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var boolean
     */
    private $doNotDisturb = '0';

    /**
     * @var boolean
     */
    private $isBoss = '0';

    /**
     * @var string
     */
    private $exceptionBoosAssistantRegExp;

    /**
     * @var boolean
     */
    private $active = '0';

    /**
     * @var integer
     */
    private $maxCalls = '0';

    /**
     * @var boolean
     */
    private $externalIpCalls = '0';

    /**
     * @var boolean
     */
    private $voicemailEnabled = '1';

    /**
     * @var boolean
     */
    private $voicemailSendMail = '0';

    /**
     * @var boolean
     */
    private $voicemailAttachSound = '1';

    /**
     * @var string
     */
    private $tokenKey;

    /**
     * @var string
     */
    private $areaCode;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $callACLId;

    /**
     * @var mixed
     */
    private $bossAssistantId;

    /**
     * @var mixed
     */
    private $countryId;

    /**
     * @var mixed
     */
    private $languageId;

    /**
     * @var mixed
     */
    private $terminalId;

    /**
     * @var mixed
     */
    private $extensionId;

    /**
     * @var mixed
     */
    private $timezoneId;

    /**
     * @var mixed
     */
    private $outgoingDDIId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $callACL;

    /**
     * @var mixed
     */
    private $bossAssistant;

    /**
     * @var mixed
     */
    private $country;

    /**
     * @var mixed
     */
    private $language;

    /**
     * @var mixed
     */
    private $terminal;

    /**
     * @var mixed
     */
    private $extension;

    /**
     * @var mixed
     */
    private $timezone;

    /**
     * @var mixed
     */
    private $outgoingDDI;

    /**
     * @return array
     */
    public function __toArray()
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
            'externalIpCalls' => $this->getExternalIpCalls(),
            'voicemailEnabled' => $this->getVoicemailEnabled(),
            'voicemailSendMail' => $this->getVoicemailSendMail(),
            'voicemailAttachSound' => $this->getVoicemailAttachSound(),
            'tokenKey' => $this->getTokenKey(),
            'areaCode' => $this->getAreaCode(),
            'companyId' => $this->getCompanyId(),
            'callACLId' => $this->getCallACLId(),
            'bossAssistantId' => $this->getBossAssistantId(),
            'countryId' => $this->getCountryId(),
            'languageId' => $this->getLanguageId(),
            'terminalId' => $this->getTerminalId(),
            'extensionId' => $this->getExtensionId(),
            'timezoneId' => $this->getTimezoneId(),
            'outgoingDDIId' => $this->getOutgoingDDIId()
        ];
    }

    /**
     * @param array $data
     * @return self
     * @deprecated
     *
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setLastname(isset($data['lastname']) ? $data['lastname'] : null)
            ->setEmail(isset($data['email']) ? $data['email'] : null)
            ->setPass(isset($data['pass']) ? $data['pass'] : null)
            ->setDoNotDisturb(isset($data['doNotDisturb']) ? $data['doNotDisturb'] : null)
            ->setIsBoss(isset($data['isBoss']) ? $data['isBoss'] : null)
            ->setExceptionBoosAssistantRegExp(isset($data['exceptionBoosAssistantRegExp']) ? $data['exceptionBoosAssistantRegExp'] : null)
            ->setActive(isset($data['active']) ? $data['active'] : null)
            ->setMaxCalls(isset($data['maxCalls']) ? $data['maxCalls'] : null)
            ->setExternalIpCalls(isset($data['externalIpCalls']) ? $data['externalIpCalls'] : null)
            ->setVoicemailEnabled(isset($data['voicemailEnabled']) ? $data['voicemailEnabled'] : null)
            ->setVoicemailSendMail(isset($data['voicemailSendMail']) ? $data['voicemailSendMail'] : null)
            ->setVoicemailAttachSound(isset($data['voicemailAttachSound']) ? $data['voicemailAttachSound'] : null)
            ->setTokenKey(isset($data['tokenKey']) ? $data['tokenKey'] : null)
            ->setAreaCode(isset($data['areaCode']) ? $data['areaCode'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setCallACLId(isset($data['callACLId']) ? $data['callACLId'] : null)
            ->setBossAssistantId(isset($data['bossAssistantId']) ? $data['bossAssistantId'] : null)
            ->setCountryId(isset($data['countryId']) ? $data['countryId'] : null)
            ->setLanguageId(isset($data['languageId']) ? $data['languageId'] : null)
            ->setTerminalId(isset($data['terminalId']) ? $data['terminalId'] : null)
            ->setExtensionId(isset($data['extensionId']) ? $data['extensionId'] : null)
            ->setTimezoneId(isset($data['timezoneId']) ? $data['timezoneId'] : null)
            ->setOutgoingDDIId(isset($data['outgoingDDIId']) ? $data['outgoingDDIId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->callACL = $transformer->transform('Core\\Domain\\Model\\CallACL\\CallACL', $this->getCallACLId());
        $this->bossAssistant = $transformer->transform('Core\\Domain\\Model\\User\\User', $this->getBossAssistantId());
        $this->country = $transformer->transform('Core\\Domain\\Model\\Country\\Country', $this->getCountryId());
        $this->language = $transformer->transform('Core\\Domain\\Model\\Language\\Language', $this->getLanguageId());
        $this->terminal = $transformer->transform('Core\\Domain\\Model\\Terminal\\Terminal', $this->getTerminalId());
        $this->extension = $transformer->transform('Core\\Domain\\Model\\Extension\\Extension', $this->getExtensionId());
        $this->timezone = $transformer->transform('Core\\Domain\\Model\\Timezone\\Timezone', $this->getTimezoneId());
        $this->outgoingDDI = $transformer->transform('Core\\Domain\\Model\\DDI\\DDI', $this->getOutgoingDDIId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return UserDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return UserDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $lastname
     *
     * @return UserDTO
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $email
     *
     * @return UserDTO
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $pass
     *
     * @return UserDTO
     */
    public function setPass($pass = null)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param boolean $doNotDisturb
     *
     * @return UserDTO
     */
    public function setDoNotDisturb($doNotDisturb)
    {
        $this->doNotDisturb = $doNotDisturb;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDoNotDisturb()
    {
        return $this->doNotDisturb;
    }

    /**
     * @param boolean $isBoss
     *
     * @return UserDTO
     */
    public function setIsBoss($isBoss)
    {
        $this->isBoss = $isBoss;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsBoss()
    {
        return $this->isBoss;
    }

    /**
     * @param string $exceptionBoosAssistantRegExp
     *
     * @return UserDTO
     */
    public function setExceptionBoosAssistantRegExp($exceptionBoosAssistantRegExp = null)
    {
        $this->exceptionBoosAssistantRegExp = $exceptionBoosAssistantRegExp;

        return $this;
    }

    /**
     * @return string
     */
    public function getExceptionBoosAssistantRegExp()
    {
        return $this->exceptionBoosAssistantRegExp;
    }

    /**
     * @param boolean $active
     *
     * @return UserDTO
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param integer $maxCalls
     *
     * @return UserDTO
     */
    public function setMaxCalls($maxCalls)
    {
        $this->maxCalls = $maxCalls;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxCalls()
    {
        return $this->maxCalls;
    }

    /**
     * @param boolean $externalIpCalls
     *
     * @return UserDTO
     */
    public function setExternalIpCalls($externalIpCalls)
    {
        $this->externalIpCalls = $externalIpCalls;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExternalIpCalls()
    {
        return $this->externalIpCalls;
    }

    /**
     * @param boolean $voicemailEnabled
     *
     * @return UserDTO
     */
    public function setVoicemailEnabled($voicemailEnabled)
    {
        $this->voicemailEnabled = $voicemailEnabled;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getVoicemailEnabled()
    {
        return $this->voicemailEnabled;
    }

    /**
     * @param boolean $voicemailSendMail
     *
     * @return UserDTO
     */
    public function setVoicemailSendMail($voicemailSendMail)
    {
        $this->voicemailSendMail = $voicemailSendMail;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getVoicemailSendMail()
    {
        return $this->voicemailSendMail;
    }

    /**
     * @param boolean $voicemailAttachSound
     *
     * @return UserDTO
     */
    public function setVoicemailAttachSound($voicemailAttachSound)
    {
        $this->voicemailAttachSound = $voicemailAttachSound;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getVoicemailAttachSound()
    {
        return $this->voicemailAttachSound;
    }

    /**
     * @param string $tokenKey
     *
     * @return UserDTO
     */
    public function setTokenKey($tokenKey = null)
    {
        $this->tokenKey = $tokenKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getTokenKey()
    {
        return $this->tokenKey;
    }

    /**
     * @param string $areaCode
     *
     * @return UserDTO
     */
    public function setAreaCode($areaCode = null)
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param integer $companyId
     *
     * @return UserDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $callACLId
     *
     * @return UserDTO
     */
    public function setCallACLId($callACLId)
    {
        $this->callACLId = $callACLId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallACLId()
    {
        return $this->callACLId;
    }

    /**
     * @return \Core\Domain\Model\CallACL\CallACL
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * @param integer $bossAssistantId
     *
     * @return UserDTO
     */
    public function setBossAssistantId($bossAssistantId)
    {
        $this->bossAssistantId = $bossAssistantId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBossAssistantId()
    {
        return $this->bossAssistantId;
    }

    /**
     * @return \Core\Domain\Model\User\User
     */
    public function getBossAssistant()
    {
        return $this->bossAssistant;
    }

    /**
     * @param integer $countryId
     *
     * @return UserDTO
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @return \Core\Domain\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param integer $languageId
     *
     * @return UserDTO
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @return \Core\Domain\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param integer $terminalId
     *
     * @return UserDTO
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTerminalId()
    {
        return $this->terminalId;
    }

    /**
     * @return \Core\Domain\Model\Terminal\Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @param integer $extensionId
     *
     * @return UserDTO
     */
    public function setExtensionId($extensionId)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * @return \Core\Domain\Model\Extension\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param integer $timezoneId
     *
     * @return UserDTO
     */
    public function setTimezoneId($timezoneId)
    {
        $this->timezoneId = $timezoneId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimezoneId()
    {
        return $this->timezoneId;
    }

    /**
     * @return \Core\Domain\Model\Timezone\Timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param integer $outgoingDDIId
     *
     * @return UserDTO
     */
    public function setOutgoingDDIId($outgoingDDIId)
    {
        $this->outgoingDDIId = $outgoingDDIId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingDDIId()
    {
        return $this->outgoingDDIId;
    }

    /**
     * @return \Core\Domain\Model\DDI\DDI
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }
}

