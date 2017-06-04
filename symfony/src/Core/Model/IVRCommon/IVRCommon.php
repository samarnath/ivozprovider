<?php

namespace Core\Model\IVRCommon;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * IVRCommon
 */
class IVRCommon implements EntityInterface, IVRCommonInterface
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
    protected $blackListRegExp;

    /**
     * @var integer
     */
    protected $timeout;

    /**
     * @var integer
     */
    protected $maxDigits;

    /**
     * @var integer
     */
    protected $noAnswerTimeout = '10';

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $timeoutTargetType;

    /**
     * @var string
     */
    protected $timeoutNumberValue;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $errorTargetType;

    /**
     * @var string
     */
    protected $errorNumberValue;

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $welcomeLocution;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $noAnswerLocution;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $errorLocution;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $successLocution;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $timeoutExtension;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $errorExtension;

    /**
     * @var \Core\Model\User\User
     */
    protected $timeoutVoiceMailUser;

    /**
     * @var \Core\Model\User\User
     */
    protected $errorVoiceMailUser;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name, $timeout, $maxDigits)
    {
        $this->setName($name);
        $this->setTimeout($timeout);
        $this->setMaxDigits($maxDigits);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return IVRCommonDTO
     */
    public static function createDTO()
    {
        return new IVRCommonDTO();
    }

    /**
     * Factory method
     * @param IVRCommonDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, IVRCommonDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getTimeout(),
            $dto->getMaxDigits()
        );

        return $self
            ->setBlackListRegExp($dto->getBlackListRegExp())
            ->setNoAnswerTimeout($dto->getNoAnswerTimeout())
            ->setTimeoutTargetType($dto->getTimeoutTargetType())
            ->setTimeoutNumberValue($dto->getTimeoutNumberValue())
            ->setErrorTargetType($dto->getErrorTargetType())
            ->setErrorNumberValue($dto->getErrorNumberValue())
            ->setCompany($dto->getCompany())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setNoAnswerLocution($dto->getNoAnswerLocution())
            ->setErrorLocution($dto->getErrorLocution())
            ->setSuccessLocution($dto->getSuccessLocution())
            ->setTimeoutExtension($dto->getTimeoutExtension())
            ->setErrorExtension($dto->getErrorExtension())
            ->setTimeoutVoiceMailUser($dto->getTimeoutVoiceMailUser())
            ->setErrorVoiceMailUser($dto->getErrorVoiceMailUser());
    }

    /**
     * @param IVRCommonDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, IVRCommonDTO::class);

        $this
            ->setName($dto->getName())
            ->setBlackListRegExp($dto->getBlackListRegExp())
            ->setTimeout($dto->getTimeout())
            ->setMaxDigits($dto->getMaxDigits())
            ->setNoAnswerTimeout($dto->getNoAnswerTimeout())
            ->setTimeoutTargetType($dto->getTimeoutTargetType())
            ->setTimeoutNumberValue($dto->getTimeoutNumberValue())
            ->setErrorTargetType($dto->getErrorTargetType())
            ->setErrorNumberValue($dto->getErrorNumberValue())
            ->setCompany($dto->getCompany())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setNoAnswerLocution($dto->getNoAnswerLocution())
            ->setErrorLocution($dto->getErrorLocution())
            ->setSuccessLocution($dto->getSuccessLocution())
            ->setTimeoutExtension($dto->getTimeoutExtension())
            ->setErrorExtension($dto->getErrorExtension())
            ->setTimeoutVoiceMailUser($dto->getTimeoutVoiceMailUser())
            ->setErrorVoiceMailUser($dto->getErrorVoiceMailUser());


        return $this;
    }

    /**
     * @return IVRCommonDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setBlackListRegExp($this->getBlackListRegExp())
            ->setTimeout($this->getTimeout())
            ->setMaxDigits($this->getMaxDigits())
            ->setNoAnswerTimeout($this->getNoAnswerTimeout())
            ->setTimeoutTargetType($this->getTimeoutTargetType())
            ->setTimeoutNumberValue($this->getTimeoutNumberValue())
            ->setErrorTargetType($this->getErrorTargetType())
            ->setErrorNumberValue($this->getErrorNumberValue())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setWelcomeLocutionId($this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null)
            ->setNoAnswerLocutionId($this->getNoAnswerLocution() ? $this->getNoAnswerLocution()->getId() : null)
            ->setErrorLocutionId($this->getErrorLocution() ? $this->getErrorLocution()->getId() : null)
            ->setSuccessLocutionId($this->getSuccessLocution() ? $this->getSuccessLocution()->getId() : null)
            ->setTimeoutExtensionId($this->getTimeoutExtension() ? $this->getTimeoutExtension()->getId() : null)
            ->setErrorExtensionId($this->getErrorExtension() ? $this->getErrorExtension()->getId() : null)
            ->setTimeoutVoiceMailUserId($this->getTimeoutVoiceMailUser() ? $this->getTimeoutVoiceMailUser()->getId() : null)
            ->setErrorVoiceMailUserId($this->getErrorVoiceMailUser() ? $this->getErrorVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'blackListRegExp' => $this->getBlackListRegExp(),
            'timeout' => $this->getTimeout(),
            'maxDigits' => $this->getMaxDigits(),
            'noAnswerTimeout' => $this->getNoAnswerTimeout(),
            'timeoutTargetType' => $this->getTimeoutTargetType(),
            'timeoutNumberValue' => $this->getTimeoutNumberValue(),
            'errorTargetType' => $this->getErrorTargetType(),
            'errorNumberValue' => $this->getErrorNumberValue(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'welcomeLocutionId' => $this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null,
            'noAnswerLocutionId' => $this->getNoAnswerLocution() ? $this->getNoAnswerLocution()->getId() : null,
            'errorLocutionId' => $this->getErrorLocution() ? $this->getErrorLocution()->getId() : null,
            'successLocutionId' => $this->getSuccessLocution() ? $this->getSuccessLocution()->getId() : null,
            'timeoutExtensionId' => $this->getTimeoutExtension() ? $this->getTimeoutExtension()->getId() : null,
            'errorExtensionId' => $this->getErrorExtension() ? $this->getErrorExtension()->getId() : null,
            'timeoutVoiceMailUserId' => $this->getTimeoutVoiceMailUser() ? $this->getTimeoutVoiceMailUser()->getId() : null,
            'errorVoiceMailUserId' => $this->getErrorVoiceMailUser() ? $this->getErrorVoiceMailUser()->getId() : null
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
     * @return IVRCommon
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 50);

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
     * Set blackListRegExp
     *
     * @param string $blackListRegExp
     *
     * @return IVRCommon
     */
    protected function setBlackListRegExp($blackListRegExp = null)
    {
        if (!is_null($blackListRegExp)) {
            Assertion::maxLength($blackListRegExp, 255);
        }

        $this->blackListRegExp = $blackListRegExp;

        return $this;
    }

    /**
     * Get blackListRegExp
     *
     * @return string
     */
    public function getBlackListRegExp()
    {
        return $this->blackListRegExp;
    }

    /**
     * Set timeout
     *
     * @param integer $timeout
     *
     * @return IVRCommon
     */
    protected function setTimeout($timeout)
    {
        Assertion::notNull($timeout);
        Assertion::integerish($timeout);
        Assertion::greaterOrEqualThan($timeout, 0);

        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get timeout
     *
     * @return integer
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set maxDigits
     *
     * @param integer $maxDigits
     *
     * @return IVRCommon
     */
    protected function setMaxDigits($maxDigits)
    {
        Assertion::notNull($maxDigits);
        Assertion::integerish($maxDigits);
        Assertion::greaterOrEqualThan($maxDigits, 0);

        $this->maxDigits = $maxDigits;

        return $this;
    }

    /**
     * Get maxDigits
     *
     * @return integer
     */
    public function getMaxDigits()
    {
        return $this->maxDigits;
    }

    /**
     * Set noAnswerTimeout
     *
     * @param integer $noAnswerTimeout
     *
     * @return IVRCommon
     */
    protected function setNoAnswerTimeout($noAnswerTimeout = null)
    {
        if (!is_null($noAnswerTimeout)) {
            if (!is_null($noAnswerTimeout)) {
                Assertion::integerish($noAnswerTimeout);
            }
        }

        $this->noAnswerTimeout = $noAnswerTimeout;

        return $this;
    }

    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout()
    {
        return $this->noAnswerTimeout;
    }

    /**
     * Set timeoutTargetType
     *
     * @param string $timeoutTargetType
     *
     * @return IVRCommon
     */
    protected function setTimeoutTargetType($timeoutTargetType = null)
    {
        if (!is_null($timeoutTargetType)) {
            Assertion::maxLength($timeoutTargetType, 25);
        Assertion::choice($timeoutTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->timeoutTargetType = $timeoutTargetType;

        return $this;
    }

    /**
     * Get timeoutTargetType
     *
     * @return string
     */
    public function getTimeoutTargetType()
    {
        return $this->timeoutTargetType;
    }

    /**
     * Set timeoutNumberValue
     *
     * @param string $timeoutNumberValue
     *
     * @return IVRCommon
     */
    protected function setTimeoutNumberValue($timeoutNumberValue = null)
    {
        if (!is_null($timeoutNumberValue)) {
            Assertion::maxLength($timeoutNumberValue, 25);
        }

        $this->timeoutNumberValue = $timeoutNumberValue;

        return $this;
    }

    /**
     * Get timeoutNumberValue
     *
     * @return string
     */
    public function getTimeoutNumberValue()
    {
        return $this->timeoutNumberValue;
    }

    /**
     * Set errorTargetType
     *
     * @param string $errorTargetType
     *
     * @return IVRCommon
     */
    protected function setErrorTargetType($errorTargetType = null)
    {
        if (!is_null($errorTargetType)) {
            Assertion::maxLength($errorTargetType, 25);
        Assertion::choice($errorTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->errorTargetType = $errorTargetType;

        return $this;
    }

    /**
     * Get errorTargetType
     *
     * @return string
     */
    public function getErrorTargetType()
    {
        return $this->errorTargetType;
    }

    /**
     * Set errorNumberValue
     *
     * @param string $errorNumberValue
     *
     * @return IVRCommon
     */
    protected function setErrorNumberValue($errorNumberValue = null)
    {
        if (!is_null($errorNumberValue)) {
            Assertion::maxLength($errorNumberValue, 25);
        }

        $this->errorNumberValue = $errorNumberValue;

        return $this;
    }

    /**
     * Get errorNumberValue
     *
     * @return string
     */
    public function getErrorNumberValue()
    {
        return $this->errorNumberValue;
    }

    /**
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return IVRCommon
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
     * Set welcomeLocution
     *
     * @param \Core\Model\Locution\Locution $welcomeLocution
     *
     * @return IVRCommon
     */
    protected function setWelcomeLocution(\Core\Model\Locution\Locution $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set noAnswerLocution
     *
     * @param \Core\Model\Locution\Locution $noAnswerLocution
     *
     * @return IVRCommon
     */
    protected function setNoAnswerLocution(\Core\Model\Locution\Locution $noAnswerLocution = null)
    {
        $this->noAnswerLocution = $noAnswerLocution;

        return $this;
    }

    /**
     * Get noAnswerLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getNoAnswerLocution()
    {
        return $this->noAnswerLocution;
    }

    /**
     * Set errorLocution
     *
     * @param \Core\Model\Locution\Locution $errorLocution
     *
     * @return IVRCommon
     */
    protected function setErrorLocution(\Core\Model\Locution\Locution $errorLocution = null)
    {
        $this->errorLocution = $errorLocution;

        return $this;
    }

    /**
     * Get errorLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getErrorLocution()
    {
        return $this->errorLocution;
    }

    /**
     * Set successLocution
     *
     * @param \Core\Model\Locution\Locution $successLocution
     *
     * @return IVRCommon
     */
    protected function setSuccessLocution(\Core\Model\Locution\Locution $successLocution = null)
    {
        $this->successLocution = $successLocution;

        return $this;
    }

    /**
     * Get successLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getSuccessLocution()
    {
        return $this->successLocution;
    }

    /**
     * Set timeoutExtension
     *
     * @param \Core\Model\Extension\Extension $timeoutExtension
     *
     * @return IVRCommon
     */
    protected function setTimeoutExtension(\Core\Model\Extension\Extension $timeoutExtension = null)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * Get timeoutExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * Set errorExtension
     *
     * @param \Core\Model\Extension\Extension $errorExtension
     *
     * @return IVRCommon
     */
    protected function setErrorExtension(\Core\Model\Extension\Extension $errorExtension = null)
    {
        $this->errorExtension = $errorExtension;

        return $this;
    }

    /**
     * Get errorExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getErrorExtension()
    {
        return $this->errorExtension;
    }

    /**
     * Set timeoutVoiceMailUser
     *
     * @param \Core\Model\User\User $timeoutVoiceMailUser
     *
     * @return IVRCommon
     */
    protected function setTimeoutVoiceMailUser(\Core\Model\User\User $timeoutVoiceMailUser = null)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * Set errorVoiceMailUser
     *
     * @param \Core\Model\User\User $errorVoiceMailUser
     *
     * @return IVRCommon
     */
    protected function setErrorVoiceMailUser(\Core\Model\User\User $errorVoiceMailUser = null)
    {
        $this->errorVoiceMailUser = $errorVoiceMailUser;

        return $this;
    }

    /**
     * Get errorVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getErrorVoiceMailUser()
    {
        return $this->errorVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

