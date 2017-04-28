<?php

namespace Core\Model\QueueMember;

use Assert\Assertion;
use Core\Application\DTO\QueueMemberDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * QueueMember
 */
class QueueMember implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $penalty;

    /**
     * @var \Core\Model\Queue\Queue
     */
    protected $queue;

    /**
     * @var \Core\Model\User\User
     */
    protected $user;


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
     * @return QueueMemberDTO
     */
    public static function createDTO()
    {
        return new QueueMemberDTO();
    }

    /**
     * Factory method
     * @param QueueMemberDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, QueueMemberDTO::class);

        $self = new self();

        return $self
            ->setPenalty($dto->getPenalty())
            ->setQueue($dto->getQueue())
            ->setUser($dto->getUser());
    }

    /**
     * @param QueueMemberDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, QueueMemberDTO::class);

        $this
            ->setPenalty($dto->getPenalty())
            ->setQueue($dto->getQueue())
            ->setUser($dto->getUser());


        return $this;
    }

    /**
     * @return QueueMemberDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setPenalty($this->getPenalty())
            ->setQueueId($this->getQueue() ? $this->getQueue()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'penalty' => $this->getPenalty(),
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
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
     * Set penalty
     *
     * @param integer $penalty
     *
     * @return QueueMember
     */
    protected function setPenalty($penalty = null)
    {
        if (!is_null($penalty)) {
            if (!is_null($penalty)) {
                Assertion::integerish($penalty);
            }
        }

        $this->penalty = $penalty;

        return $this;
    }

    /**
     * Get penalty
     *
     * @return integer
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * Set queue
     *
     * @param \Core\Model\Queue\Queue $queue
     *
     * @return QueueMember
     */
    protected function setQueue(\Core\Model\Queue\Queue $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Core\Model\Queue\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set user
     *
     * @param \Core\Model\User\User $user
     *
     * @return QueueMember
     */
    protected function setUser(\Core\Model\User\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }



    // @codeCoverageIgnoreEnd
}

