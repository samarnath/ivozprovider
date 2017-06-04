<?php

namespace Core\Model\FixedCost;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FixedCost
 */
class FixedCost implements EntityInterface, FixedCostInterface
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
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $cost;

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
     * @return FixedCostDTO
     */
    public static function createDTO()
    {
        return new FixedCostDTO();
    }

    /**
     * Factory method
     * @param FixedCostDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FixedCostDTO::class);

        $self = new self(
            $dto->getName()
        );

        return $self
            ->setDescription($dto->getDescription())
            ->setCost($dto->getCost())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param FixedCostDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FixedCostDTO::class);

        $this
            ->setName($dto->getName())
            ->setDescription($dto->getDescription())
            ->setCost($dto->getCost())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return FixedCostDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setDescription($this->getDescription())
            ->setCost($this->getCost())
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
            'description' => $this->getDescription(),
            'cost' => $this->getCost(),
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
     * @return FixedCost
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 255);

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
     * @return FixedCost
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
        }

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
     * Set cost
     *
     * @param string $cost
     *
     * @return FixedCost
     */
    protected function setCost($cost = null)
    {
        if (!is_null($cost)) {
            if (!is_null($cost)) {
                //Assertion::float($cost);
            }
        }

        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return FixedCost
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

