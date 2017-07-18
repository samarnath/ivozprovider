<?php

namespace Core\Domain\Model\RoutingPatternGroupsRelPattern;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class RoutingPatternGroupsRelPatternDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

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
            'id' => $this->getId(),
            'routingPatternId' => $this->getRoutingPatternId(),
            'routingPatternGroupId' => $this->getRoutingPatternGroupId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->routingPattern = $transformer->transform('Core\\Domain\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
        $this->routingPatternGroup = $transformer->transform('Core\\Domain\\Model\\RoutingPatternGroup\\RoutingPatternGroup', $this->getRoutingPatternGroupId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return RoutingPatternGroupsRelPatternDTO
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
     * @param integer $routingPatternId
     *
     * @return RoutingPatternGroupsRelPatternDTO
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
     * @return \Core\Domain\Model\RoutingPattern\RoutingPattern
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * @param integer $routingPatternGroupId
     *
     * @return RoutingPatternGroupsRelPatternDTO
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
     * @return \Core\Domain\Model\RoutingPatternGroup\RoutingPatternGroup
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }
}

