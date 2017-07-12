<?php

namespace Ivoz\Domain\Model\IVRCustom;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * IVRCustomAbstract
 */
abstract class IVRCustomAbstract
{
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
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $welcomeLocution;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $noAnswerLocution;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $errorLocution;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $successLocution;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $timeoutExtension;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $errorExtension;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $timeoutVoiceMailUser;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
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

    abstract public function __wakeup();

    /**
     * @return IVRCustomDTO
     */
    public static function createDTO()
    {
        return new IVRCustomDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IVRCustomDTO
         */
        Assertion::isInstanceOf($dto, IVRCustomDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getTimeout(),
            $dto->getMaxDigits());

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
            ->setErrorVoiceMailUser($dto->getErrorVoiceMailUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IVRCustomDTO
         */
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
     * Set name
     *
     * @param string $name
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * Set welcomeLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return self
     */
    protected function setWelcomeLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set noAnswerLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $noAnswerLocution
     *
     * @return self
     */
    protected function setNoAnswerLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $noAnswerLocution = null)
    {
        $this->noAnswerLocution = $noAnswerLocution;

        return $this;
    }

    /**
     * Get noAnswerLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution()
    {
        return $this->noAnswerLocution;
    }

    /**
     * Set errorLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $errorLocution
     *
     * @return self
     */
    protected function setErrorLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $errorLocution = null)
    {
        $this->errorLocution = $errorLocution;

        return $this;
    }

    /**
     * Get errorLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getErrorLocution()
    {
        return $this->errorLocution;
    }

    /**
     * Set successLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $successLocution
     *
     * @return self
     */
    protected function setSuccessLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $successLocution = null)
    {
        $this->successLocution = $successLocution;

        return $this;
    }

    /**
     * Get successLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution()
    {
        return $this->successLocution;
    }

    /**
     * Set timeoutExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $timeoutExtension
     *
     * @return self
     */
    protected function setTimeoutExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $timeoutExtension = null)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * Get timeoutExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * Set errorExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $errorExtension
     *
     * @return self
     */
    protected function setErrorExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $errorExtension = null)
    {
        $this->errorExtension = $errorExtension;

        return $this;
    }

    /**
     * Get errorExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension()
    {
        return $this->errorExtension;
    }

    /**
     * Set timeoutVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $timeoutVoiceMailUser
     *
     * @return self
     */
    protected function setTimeoutVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $timeoutVoiceMailUser = null)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * Set errorVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $errorVoiceMailUser
     *
     * @return self
     */
    protected function setErrorVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $errorVoiceMailUser = null)
    {
        $this->errorVoiceMailUser = $errorVoiceMailUser;

        return $this;
    }

    /**
     * Get errorVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser()
    {
        return $this->errorVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

