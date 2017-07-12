<?php

namespace Ivoz\Domain\Model\OutgoingRouting;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class OutgoingRoutingDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $type = 'group';

    /**
     * @var boolean
     */
    private $priority;

    /**
     * @var integer
     */
    private $weight = '1';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $peeringContractId;

    /**
     * @var mixed
     */
    private $routingPatternId;

    /**
     * @var mixed
     */
    private $routingPatternGroupId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $peeringContract;

    /**
     * @var mixed
     */
    private $routingPattern;

    /**
     * @var mixed
     */
    private $routingPatternGroup;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'type' => $this->getType(),
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'id' => $this->getId(),
            'brandId' => $this->getBrandId(),
            'companyId' => $this->getCompanyId(),
            'peeringContractId' => $this->getPeeringContractId(),
            'routingPatternId' => $this->getRoutingPatternId(),
            'routingPatternGroupId' => $this->getRoutingPatternGroupId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Ivoz\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->peeringContract = $transformer->transform('Ivoz\\Domain\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
        $this->routingPattern = $transformer->transform('Ivoz\\Domain\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
        $this->routingPatternGroup = $transformer->transform('Ivoz\\Domain\\Model\\RoutingPatternGroup\\RoutingPatternGroup', $this->getRoutingPatternGroupId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @return \Ivoz\Domain\Model\Brand\Brand
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
     * @return \Ivoz\Domain\Model\Company\Company
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
     * @return \Ivoz\Domain\Model\PeeringContract\PeeringContract
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
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPattern
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
     * @return \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroup
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }
}

