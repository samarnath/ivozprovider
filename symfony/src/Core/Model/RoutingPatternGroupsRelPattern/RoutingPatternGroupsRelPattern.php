<?php

namespace Core\Model\RoutingPatternGroupsRelPattern;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * RoutingPatternGroupsRelPattern
 */
class RoutingPatternGroupsRelPattern implements EntityInterface, RoutingPatternGroupsRelPatternInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Core\Model\RoutingPattern\RoutingPatternInterface
     */
    protected $routingPattern;

    /**
     * @var \Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    protected $routingPatternGroup;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return RoutingPatternGroupsRelPatternDTO
     */
    public static function createDTO()
    {
        return new RoutingPatternGroupsRelPatternDTO();
    }

    /**
     * Factory method
     * @param RoutingPatternGroupsRelPatternDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RoutingPatternGroupsRelPatternDTO::class);

        $self = new self();

        return $self
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setRoutingPatternGroup($dto->getRoutingPatternGroup());
    }

    /**
     * @param RoutingPatternGroupsRelPatternDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RoutingPatternGroupsRelPatternDTO::class);

        $this
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setRoutingPatternGroup($dto->getRoutingPatternGroup());


        return $this;
    }

    /**
     * @return RoutingPatternGroupsRelPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setRoutingPatternId($this->getRoutingPattern() ? $this->getRoutingPattern()->getId() : null)
            ->setRoutingPatternGroupId($this->getRoutingPatternGroup() ? $this->getRoutingPatternGroup()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'routingPatternId' => $this->getRoutingPattern() ? $this->getRoutingPattern()->getId() : null,
            'routingPatternGroupId' => $this->getRoutingPatternGroup() ? $this->getRoutingPatternGroup()->getId() : null
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
     * Set routingPattern
     *
     * @param \Core\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return RoutingPatternGroupsRelPattern
     */
    protected function setRoutingPattern(\Core\Model\RoutingPattern\RoutingPatternInterface $routingPattern)
    {
        $this->routingPattern = $routingPattern;

        return $this;
    }

    /**
     * Get routingPattern
     *
     * @return \Core\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * Set routingPatternGroup
     *
     * @param \Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return RoutingPatternGroupsRelPattern
     */
    public function setRoutingPatternGroup(\Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null)
    {
        $this->routingPatternGroup = $routingPatternGroup;

        return $this;
    }

    /**
     * Get routingPatternGroup
     *
     * @return \Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }



    // @codeCoverageIgnoreEnd
}

