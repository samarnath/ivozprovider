<?php

namespace Core\Model\TargetPattern;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TargetPattern
 */
class TargetPattern implements EntityInterface, TargetPatternInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @comment ml
     * @var string
     */
    protected $name;

    /**
     * @column name_en
     * @var string
     */
    protected $nameEn;

    /**
     * @column name_es
     * @var string
     */
    protected $nameEs;

    /**
     * @comment ml
     * @var string
     */
    protected $description;

    /**
     * @column description_en
     * @var string
     */
    protected $descriptionEn;

    /**
     * @column description_es
     * @var string
     */
    protected $descriptionEs;

    /**
     * @var string
     */
    protected $regExp;

    /**
     * @var \Core\Model\Brand\Brand
     */
    protected $brand;


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
        $nameEn,
        $nameEs,
        $description,
        $descriptionEn,
        $descriptionEs,
        $regExp
    ) {
        $this->setName($name);
        $this->setNameEn($nameEn);
        $this->setNameEs($nameEs);
        $this->setDescription($description);
        $this->setDescriptionEn($descriptionEn);
        $this->setDescriptionEs($descriptionEs);
        $this->setRegExp($regExp);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return TargetPatternDTO
     */
    public static function createDTO()
    {
        return new TargetPatternDTO();
    }

    /**
     * Factory method
     * @param TargetPatternDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TargetPatternDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs(),
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs(),
            $dto->getRegExp()
        );

        return $self
            ->setBrand($dto->getBrand());
    }

    /**
     * @param TargetPatternDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TargetPatternDTO::class);

        $this
            ->setName($dto->getName())
            ->setNameEn($dto->getNameEn())
            ->setNameEs($dto->getNameEs())
            ->setDescription($dto->getDescription())
            ->setDescriptionEn($dto->getDescriptionEn())
            ->setDescriptionEs($dto->getDescriptionEs())
            ->setRegExp($dto->getRegExp())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return TargetPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setNameEn($this->getNameEn())
            ->setNameEs($this->getNameEs())
            ->setDescription($this->getDescription())
            ->setDescriptionEn($this->getDescriptionEn())
            ->setDescriptionEs($this->getDescriptionEs())
            ->setRegExp($this->getRegExp())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'nameEn' => $this->getNameEn(),
            'nameEs' => $this->getNameEs(),
            'description' => $this->getDescription(),
            'descriptionEn' => $this->getDescriptionEn(),
            'descriptionEs' => $this->getDescriptionEs(),
            'regExp' => $this->getRegExp(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
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
     * @return TargetPattern
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 55);

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
     * @return TargetPattern
     */
    protected function setNameEn($nameEn)
    {
        Assertion::notNull($nameEn);
        Assertion::maxLength($nameEn, 55);

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
     * @return TargetPattern
     */
    protected function setNameEs($nameEs)
    {
        Assertion::notNull($nameEs);
        Assertion::maxLength($nameEs, 55);

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
     * @return TargetPattern
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 55);

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
     * @return TargetPattern
     */
    protected function setDescriptionEn($descriptionEn)
    {
        Assertion::notNull($descriptionEn);
        Assertion::maxLength($descriptionEn, 55);

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
     * @return TargetPattern
     */
    protected function setDescriptionEs($descriptionEs)
    {
        Assertion::notNull($descriptionEs);
        Assertion::maxLength($descriptionEs, 55);

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
     * Set regExp
     *
     * @param string $regExp
     *
     * @return TargetPattern
     */
    protected function setRegExp($regExp)
    {
        Assertion::notNull($regExp);
        Assertion::maxLength($regExp, 80);

        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return TargetPattern
     */
    protected function setBrand(\Core\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

