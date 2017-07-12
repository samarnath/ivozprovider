<?php

namespace Ivoz\Domain\Model\FixedCost;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * FixedCostAbstract
 */
abstract class FixedCostAbstract
{
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
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
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

    abstract public function __wakeup();

    /**
     * @return FixedCostDTO
     */
    public static function createDTO()
    {
        return new FixedCostDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FixedCostDTO
         */
        Assertion::isInstanceOf($dto, FixedCostDTO::class);

        $self = new static(
            $dto->getName());

        return $self
            ->setDescription($dto->getDescription())
            ->setCost($dto->getCost())
            ->setBrand($dto->getBrand())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FixedCostDTO
         */
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
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'cost' => $this->getCost(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
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
     * @return self
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
     * @return self
     */
    protected function setCost($cost = null)
    {
        if (!is_null($cost)) {
            if (!is_null($cost)) {
                Assertion::numeric($cost);
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
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

