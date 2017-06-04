<?php

namespace Core\Model\ExternalCallFilter;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilter
 */
class ExternalCallFilter implements EntityInterface, ExternalCallFilterInterface
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
    protected $holidayLocution;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $outOfScheduleLocution;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $holidayExtension;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $outOfScheduleExtension;

    /**
     * @var \Core\Model\User\User
     */
    protected $holidayVoiceMailUser;

    /**
     * @var \Core\Model\User\User
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
     * @param ExternalCallFilterDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExternalCallFilterDTO::class);

        $self = new self(
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
     * @param ExternalCallFilterDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
        return self::createDTO()
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
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * @param \Core\Model\Company\Company $company
     *
     * @return ExternalCallFilter
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
     * @return ExternalCallFilter
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
     * Set holidayLocution
     *
     * @param \Core\Model\Locution\Locution $holidayLocution
     *
     * @return ExternalCallFilter
     */
    protected function setHolidayLocution(\Core\Model\Locution\Locution $holidayLocution = null)
    {
        $this->holidayLocution = $holidayLocution;

        return $this;
    }

    /**
     * Get holidayLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getHolidayLocution()
    {
        return $this->holidayLocution;
    }

    /**
     * Set outOfScheduleLocution
     *
     * @param \Core\Model\Locution\Locution $outOfScheduleLocution
     *
     * @return ExternalCallFilter
     */
    protected function setOutOfScheduleLocution(\Core\Model\Locution\Locution $outOfScheduleLocution = null)
    {
        $this->outOfScheduleLocution = $outOfScheduleLocution;

        return $this;
    }

    /**
     * Get outOfScheduleLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getOutOfScheduleLocution()
    {
        return $this->outOfScheduleLocution;
    }

    /**
     * Set holidayExtension
     *
     * @param \Core\Model\Extension\Extension $holidayExtension
     *
     * @return ExternalCallFilter
     */
    protected function setHolidayExtension(\Core\Model\Extension\Extension $holidayExtension = null)
    {
        $this->holidayExtension = $holidayExtension;

        return $this;
    }

    /**
     * Get holidayExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getHolidayExtension()
    {
        return $this->holidayExtension;
    }

    /**
     * Set outOfScheduleExtension
     *
     * @param \Core\Model\Extension\Extension $outOfScheduleExtension
     *
     * @return ExternalCallFilter
     */
    protected function setOutOfScheduleExtension(\Core\Model\Extension\Extension $outOfScheduleExtension = null)
    {
        $this->outOfScheduleExtension = $outOfScheduleExtension;

        return $this;
    }

    /**
     * Get outOfScheduleExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getOutOfScheduleExtension()
    {
        return $this->outOfScheduleExtension;
    }

    /**
     * Set holidayVoiceMailUser
     *
     * @param \Core\Model\User\User $holidayVoiceMailUser
     *
     * @return ExternalCallFilter
     */
    protected function setHolidayVoiceMailUser(\Core\Model\User\User $holidayVoiceMailUser = null)
    {
        $this->holidayVoiceMailUser = $holidayVoiceMailUser;

        return $this;
    }

    /**
     * Get holidayVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getHolidayVoiceMailUser()
    {
        return $this->holidayVoiceMailUser;
    }

    /**
     * Set outOfScheduleVoiceMailUser
     *
     * @param \Core\Model\User\User $outOfScheduleVoiceMailUser
     *
     * @return ExternalCallFilter
     */
    protected function setOutOfScheduleVoiceMailUser(\Core\Model\User\User $outOfScheduleVoiceMailUser = null)
    {
        $this->outOfScheduleVoiceMailUser = $outOfScheduleVoiceMailUser;

        return $this;
    }

    /**
     * Get outOfScheduleVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getOutOfScheduleVoiceMailUser()
    {
        return $this->outOfScheduleVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

