<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PeeringContractDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var string
     */
    public $name;

    /**
     * @var boolean
     */
    public $externallyRated = '0';

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $transformationRulesetGroupsTrunkId;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $transformationRulesetGroupsTrunk;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'description' => $this->getDescription(),
            'name' => $this->getName(),
            'externallyRated' => $this->getExternallyRated(),
            'brandId' => $this->getBrandId(),
            'transformationRulesetGroupsTrunkId' => $this->getTransformationRulesetGroupsTrunkId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setExternallyRated(isset($data['externallyRated']) ? $data['externallyRated'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setTransformationRulesetGroupsTrunkId(isset($data['transformationRulesetGroupsTrunkId']) ? $data['transformationRulesetGroupsTrunkId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->transformationRulesetGroupsTrunk = $transformer->transform('Core\\Model\\TransformationRulesetGroupsTrunk\\TransformationRulesetGroupsTrunk', $this->getTransformationRulesetGroupsTrunkId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PeeringContractDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $description
     *
     * @return PeeringContractDTO
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $name
     *
     * @return PeeringContractDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param boolean $externallyRated
     *
     * @return PeeringContractDTO
     */
    public function setExternallyRated($externallyRated = null)
    {
        $this->externallyRated = $externallyRated;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExternallyRated()
    {
        return $this->externallyRated;
    }

    /**
     * @param integer $brandId
     *
     * @return PeeringContractDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $transformationRulesetGroupsTrunkId
     *
     * @return PeeringContractDTO
     */
    public function setTransformationRulesetGroupsTrunkId($transformationRulesetGroupsTrunkId)
    {
        $this->transformationRulesetGroupsTrunkId = $transformationRulesetGroupsTrunkId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTransformationRulesetGroupsTrunkId()
    {
        return $this->transformationRulesetGroupsTrunkId;
    }

    /**
     * @return \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk
     */
    public function getTransformationRulesetGroupsTrunk()
    {
        return $this->transformationRulesetGroupsTrunk;
    }
}

