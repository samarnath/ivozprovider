<?php

namespace Core\Model\PeeringContract;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PeeringContract
 */
class PeeringContract implements EntityInterface, PeeringContractInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var \Core\Model\Brand\Brand
     */
    protected $brand;

    /**
     * @var \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk
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

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return PeeringContractDTO
     */
    public static function createDTO()
    {
        return new PeeringContractDTO();
    }

    /**
     * Factory method
     * @param PeeringContractDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, PeeringContractDTO::class);

        $self = new self(
            $dto->getDescription(),
            $dto->getName()
        );

        return $self
            ->setExternallyRated($dto->getExternallyRated())
            ->setBrand($dto->getBrand())
            ->setTransformationRulesetGroupsTrunk($dto->getTransformationRulesetGroupsTrunk());
    }

    /**
     * @param PeeringContractDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'description' => $this->getDescription(),
            'name' => $this->getName(),
            'externallyRated' => $this->getExternallyRated(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'transformationRulesetGroupsTrunkId' => $this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null
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
     * Set description
     *
     * @param string $description
     *
     * @return PeeringContract
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
     * @return PeeringContract
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
     * @return PeeringContract
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
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return PeeringContract
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

    /**
     * Set transformationRulesetGroupsTrunk
     *
     * @param \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk $transformationRulesetGroupsTrunk
     *
     * @return PeeringContract
     */
    protected function setTransformationRulesetGroupsTrunk(\Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk $transformationRulesetGroupsTrunk = null)
    {
        $this->transformationRulesetGroupsTrunk = $transformationRulesetGroupsTrunk;

        return $this;
    }

    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk
     */
    public function getTransformationRulesetGroupsTrunk()
    {
        return $this->transformationRulesetGroupsTrunk;
    }



    // @codeCoverageIgnoreEnd
}

