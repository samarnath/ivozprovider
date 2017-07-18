<?php

namespace Core\Domain\Model\ExternalCallFilter;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilterAbstract
 */
abstract class ExternalCallFilterAbstract implements EntityInterface
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
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $holidayTargetType;

    /**
     * @var string
     */
    protected $holidayNumberValue;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $outOfScheduleTargetType;

    /**
     * @var string
     */
    protected $outOfScheduleNumberValue;

    /**
     * @var string
     */
    protected $blackListRegExp;

    /**
     * @var string
     */
    protected $whiteListRegExp;

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
    protected $holidayLocution;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $outOfScheduleLocution;

    /**
     * @var \Core\Domain\Model\Extension\ExtensionInterface
     */
    protected $holidayExtension;

    /**
     * @var \Core\Domain\Model\Extension\ExtensionInterface
     */
    protected $outOfScheduleExtension;

    /**
     * @var \Core\Domain\Model\User\UserInterface
     */
    protected $holidayVoiceMailUser;

    /**
     * @var \Core\Domain\Model\User\UserInterface
     */
    protected $outOfScheduleVoiceMailUser;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return ExternalCallFilterDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterDTO
         */
        Assertion::isInstanceOf($dto, ExternalCallFilterDTO::class);

        $self = new static(
            $dto->getName()
        );

        return $self
            ->setHolidayTargetType($dto->getHolidayTargetType())
            ->setHolidayNumberValue($dto->getHolidayNumberValue())
            ->setOutOfScheduleTargetType($dto->getOutOfScheduleTargetType())
            ->setOutOfScheduleNumberValue($dto->getOutOfScheduleNumberValue())
            ->setBlackListRegExp($dto->getBlackListRegExp())
            ->setWhiteListRegExp($dto->getWhiteListRegExp())
            ->setCompany($dto->getCompany())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setHolidayLocution($dto->getHolidayLocution())
            ->setOutOfScheduleLocution($dto->getOutOfScheduleLocution())
            ->setHolidayExtension($dto->getHolidayExtension())
            ->setOutOfScheduleExtension($dto->getOutOfScheduleExtension())
            ->setHolidayVoiceMailUser($dto->getHolidayVoiceMailUser())
            ->setOutOfScheduleVoiceMailUser($dto->getOutOfScheduleVoiceMailUser());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterDTO
         */
        Assertion::isInstanceOf($dto, ExternalCallFilterDTO::class);

        $this
            ->setName($dto->getName())
            ->setHolidayTargetType($dto->getHolidayTargetType())
            ->setHolidayNumberValue($dto->getHolidayNumberValue())
            ->setOutOfScheduleTargetType($dto->getOutOfScheduleTargetType())
            ->setOutOfScheduleNumberValue($dto->getOutOfScheduleNumberValue())
            ->setBlackListRegExp($dto->getBlackListRegExp())
            ->setWhiteListRegExp($dto->getWhiteListRegExp())
            ->setCompany($dto->getCompany())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setHolidayLocution($dto->getHolidayLocution())
            ->setOutOfScheduleLocution($dto->getOutOfScheduleLocution())
            ->setHolidayExtension($dto->getHolidayExtension())
            ->setOutOfScheduleExtension($dto->getOutOfScheduleExtension())
            ->setHolidayVoiceMailUser($dto->getHolidayVoiceMailUser())
            ->setOutOfScheduleVoiceMailUser($dto->getOutOfScheduleVoiceMailUser());


        return $this;
    }

    /**
     * @return ExternalCallFilterDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setHolidayTargetType($this->getHolidayTargetType())
            ->setHolidayNumberValue($this->getHolidayNumberValue())
            ->setOutOfScheduleTargetType($this->getOutOfScheduleTargetType())
            ->setOutOfScheduleNumberValue($this->getOutOfScheduleNumberValue())
            ->setBlackListRegExp($this->getBlackListRegExp())
            ->setWhiteListRegExp($this->getWhiteListRegExp())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setWelcomeLocutionId($this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null)
            ->setHolidayLocutionId($this->getHolidayLocution() ? $this->getHolidayLocution()->getId() : null)
            ->setOutOfScheduleLocutionId($this->getOutOfScheduleLocution() ? $this->getOutOfScheduleLocution()->getId() : null)
            ->setHolidayExtensionId($this->getHolidayExtension() ? $this->getHolidayExtension()->getId() : null)
            ->setOutOfScheduleExtensionId($this->getOutOfScheduleExtension() ? $this->getOutOfScheduleExtension()->getId() : null)
            ->setHolidayVoiceMailUserId($this->getHolidayVoiceMailUser() ? $this->getHolidayVoiceMailUser()->getId() : null)
            ->setOutOfScheduleVoiceMailUserId($this->getOutOfScheduleVoiceMailUser() ? $this->getOutOfScheduleVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'holidayTargetType' => $this->getHolidayTargetType(),
            'holidayNumberValue' => $this->getHolidayNumberValue(),
            'outOfScheduleTargetType' => $this->getOutOfScheduleTargetType(),
            'outOfScheduleNumberValue' => $this->getOutOfScheduleNumberValue(),
            'blackListRegExp' => $this->getBlackListRegExp(),
            'whiteListRegExp' => $this->getWhiteListRegExp(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'welcomeLocutionId' => $this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null,
            'holidayLocutionId' => $this->getHolidayLocution() ? $this->getHolidayLocution()->getId() : null,
            'outOfScheduleLocutionId' => $this->getOutOfScheduleLocution() ? $this->getOutOfScheduleLocution()->getId() : null,
            'holidayExtensionId' => $this->getHolidayExtension() ? $this->getHolidayExtension()->getId() : null,
            'outOfScheduleExtensionId' => $this->getOutOfScheduleExtension() ? $this->getOutOfScheduleExtension()->getId() : null,
            'holidayVoiceMailUserId' => $this->getHolidayVoiceMailUser() ? $this->getHolidayVoiceMailUser()->getId() : null,
            'outOfScheduleVoiceMailUserId' => $this->getOutOfScheduleVoiceMailUser() ? $this->getOutOfScheduleVoiceMailUser()->getId() : null
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
     * Set holidayTargetType
     *
     * @param string $holidayTargetType
     *
     * @return self
     */
    protected function setHolidayTargetType($holidayTargetType = null)
    {
        if (!is_null($holidayTargetType)) {
            Assertion::maxLength($holidayTargetType, 25);
        Assertion::choice($holidayTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->holidayTargetType = $holidayTargetType;

        return $this;
    }

    /**
     * Get holidayTargetType
     *
     * @return string
     */
    public function getHolidayTargetType()
    {
        return $this->holidayTargetType;
    }

    /**
     * Set holidayNumberValue
     *
     * @param string $holidayNumberValue
     *
     * @return self
     */
    protected function setHolidayNumberValue($holidayNumberValue = null)
    {
        if (!is_null($holidayNumberValue)) {
            Assertion::maxLength($holidayNumberValue, 25);
        }

        $this->holidayNumberValue = $holidayNumberValue;

        return $this;
    }

    /**
     * Get holidayNumberValue
     *
     * @return string
     */
    public function getHolidayNumberValue()
    {
        return $this->holidayNumberValue;
    }

    /**
     * Set outOfScheduleTargetType
     *
     * @param string $outOfScheduleTargetType
     *
     * @return self
     */
    protected function setOutOfScheduleTargetType($outOfScheduleTargetType = null)
    {
        if (!is_null($outOfScheduleTargetType)) {
            Assertion::maxLength($outOfScheduleTargetType, 25);
        Assertion::choice($outOfScheduleTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->outOfScheduleTargetType = $outOfScheduleTargetType;

        return $this;
    }

    /**
     * Get outOfScheduleTargetType
     *
     * @return string
     */
    public function getOutOfScheduleTargetType()
    {
        return $this->outOfScheduleTargetType;
    }

    /**
     * Set outOfScheduleNumberValue
     *
     * @param string $outOfScheduleNumberValue
     *
     * @return self
     */
    protected function setOutOfScheduleNumberValue($outOfScheduleNumberValue = null)
    {
        if (!is_null($outOfScheduleNumberValue)) {
            Assertion::maxLength($outOfScheduleNumberValue, 25);
        }

        $this->outOfScheduleNumberValue = $outOfScheduleNumberValue;

        return $this;
    }

    /**
     * Get outOfScheduleNumberValue
     *
     * @return string
     */
    public function getOutOfScheduleNumberValue()
    {
        return $this->outOfScheduleNumberValue;
    }

    /**
     * Set blackListRegExp
     *
     * @param string $blackListRegExp
     *
     * @return self
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
     * Set whiteListRegExp
     *
     * @param string $whiteListRegExp
     *
     * @return self
     */
    protected function setWhiteListRegExp($whiteListRegExp = null)
    {
        if (!is_null($whiteListRegExp)) {
            Assertion::maxLength($whiteListRegExp, 255);
        }

        $this->whiteListRegExp = $whiteListRegExp;

        return $this;
    }

    /**
     * Get whiteListRegExp
     *
     * @return string
     */
    public function getWhiteListRegExp()
    {
        return $this->whiteListRegExp;
    }

    /**
     * Set company
     *
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
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
     * @return self
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
     * Set holidayLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $holidayLocution
     *
     * @return self
     */
    protected function setHolidayLocution(\Core\Domain\Model\Locution\LocutionInterface $holidayLocution = null)
    {
        $this->holidayLocution = $holidayLocution;

        return $this;
    }

    /**
     * Get holidayLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getHolidayLocution()
    {
        return $this->holidayLocution;
    }

    /**
     * Set outOfScheduleLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $outOfScheduleLocution
     *
     * @return self
     */
    protected function setOutOfScheduleLocution(\Core\Domain\Model\Locution\LocutionInterface $outOfScheduleLocution = null)
    {
        $this->outOfScheduleLocution = $outOfScheduleLocution;

        return $this;
    }

    /**
     * Get outOfScheduleLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getOutOfScheduleLocution()
    {
        return $this->outOfScheduleLocution;
    }

    /**
     * Set holidayExtension
     *
     * @param \Core\Domain\Model\Extension\ExtensionInterface $holidayExtension
     *
     * @return self
     */
    protected function setHolidayExtension(\Core\Domain\Model\Extension\ExtensionInterface $holidayExtension = null)
    {
        $this->holidayExtension = $holidayExtension;

        return $this;
    }

    /**
     * Get holidayExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getHolidayExtension()
    {
        return $this->holidayExtension;
    }

    /**
     * Set outOfScheduleExtension
     *
     * @param \Core\Domain\Model\Extension\ExtensionInterface $outOfScheduleExtension
     *
     * @return self
     */
    protected function setOutOfScheduleExtension(\Core\Domain\Model\Extension\ExtensionInterface $outOfScheduleExtension = null)
    {
        $this->outOfScheduleExtension = $outOfScheduleExtension;

        return $this;
    }

    /**
     * Get outOfScheduleExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getOutOfScheduleExtension()
    {
        return $this->outOfScheduleExtension;
    }

    /**
     * Set holidayVoiceMailUser
     *
     * @param \Core\Domain\Model\User\UserInterface $holidayVoiceMailUser
     *
     * @return self
     */
    protected function setHolidayVoiceMailUser(\Core\Domain\Model\User\UserInterface $holidayVoiceMailUser = null)
    {
        $this->holidayVoiceMailUser = $holidayVoiceMailUser;

        return $this;
    }

    /**
     * Get holidayVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getHolidayVoiceMailUser()
    {
        return $this->holidayVoiceMailUser;
    }

    /**
     * Set outOfScheduleVoiceMailUser
     *
     * @param \Core\Domain\Model\User\UserInterface $outOfScheduleVoiceMailUser
     *
     * @return self
     */
    protected function setOutOfScheduleVoiceMailUser(\Core\Domain\Model\User\UserInterface $outOfScheduleVoiceMailUser = null)
    {
        $this->outOfScheduleVoiceMailUser = $outOfScheduleVoiceMailUser;

        return $this;
    }

    /**
     * Get outOfScheduleVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getOutOfScheduleVoiceMailUser()
    {
        return $this->outOfScheduleVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

