<?php

namespace Core\Model\CallACLRelPattern;

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
    public $id;

    /**
     * @var integer
     */
    public $priority;

    /**
     * @var string
     */
    public $policy;

    /**
     * @var mixed
     */
    public $callACLId;

    /**
     * @var mixed
     */
    public $callACLPatternId;

    /**
     * @var mixed
     */
    public $callACL;

    /**
     * @var mixed
     */
    public $callACLPattern;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'priority' => $this->getPriority(),
            'policy' => $this->getPolicy(),
            'callACLId' => $this->getCallACLId(),
            'callACLPatternId' => $this->getCallACLPatternId()
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
            ->setPriority(isset($data['priority']) ? $data['priority'] : null)
            ->setPolicy(isset($data['policy']) ? $data['policy'] : null)
            ->setCallACLId(isset($data['callACLId']) ? $data['callACLId'] : null)
            ->setCallACLPatternId(isset($data['callACLPatternId']) ? $data['callACLPatternId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->callACL = $transformer->transform('Core\\Model\\CallACL\\CallACL', $this->getCallACLId());
        $this->callACLPattern = $transformer->transform('Core\\Model\\CallACLPattern\\CallACLPattern', $this->getCallACLPatternId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @return \Core\Model\CallACL\CallACL
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
     * @return \Core\Model\CallACLPattern\CallACLPattern
     */
    public function getCallACLPattern()
    {
        return $this->callACLPattern;
    }
}

