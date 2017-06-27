<?php

namespace Core\Domain\Model\HuntGroup;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * HuntGroup
 */
class HuntGroup extends HuntGroupAbstract implements HuntGroupInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

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

        $self = new self(
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'noAnswerLocutionId' => $this->getNoAnswerLocution() ? $this->getNoAnswerLocution()->getId() : null,
            'noAnswerExtensionId' => $this->getNoAnswerExtension() ? $this->getNoAnswerExtension()->getId() : null,
            'noAnswerVoiceMailUserId' => $this->getNoAnswerVoiceMailUser() ? $this->getNoAnswerVoiceMailUser()->getId() : null
        ];
    }


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
     * Set noAnswerLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $noAnswerLocution
     *
     * @return self
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
     * Set noAnswerExtension
     *
     * @param \Core\Domain\Model\Extension\ExtensionInterface $noAnswerExtension
     *
     * @return self
     */
    protected function setNoAnswerExtension(\Core\Domain\Model\Extension\ExtensionInterface $noAnswerExtension = null)
    {
        $this->noAnswerExtension = $noAnswerExtension;

        return $this;
    }

    /**
     * Get noAnswerExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getNoAnswerExtension()
    {
        return $this->noAnswerExtension;
    }

    /**
     * Set noAnswerVoiceMailUser
     *
     * @param \Core\Domain\Model\User\UserInterface $noAnswerVoiceMailUser
     *
     * @return self
     */
    protected function setNoAnswerVoiceMailUser(\Core\Domain\Model\User\UserInterface $noAnswerVoiceMailUser = null)
    {
        $this->noAnswerVoiceMailUser = $noAnswerVoiceMailUser;

        return $this;
    }

    /**
     * Get noAnswerVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getNoAnswerVoiceMailUser()
    {
        return $this->noAnswerVoiceMailUser;
    }


}

