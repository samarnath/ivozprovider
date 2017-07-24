<?php

namespace Ivoz\Domain\Model\CallACL;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * CallACL
 */
class CallACL extends CallACLAbstract implements CallACLInterface
{
    use CallACLTrait;
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
     * @return CallACLDTO
     */
    public static function createDTO()
    {
        return new CallACLDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallACLDTO
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
         * @var $dto CallACLDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceRelPatterns($dto->getRelPatterns());


        return $this;
    }

    /**
     * @return CallACLDTO
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
     * @param \Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern
     *
     * @return CallACL
     */
    protected function addRelPattern(\Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern)
    {
        $this->relPatterns[] = $relPattern;

        return $this;
    }

    /**
     * Remove relPattern
     *
     * @param \Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern
     */
    protected function removeRelPattern(\Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface $relPattern)
    {
        $this->relPatterns->removeElement($relPattern);
    }

    /**
     * Replace relPatterns
     *
     * @param \Ivoz\Domain\Model\CallACLRelPattern\CallACLRelPatternInterface[] $relPatterns
     * @return self
     */
    protected function replaceRelPatterns(array $relPatterns)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($relPatterns as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCallACL($this);
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

