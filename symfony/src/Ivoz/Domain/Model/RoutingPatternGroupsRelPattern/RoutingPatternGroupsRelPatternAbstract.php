<?php

namespace Ivoz\Domain\Model\RoutingPatternGroupsRelPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * RoutingPatternGroupsRelPatternAbstract
 */
abstract class RoutingPatternGroupsRelPatternAbstract
{
    /**
     * @var \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    protected $routingPattern;

    /**
     * @var \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
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

    abstract public function __wakeup();

    /**
     * @return RoutingPatternGroupsRelPatternDTO
     */
    public static function createDTO()
    {
        return new RoutingPatternGroupsRelPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupsRelPatternDTO
         */
        Assertion::isInstanceOf($dto, RoutingPatternGroupsRelPatternDTO::class);

        $self = new static();

        return $self
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setRoutingPatternGroup($dto->getRoutingPatternGroup())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupsRelPatternDTO
         */
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
            ->setRoutingPatternId($this->getRoutingPattern() ? $this->getRoutingPattern()->getId() : null)
            ->setRoutingPatternGroupId($this->getRoutingPatternGroup() ? $this->getRoutingPatternGroup()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'routingPatternId' => $this->getRoutingPattern() ? $this->getRoutingPattern()->getId() : null,
            'routingPatternGroupId' => $this->getRoutingPatternGroup() ? $this->getRoutingPatternGroup()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    protected function setRoutingPattern(\Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern)
    {
        $this->routingPattern = $routingPattern;

        return $this;
    }

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * Set routingPatternGroup
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return self
     */
    public function setRoutingPatternGroup(\Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null)
    {
        $this->routingPatternGroup = $routingPatternGroup;

        return $this;
    }

    /**
     * Get routingPatternGroup
     *
     * @return \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }



    // @codeCoverageIgnoreEnd
}

