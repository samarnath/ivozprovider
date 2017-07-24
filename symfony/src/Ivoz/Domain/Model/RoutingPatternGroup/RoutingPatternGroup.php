<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * RoutingPatternGroup
 */
class RoutingPatternGroup extends RoutingPatternGroupAbstract implements RoutingPatternGroupInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $relPatterns;


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
        parent::__construct(...func_get_args());
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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceRelPatterns($dto->getRelPatterns())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceRelPatterns($dto->getRelPatterns());


        return $this;
    }

    /**
     * @return RoutingPatternGroupDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setRelPatterns($this->getRelPatterns());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId()
        ];
    }


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
     * Add relPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern
     *
     * @return RoutingPatternGroup
     */
    protected function addRelPattern(\Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern)
    {
        $this->relPatterns[] = $relPattern;

        return $this;
    }

    /**
     * Remove relPattern
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern
     */
    protected function removeRelPattern(\Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface $relPattern)
    {
        $this->relPatterns->removeElement($relPattern);
    }

    /**
     * Replace relPatterns
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternInterface[] $relPatterns
     * @return self
     */
    protected function replaceRelPatterns(array $relPatterns)
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
                $this->removeRelPattern($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addRelPattern($entity);
        }

        return $this;
    }

    /**
     * Get relPatterns
     *
     * @return array
     */
    public function getRelPatterns(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->relPatterns->matching($criteria)->toArray();
        }

        return $this->relPatterns->toArray();
    }


}

