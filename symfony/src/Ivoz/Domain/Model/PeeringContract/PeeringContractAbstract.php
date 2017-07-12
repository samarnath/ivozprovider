<?php

namespace Ivoz\Domain\Model\PeeringContract;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PeeringContractAbstract
 */
abstract class PeeringContractAbstract
{
    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $externallyRated = '0';

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    protected $transformationRulesetGroupsTrunk;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($description, $name)
    {
        $this->setDescription($description);
        $this->setName($name);
    }

    abstract public function __wakeup();

    /**
     * @return PeeringContractDTO
     */
    public static function createDTO()
    {
        return new PeeringContractDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PeeringContractDTO
         */
        Assertion::isInstanceOf($dto, PeeringContractDTO::class);

        $self = new static(
            $dto->getDescription(),
            $dto->getName());

        return $self
            ->setExternallyRated($dto->getExternallyRated())
            ->setBrand($dto->getBrand())
            ->setTransformationRulesetGroupsTrunk($dto->getTransformationRulesetGroupsTrunk())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PeeringContractDTO
         */
        Assertion::isInstanceOf($dto, PeeringContractDTO::class);

        $this
            ->setDescription($dto->getDescription())
            ->setName($dto->getName())
            ->setExternallyRated($dto->getExternallyRated())
            ->setBrand($dto->getBrand())
            ->setTransformationRulesetGroupsTrunk($dto->getTransformationRulesetGroupsTrunk());


        return $this;
    }

    /**
     * @return PeeringContractDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setDescription($this->getDescription())
            ->setName($this->getName())
            ->setExternallyRated($this->getExternallyRated())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setTransformationRulesetGroupsTrunkId($this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'description' => $this->getDescription(),
            'name' => $this->getName(),
            'externallyRated' => $this->getExternallyRated(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'transformationRulesetGroupsTrunkId' => $this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

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
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 200);

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
     * Set externallyRated
     *
     * @param boolean $externallyRated
     *
     * @return self
     */
    protected function setExternallyRated($externallyRated = null)
    {
        if (!is_null($externallyRated)) {
            Assertion::between(intval($externallyRated), 0, 1);
        }

        $this->externallyRated = $externallyRated;

        return $this;
    }

    /**
     * Get externallyRated
     *
     * @return boolean
     */
    public function getExternallyRated()
    {
        return $this->externallyRated;
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

    /**
     * Set transformationRulesetGroupsTrunk
     *
     * @param \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk
     *
     * @return self
     */
    protected function setTransformationRulesetGroupsTrunk(\Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk = null)
    {
        $this->transformationRulesetGroupsTrunk = $transformationRulesetGroupsTrunk;

        return $this;
    }

    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    public function getTransformationRulesetGroupsTrunk()
    {
        return $this->transformationRulesetGroupsTrunk;
    }



    // @codeCoverageIgnoreEnd
}

