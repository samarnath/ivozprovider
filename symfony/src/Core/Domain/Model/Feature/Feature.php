<?php

namespace Core\Domain\Model\Feature;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Feature
 */
class Feature implements EntityInterface, FeatureInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $iden;

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
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($iden, $name, $nameEn, $nameEs)
    {
        $this->setIden($iden);
        $this->setName($name);
        $this->setNameEn($nameEn);
        $this->setNameEs($nameEs);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return FeatureDTO
     */
    public static function createDTO()
    {
        return new FeatureDTO();
    }

    /**
     * Factory method
     * @param FeatureDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FeatureDTO::class);

        $self = new self(
            $dto->getIden(),
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        return $self;
    }

    /**
     * @param FeatureDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FeatureDTO::class);

        $this
            ->setIden($dto->getIden())
            ->setName($dto->getName())
            ->setNameEn($dto->getNameEn())
            ->setNameEs($dto->getNameEs());


        return $this;
    }

    /**
     * @return FeatureDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setIden($this->getIden())
            ->setName($this->getName())
            ->setNameEn($this->getNameEn())
            ->setNameEs($this->getNameEs());
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
            'nameEs' => $this->getNameEs()
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
     * @return Feature
     */
    protected function setIden($iden)
    {
        Assertion::notNull($iden);
        Assertion::maxLength($iden, 100);

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
     * @return Feature
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
     * @return Feature
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
     * @return Feature
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



    // @codeCoverageIgnoreEnd
}

