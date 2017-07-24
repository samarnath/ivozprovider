<?php

namespace Ivoz\Domain\Model\Service;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ServiceAbstract
 */
abstract class ServiceAbstract
{
    /**
     * @var string
     */
    protected $iden = '';

    /**
     * @var string
     */
    protected $defaultCode;

    /**
     * @var boolean
     */
    protected $extraArgs = '0';

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Description
     */
    protected $description;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $iden,
        $defaultCode,
        $extraArgs,
        Name $name,
        Description $description
    ) {
        $this->setIden($iden);
        $this->setDefaultCode($defaultCode);
        $this->setExtraArgs($extraArgs);
        $this->setName($name);
        $this->setDescription($description);
    }

    abstract public function __wakeup();

    /**
     * @return ServiceDTO
     */
    public static function createDTO()
    {
        return new ServiceDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ServiceDTO
         */
        Assertion::isInstanceOf($dto, ServiceDTO::class);

        $name = new Name(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $self = new static(
            $dto->getIden(),
            $dto->getDefaultCode(),
            $dto->getExtraArgs(),
            $name,
            $description
        );

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ServiceDTO
         */
        Assertion::isInstanceOf($dto, ServiceDTO::class);

        $name = new Name(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $this
            ->setIden($dto->getIden())
            ->setDefaultCode($dto->getDefaultCode())
            ->setExtraArgs($dto->getExtraArgs())
            ->setName($name)
            ->setDescription($description);


        return $this;
    }

    /**
     * @return ServiceDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setIden($this->getIden())
            ->setDefaultCode($this->getDefaultCode())
            ->setExtraArgs($this->getExtraArgs())
            ->setName($this->getName()->getName())
            ->setNameEn($this->getName()->getEn())
            ->setNameEs($this->getName()->getEs())
            ->setDescription($this->getDescription()->getDescription())
            ->setDescriptionEn($this->getDescription()->getEn())
            ->setDescriptionEs($this->getDescription()->getEs());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'iden' => $this->getIden(),
            'defaultCode' => $this->getDefaultCode(),
            'extraArgs' => $this->getExtraArgs(),
            'name' => $this->getName()->getName(),
            'en' => $this->getName()->getEn(),
            'es' => $this->getName()->getEs(),
            'description' => $this->getDescription()->getDescription(),
            'en' => $this->getDescription()->getEn(),
            'es' => $this->getDescription()->getEs()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    protected function setIden($iden)
    {
        Assertion::notNull($iden);
        Assertion::maxLength($iden, 50);

        $this->iden = $iden;

        return $this;
    }

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden()
    {
        return $this->iden;
    }

    /**
     * Set defaultCode
     *
     * @param string $defaultCode
     *
     * @return self
     */
    protected function setDefaultCode($defaultCode)
    {
        Assertion::notNull($defaultCode);
        Assertion::maxLength($defaultCode, 3);

        $this->defaultCode = $defaultCode;

        return $this;
    }

    /**
     * Get defaultCode
     *
     * @return string
     */
    public function getDefaultCode()
    {
        return $this->defaultCode;
    }

    /**
     * Set extraArgs
     *
     * @param boolean $extraArgs
     *
     * @return self
     */
    protected function setExtraArgs($extraArgs)
    {
        Assertion::notNull($extraArgs);
        Assertion::between(intval($extraArgs), 0, 1);

        $this->extraArgs = $extraArgs;

        return $this;
    }

    /**
     * Get extraArgs
     *
     * @return boolean
     */
    public function getExtraArgs()
    {
        return $this->extraArgs;
    }

    /**
     * Set name
     *
     * @param Name $name
     *
     * @return self
     */
    protected function setName(Name $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param Description $description
     *
     * @return self
     */
    protected function setDescription(Description $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    // @codeCoverageIgnoreEnd
}

