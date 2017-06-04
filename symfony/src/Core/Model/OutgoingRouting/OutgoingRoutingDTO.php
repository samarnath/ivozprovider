<?php

namespace Core\Model\OutgoingRouting;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class OutgoingRoutingDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $type = 'group';

    /**
     * @var boolean
     */
    public $priority;

    /**
     * @var integer
     */
    public $weight = '1';

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $peeringContractId;

    /**
     * @var mixed
     */
    public $routingPatternId;

    /**
     * @var mixed
     */
    public $routingPatternGroupId;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $peeringContract;

    /**
     * @var mixed
     */
    public $routingPattern;

    /**
     * @var mixed
     */
    public $routingPatternGroup;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'brandId' => $this->getBrandId(),
            'companyId' => $this->getCompanyId(),
            'peeringContractId' => $this->getPeeringContractId(),
            'routingPatternId' => $this->getRoutingPatternId(),
            'routingPatternGroupId' => $this->getRoutingPatternGroupId()
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
            ->setType(isset($data['type']) ? $data['type'] : null)
            ->setPriority(isset($data['priority']) ? $data['priority'] : null)
            ->setWeight(isset($data['weight']) ? $data['weight'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setPeeringContractId(isset($data['peeringContractId']) ? $data['peeringContractId'] : null)
            ->setRoutingPatternId(isset($data['routingPatternId']) ? $data['routingPatternId'] : null)
            ->setRoutingPatternGroupId(isset($data['routingPatternGroupId']) ? $data['routingPatternGroupId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->peeringContract = $transformer->transform('Core\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
        $this->routingPattern = $transformer->transform('Core\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
        $this->routingPatternGroup = $transformer->transform('Core\\Model\\RoutingPatternGroup\\RoutingPatternGroup', $this->getRoutingPatternGroupId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return OutgoingRoutingDTO
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
     * @param string $type
     *
     * @return OutgoingRoutingDTO
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param boolean $priority
     *
     * @return OutgoingRoutingDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param integer $weight
     *
     * @return OutgoingRoutingDTO
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param integer $brandId
     *
     * @return OutgoingRoutingDTO
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
     * @param integer $companyId
     *
     * @return OutgoingRoutingDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return OutgoingRoutingDTO
     */
    public function setPeeringContractId($peeringContractId)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @return \Core\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }

    /**
     * @param integer $routingPatternId
     *
     * @return OutgoingRoutingDTO
     */
    public function setRoutingPatternId($routingPatternId)
    {
        $this->routingPatternId = $routingPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRoutingPatternId()
    {
        return $this->routingPatternId;
    }

    /**
     * @return \Core\Model\RoutingPattern\RoutingPattern
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * @param integer $routingPatternGroupId
     *
     * @return OutgoingRoutingDTO
     */
    public function setRoutingPatternGroupId($routingPatternGroupId)
    {
        $this->routingPatternGroupId = $routingPatternGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRoutingPatternGroupId()
    {
        return $this->routingPatternGroupId;
    }

    /**
     * @return \Core\Model\RoutingPatternGroup\RoutingPatternGroup
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }
}

