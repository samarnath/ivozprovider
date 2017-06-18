<?php

namespace Core\Domain\Model\IVRCustom;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * IVRCustom
 */
class IVRCustom implements EntityInterface, IVRCustomInterface
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
     * @var \Core\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $welcomeLocution;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $noAnswerLocution;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $errorLocution;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $successLocution;

    /**
     * @var \Core\Domain\Model\Extension\ExtensionInterface
     */
    protected $timeoutExtension;

    /**
     * @var \Core\Domain\Model\Extension\ExtensionInterface
     */
    protected $errorExtension;

    /**
     * @var \Core\Domain\Model\User\UserInterface
     */
    protected $timeoutVoiceMailUser;

    /**
     * @var \Core\Domain\Model\User\UserInterface
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
     * @return IVRCustomDTO
     */
    public static function createDTO()
    {
        return new IVRCustomDTO();
    }

    /**
     * Factory method
     * @param IVRCustomDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, IVRCustomDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getTimeout(),
            $dto->getMaxDigits()
        );

        return $self
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
     * @param IVRCustomDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, IVRCustomDTO::class);

        $this
            ->setName($dto->getName())
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
     * @return IVRCustomDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
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
     * @return IVRCustom
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
     * Set timeout
     *
     * @param integer $timeout
     *
     * @return IVRCustom
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
     * @return IVRCustom
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
     * @return IVRCustom
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
     * @return IVRCustom
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
     * @return IVRCustom
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
     * @return IVRCustom
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
     * @return IVRCustom
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
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return IVRCustom
     */
    protected function setCompany(\Core\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set welcomeLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return IVRCustom
     */
    protected function setWelcomeLocution(\Core\Domain\Model\Locution\LocutionInterface $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set noAnswerLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $noAnswerLocution
     *
     * @return IVRCustom
     */
    protected function setNoAnswerLocution(\Core\Domain\Model\Locution\LocutionInterface $noAnswerLocution = null)
    {
        $this->noAnswerLocution = $noAnswerLocution;

        return $this;
    }

    /**
     * Get noAnswerLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution()
    {
        return $this->noAnswerLocution;
    }

    /**
     * Set errorLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $errorLocution
     *
     * @return IVRCustom
     */
    protected function setErrorLocution(\Core\Domain\Model\Locution\LocutionInterface $errorLocution = null)
    {
        $this->errorLocution = $errorLocution;

        return $this;
    }

    /**
     * Get errorLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getErrorLocution()
    {
        return $this->errorLocution;
    }

    /**
     * Set successLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $successLocution
     *
     * @return IVRCustom
     */
    protected function setSuccessLocution(\Core\Domain\Model\Locution\LocutionInterface $successLocution = null)
    {
        $this->successLocution = $successLocution;

        return $this;
    }

    /**
     * Get successLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution()
    {
        return $this->successLocution;
    }

    /**
     * Set timeoutExtension
     *
     * @param \Core\Domain\Model\Extension\ExtensionInterface $timeoutExtension
     *
     * @return IVRCustom
     */
    protected function setTimeoutExtension(\Core\Domain\Model\Extension\ExtensionInterface $timeoutExtension = null)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * Get timeoutExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * Set errorExtension
     *
     * @param \Core\Domain\Model\Extension\ExtensionInterface $errorExtension
     *
     * @return IVRCustom
     */
    protected function setErrorExtension(\Core\Domain\Model\Extension\ExtensionInterface $errorExtension = null)
    {
        $this->errorExtension = $errorExtension;

        return $this;
    }

    /**
     * Get errorExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension()
    {
        return $this->errorExtension;
    }

    /**
     * Set timeoutVoiceMailUser
     *
     * @param \Core\Domain\Model\User\UserInterface $timeoutVoiceMailUser
     *
     * @return IVRCustom
     */
    protected function setTimeoutVoiceMailUser(\Core\Domain\Model\User\UserInterface $timeoutVoiceMailUser = null)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * Set errorVoiceMailUser
     *
     * @param \Core\Domain\Model\User\UserInterface $errorVoiceMailUser
     *
     * @return IVRCustom
     */
    protected function setErrorVoiceMailUser(\Core\Domain\Model\User\UserInterface $errorVoiceMailUser = null)
    {
        $this->errorVoiceMailUser = $errorVoiceMailUser;

        return $this;
    }

    /**
     * Get errorVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser()
    {
        return $this->errorVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

