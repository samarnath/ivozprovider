<?php

namespace Core\Model\Service;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Service
 */
class Service implements EntityInterface, ServiceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $iden = '';

    /**
     * @comment ml
     * @var string
     */
    protected $name = '';

    /**
     * @column name_en
     * @var string
     */
    protected $nameEn = '';

    /**
     * @column name_es
     * @var string
     */
    protected $nameEs = '';

    /**
     * @comment ml
     * @var string
     */
    protected $description = '';

    /**
     * @column description_en
     * @var string
     */
    protected $descriptionEn = '';

    /**
     * @column description_es
     * @var string
     */
    protected $descriptionEs = '';

    /**
     * @var string
     */
    protected $defaultCode;

    /**
     * @var boolean
     */
    protected $extraArgs = '0';


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
        $name,
        $nameEn,
        $nameEs,
        $description,
        $descriptionEn,
        $descriptionEs,
        $defaultCode,
        $extraArgs
    ) {
        $this->setIden($iden);
        $this->setName($name);
        $this->setNameEn($nameEn);
        $this->setNameEs($nameEs);
        $this->setDescription($description);
        $this->setDescriptionEn($descriptionEn);
        $this->setDescriptionEs($descriptionEs);
        $this->setDefaultCode($defaultCode);
        $this->setExtraArgs($extraArgs);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return ServiceDTO
     */
    public static function createDTO()
    {
        return new ServiceDTO();
    }

    /**
     * Factory method
     * @param ServiceDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ServiceDTO::class);

        $self = new self(
            $dto->getIden(),
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs(),
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs(),
            $dto->getDefaultCode(),
            $dto->getExtraArgs()
        );

        return $self;
    }

    /**
     * @param ServiceDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ServiceDTO::class);

        $this
            ->setIden($dto->getIden())
            ->setName($dto->getName())
            ->setNameEn($dto->getNameEn())
            ->setNameEs($dto->getNameEs())
            ->setDescription($dto->getDescription())
            ->setDescriptionEn($dto->getDescriptionEn())
            ->setDescriptionEs($dto->getDescriptionEs())
            ->setDefaultCode($dto->getDefaultCode())
            ->setExtraArgs($dto->getExtraArgs());


        return $this;
    }

    /**
     * @return ServiceDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setIden($this->getIden())
            ->setName($this->getName())
            ->setNameEn($this->getNameEn())
            ->setNameEs($this->getNameEs())
            ->setDescription($this->getDescription())
            ->setDescriptionEn($this->getDescriptionEn())
            ->setDescriptionEs($this->getDescriptionEs())
            ->setDefaultCode($this->getDefaultCode())
            ->setExtraArgs($this->getExtraArgs());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'iden' => $this->getIden(),
            'name' => $this->getName(),
            'nameEn' => $this->getNameEn(),
            'nameEs' => $this->getNameEs(),
            'description' => $this->getDescription(),
            'descriptionEn' => $this->getDescriptionEn(),
            'descriptionEs' => $this->getDescriptionEs(),
            'defaultCode' => $this->getDefaultCode(),
            'extraArgs' => $this->getExtraArgs()
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
     * Set iden
     *
     * @param string $iden
     *
     * @return Service
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
     * Set name
     *
     * @param string $name
     *
     * @return Service
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
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return Service
     */
    protected function setNameEn($nameEn)
    {
        Assertion::notNull($nameEn);
        Assertion::maxLength($nameEn, 50);

        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set nameEs
     *
     * @param string $nameEs
     *
     * @return Service
     */
    protected function setNameEs($nameEs)
    {
        Assertion::notNull($nameEs);
        Assertion::maxLength($nameEs, 50);

        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Service
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 255);

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
     * Set descriptionEn
     *
     * @param string $descriptionEn
     *
     * @return Service
     */
    protected function setDescriptionEn($descriptionEn)
    {
        Assertion::notNull($descriptionEn);
        Assertion::maxLength($descriptionEn, 255);

        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set descriptionEs
     *
     * @param string $descriptionEs
     *
     * @return Service
     */
    protected function setDescriptionEs($descriptionEs)
    {
        Assertion::notNull($descriptionEs);
        Assertion::maxLength($descriptionEs, 255);

        $this->descriptionEs = $descriptionEs;

        return $this;
    }

    /**
     * Get descriptionEs
     *
     * @return string
     */
    public function getDescriptionEs()
    {
        return $this->descriptionEs;
    }

    /**
     * Set defaultCode
     *
     * @param string $defaultCode
     *
     * @return Service
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
     * @return Service
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



    // @codeCoverageIgnoreEnd
}

