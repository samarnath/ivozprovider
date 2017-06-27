<?php

namespace Core\Domain\Model\CallACLRelPattern;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class CallACLRelPatternDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $priority;

    /**
     * @var string
     */
    private $policy;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $callACLId;

    /**
     * @var mixed
     */
    private $callACLPatternId;

    /**
     * @var mixed
     */
    private $callACL;

    /**
     * @var mixed
     */
    private $callACLPattern;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'priority' => $this->getPriority(),
            'policy' => $this->getPolicy(),
            'id' => $this->getId(),
            'callACLId' => $this->getCallACLId(),
            'callACLPatternId' => $this->getCallACLPatternId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->callACL = $transformer->transform('Core\\Domain\\Model\\CallACL\\CallACL', $this->getCallACLId());
        $this->callACLPattern = $transformer->transform('Core\\Domain\\Model\\CallACLPattern\\CallACLPattern', $this->getCallACLPatternId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $priority
     *
     * @return CallACLRelPatternDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $policy
     *
     * @return CallACLRelPatternDTO
     */
    public function setPolicy($policy)
    {
        $this->policy = $policy;

        return $this;
    }

    /**
     * @return string
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * @param integer $id
     *
     * @return CallACLRelPatternDTO
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
     * @param integer $callACLId
     *
     * @return CallACLRelPatternDTO
     */
    public function setCallACLId($callACLId)
    {
        $this->callACLId = $callACLId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallACLId()
    {
        return $this->callACLId;
    }

    /**
     * @return \Core\Domain\Model\CallACL\CallACL
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * @param integer $callACLPatternId
     *
     * @return CallACLRelPatternDTO
     */
    public function setCallACLPatternId($callACLPatternId)
    {
        $this->callACLPatternId = $callACLPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallACLPatternId()
    {
        return $this->callACLPatternId;
    }

    /**
     * @return \Core\Domain\Model\CallACLPattern\CallACLPattern
     */
    public function getCallACLPattern()
    {
        return $this->callACLPattern;
    }
}

