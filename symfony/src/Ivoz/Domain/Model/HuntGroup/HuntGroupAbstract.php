<?php

namespace Ivoz\Domain\Model\HuntGroup;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * HuntGroupAbstract
 */
abstract class HuntGroupAbstract
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @comment enum:ringAll|linear|roundRobin|random
     * @var string
     */
    protected $strategy;

    /**
     * @var integer
     */
    protected $ringAllTimeout;

    /**
     * @var integer
     */
    protected $nextUserPosition = '0';

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $noAnswerTargetType;

    /**
     * @var string
     */
    protected $noAnswerNumberValue;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $noAnswerLocution;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $noAnswerExtension;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $noAnswerVoiceMailUser;


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
        $description,
        $strategy,
        $ringAllTimeout
    ) {
        $this->setName($name);
        $this->setDescription($description);
        $this->setStrategy($strategy);
        $this->setRingAllTimeout($ringAllTimeout);
    }

    abstract public function __wakeup();

    /**
     * @return HuntGroupDTO
     */
    public static function createDTO()
    {
        return new HuntGroupDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HuntGroupDTO
         */
        Assertion::isInstanceOf($dto, HuntGroupDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getDescription(),
            $dto->getStrategy(),
            $dto->getRingAllTimeout());

        return $self
            ->setNextUserPosition($dto->getNextUserPosition())
            ->setNoAnswerTargetType($dto->getNoAnswerTargetType())
            ->setNoAnswerNumberValue($dto->getNoAnswerNumberValue())
            ->setCompany($dto->getCompany())
            ->setNoAnswerLocution($dto->getNoAnswerLocution())
            ->setNoAnswerExtension($dto->getNoAnswerExtension())
            ->setNoAnswerVoiceMailUser($dto->getNoAnswerVoiceMailUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HuntGroupDTO
         */
        Assertion::isInstanceOf($dto, HuntGroupDTO::class);

        $this
            ->setName($dto->getName())
            ->setDescription($dto->getDescription())
            ->setStrategy($dto->getStrategy())
            ->setRingAllTimeout($dto->getRingAllTimeout())
            ->setNextUserPosition($dto->getNextUserPosition())
            ->setNoAnswerTargetType($dto->getNoAnswerTargetType())
            ->setNoAnswerNumberValue($dto->getNoAnswerNumberValue())
            ->setCompany($dto->getCompany())
            ->setNoAnswerLocution($dto->getNoAnswerLocution())
            ->setNoAnswerExtension($dto->getNoAnswerExtension())
            ->setNoAnswerVoiceMailUser($dto->getNoAnswerVoiceMailUser());


        return $this;
    }

    /**
     * @return HuntGroupDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setDescription($this->getDescription())
            ->setStrategy($this->getStrategy())
            ->setRingAllTimeout($this->getRingAllTimeout())
            ->setNextUserPosition($this->getNextUserPosition())
            ->setNoAnswerTargetType($this->getNoAnswerTargetType())
            ->setNoAnswerNumberValue($this->getNoAnswerNumberValue())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setNoAnswerLocutionId($this->getNoAnswerLocution() ? $this->getNoAnswerLocution()->getId() : null)
            ->setNoAnswerExtensionId($this->getNoAnswerExtension() ? $this->getNoAnswerExtension()->getId() : null)
            ->setNoAnswerVoiceMailUserId($this->getNoAnswerVoiceMailUser() ? $this->getNoAnswerVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'strategy' => $this->getStrategy(),
            'ringAllTimeout' => $this->getRingAllTimeout(),
            'nextUserPosition' => $this->getNextUserPosition(),
            'noAnswerTargetType' => $this->getNoAnswerTargetType(),
            'noAnswerNumberValue' => $this->getNoAnswerNumberValue(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'noAnswerLocutionId' => $this->getNoAnswerLocution() ? $this->getNoAnswerLocution()->getId() : null,
            'noAnswerExtensionId' => $this->getNoAnswerExtension() ? $this->getNoAnswerExtension()->getId() : null,
            'noAnswerVoiceMailUserId' => $this->getNoAnswerVoiceMailUser() ? $this->getNoAnswerVoiceMailUser()->getId() : null
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
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 500);

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set strategy
     *
     * @param string $strategy
     *
     * @return self
     */
    protected function setStrategy($strategy)
    {
        Assertion::notNull($strategy);
        Assertion::maxLength($strategy, 25);
        Assertion::choice($strategy, array (
          0 => 'ringAll',
          1 => 'linear',
          2 => 'roundRobin',
          3 => 'random',
        ));

        $this->strategy = $strategy;

        return $this;
    }

    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Set ringAllTimeout
     *
     * @param integer $ringAllTimeout
     *
     * @return self
     */
    protected function setRingAllTimeout($ringAllTimeout)
    {
        Assertion::notNull($ringAllTimeout);
        Assertion::integerish($ringAllTimeout);

        $this->ringAllTimeout = $ringAllTimeout;

        return $this;
    }

    /**
     * Get ringAllTimeout
     *
     * @return integer
     */
    public function getRingAllTimeout()
    {
        return $this->ringAllTimeout;
    }

    /**
     * Set nextUserPosition
     *
     * @param integer $nextUserPosition
     *
     * @return self
     */
    protected function setNextUserPosition($nextUserPosition = null)
    {
        if (!is_null($nextUserPosition)) {
            if (!is_null($nextUserPosition)) {
                Assertion::integerish($nextUserPosition);
                Assertion::greaterOrEqualThan($nextUserPosition, 0);
            }
        }

        $this->nextUserPosition = $nextUserPosition;

        return $this;
    }

    /**
     * Get nextUserPosition
     *
     * @return integer
     */
    public function getNextUserPosition()
    {
        return $this->nextUserPosition;
    }

    /**
     * Set noAnswerTargetType
     *
     * @param string $noAnswerTargetType
     *
     * @return self
     */
    protected function setNoAnswerTargetType($noAnswerTargetType = null)
    {
        if (!is_null($noAnswerTargetType)) {
            Assertion::maxLength($noAnswerTargetType, 25);
        Assertion::choice($noAnswerTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->noAnswerTargetType = $noAnswerTargetType;

        return $this;
    }

    /**
     * Get noAnswerTargetType
     *
     * @return string
     */
    public function getNoAnswerTargetType()
    {
        return $this->noAnswerTargetType;
    }

    /**
     * Set noAnswerNumberValue
     *
     * @param string $noAnswerNumberValue
     *
     * @return self
     */
    protected function setNoAnswerNumberValue($noAnswerNumberValue = null)
    {
        if (!is_null($noAnswerNumberValue)) {
            Assertion::maxLength($noAnswerNumberValue, 25);
        }

        $this->noAnswerNumberValue = $noAnswerNumberValue;

        return $this;
    }

    /**
     * Get noAnswerNumberValue
     *
     * @return string
     */
    public function getNoAnswerNumberValue()
    {
        return $this->noAnswerNumberValue;
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
     * Set noAnswerExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $noAnswerExtension
     *
     * @return self
     */
    protected function setNoAnswerExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $noAnswerExtension = null)
    {
        $this->noAnswerExtension = $noAnswerExtension;

        return $this;
    }

    /**
     * Get noAnswerExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getNoAnswerExtension()
    {
        return $this->noAnswerExtension;
    }

    /**
     * Set noAnswerVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $noAnswerVoiceMailUser
     *
     * @return self
     */
    protected function setNoAnswerVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $noAnswerVoiceMailUser = null)
    {
        $this->noAnswerVoiceMailUser = $noAnswerVoiceMailUser;

        return $this;
    }

    /**
     * Get noAnswerVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getNoAnswerVoiceMailUser()
    {
        return $this->noAnswerVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

