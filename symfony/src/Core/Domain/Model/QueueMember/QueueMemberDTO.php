<?php

namespace Core\Domain\Model\QueueMember;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class QueueMemberDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $penalty;

    /**
     * @var mixed
     */
    private $queueId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'penalty' => $this->getPenalty(),
            'queueId' => $this->getQueueId(),
            'userId' => $this->getUserId()
        ];
    }

    /**
     * @param array $data
     * @return self
     * @deprecated
     *
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setPenalty(isset($data['penalty']) ? $data['penalty'] : null)
            ->setQueueId(isset($data['queueId']) ? $data['queueId'] : null)
            ->setUserId(isset($data['userId']) ? $data['userId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->queue = $transformer->transform('Core\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->user = $transformer->transform('Core\\Domain\\Model\\User\\User', $this->getUserId());
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
     * @return QueueMemberDTO
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
     * @param integer $penalty
     *
     * @return QueueMemberDTO
     */
    public function setPenalty($penalty = null)
    {
        $this->penalty = $penalty;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * @param integer $queueId
     *
     * @return QueueMemberDTO
     */
    public function setQueueId($queueId)
    {
        $this->queueId = $queueId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * @return \Core\Domain\Model\Queue\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param integer $userId
     *
     * @return QueueMemberDTO
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return \Core\Domain\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

