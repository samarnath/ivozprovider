<?php

namespace Core\Model\RoutingPatternGroup;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * RoutingPatternGroup
 */
class RoutingPatternGroup implements EntityInterface, RoutingPatternGroupInterface
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
     * @var ArrayCollection
     */
    protected $relPatterns;

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

        $this->relPatterns = new ArrayCollection();
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return RoutingPatternGroupDTO
     */
    public static function createDTO()
    {
        return new RoutingPatternGroupDTO();
    }

    /**
     * Factory method
     * @param RoutingPatternGroupDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RoutingPatternGroupDTO::class);

        $self = new self(
            $dto->getName()
        );

        return $self
            ->setDescription($dto->getDescription())
            ->replaceRelPatterns($dto->getRelPatterns())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param RoutingPatternGroupDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RoutingPatternGroupDTO::class);

        $this
            ->setName($dto->getName())
            ->setDescription($dto->getDescription())
            ->replaceRelPatterns($dto->getRelPatterns())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return RoutingPatternGroupDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setDescription($this->getDescription())
            ->setRelPatterns($this->getRelPatterns())
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
     * @return RoutingPatternGroup
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 55);

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
     * @return RoutingPatternGroup
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 55);
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
     * Add relPattern
     *
     * @param \Core\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPattern $relPattern
     *
     * @return RoutingPatternGroup
     */
    protected function addRelPattern(\Core\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPattern $relPattern)
    {
        $this->relPatterns[] = $relPattern;

        return $this;
    }

    /**
     * Remove relPattern
     *
     * @param \Core\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPattern $relPattern
     */
    protected function removeRelPattern(\Core\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPattern $relPattern)
    {
        $this->relPatterns->removeElement($relPattern);
    }

    /**
     * Replace relPatterns
     *
     * @param \IteratorAggregate $relPatterns
     * @return RoutingPatternGroup
     */
    protected function replaceRelPatterns(\IteratorAggregate $relPatterns)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($relPatterns as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setRoutingPatternGroup($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->relPatterns as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->relPatterns->remove($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->relPatterns->add($entity);
        }

        return $this;
    }

    /**
     * Get relPatterns
     *
     * @return ArrayCollection
     */
    public function getRelPatterns(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->relPatterns->matching($criteria);
        }

        return $this->relPatterns;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return RoutingPatternGroup
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

