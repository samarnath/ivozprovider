<?php

namespace Ast\Domain\Model\QueueMember;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * QueueMemberAbstract
 */
abstract class QueueMemberAbstract
{
    /**
     * @column queue_name
     * @var string
     */
    protected $queueName;

    /**
     * @var string
     */
    protected $interface;

    /**
     * @var string
     */
    protected $membername;

    /**
     * @column state_interface
     * @var string
     */
    protected $stateInterface;

    /**
     * @var integer
     */
    protected $penalty;

    /**
     * @var integer
     */
    protected $paused;

    /**
     * @var \Ivoz\Domain\Model\QueueMember\QueueMemberInterface
     */
    protected $queueMember;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($queueName, $interface)
    {
        $this->setQueueName($queueName);
        $this->setInterface($interface);
    }

    abstract public function __wakeup();

    /**
     * @return QueueMemberDTO
     */
    public static function createDTO()
    {
        return new QueueMemberDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueMemberDTO
         */
        Assertion::isInstanceOf($dto, QueueMemberDTO::class);

        $self = new static(
            $dto->getQueueName(),
            $dto->getInterface());

        return $self
            ->setMembername($dto->getMembername())
            ->setStateInterface($dto->getStateInterface())
            ->setPenalty($dto->getPenalty())
            ->setPaused($dto->getPaused())
            ->setQueueMember($dto->getQueueMember())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueMemberDTO
         */
        Assertion::isInstanceOf($dto, QueueMemberDTO::class);

        $this
            ->setQueueName($dto->getQueueName())
            ->setInterface($dto->getInterface())
            ->setMembername($dto->getMembername())
            ->setStateInterface($dto->getStateInterface())
            ->setPenalty($dto->getPenalty())
            ->setPaused($dto->getPaused())
            ->setQueueMember($dto->getQueueMember());


        return $this;
    }

    /**
     * @return QueueMemberDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setQueueName($this->getQueueName())
            ->setInterface($this->getInterface())
            ->setMembername($this->getMembername())
            ->setStateInterface($this->getStateInterface())
            ->setPenalty($this->getPenalty())
            ->setPaused($this->getPaused())
            ->setQueueMemberId($this->getQueueMember() ? $this->getQueueMember()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'queueName' => $this->getQueueName(),
            'interface' => $this->getInterface(),
            'membername' => $this->getMembername(),
            'stateInterface' => $this->getStateInterface(),
            'penalty' => $this->getPenalty(),
            'paused' => $this->getPaused(),
            'queueMemberId' => $this->getQueueMember() ? $this->getQueueMember()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set queueName
     *
     * @param string $queueName
     *
     * @return self
     */
    protected function setQueueName($queueName)
    {
        Assertion::notNull($queueName);
        Assertion::maxLength($queueName, 80);

        $this->queueName = $queueName;

        return $this;
    }

    /**
     * Get queueName
     *
     * @return string
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * Set interface
     *
     * @param string $interface
     *
     * @return self
     */
    protected function setInterface($interface)
    {
        Assertion::notNull($interface);
        Assertion::maxLength($interface, 80);

        $this->interface = $interface;

        return $this;
    }

    /**
     * Get interface
     *
     * @return string
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * Set membername
     *
     * @param string $membername
     *
     * @return self
     */
    protected function setMembername($membername = null)
    {
        if (!is_null($membername)) {
            Assertion::maxLength($membername, 80);
        }

        $this->membername = $membername;

        return $this;
    }

    /**
     * Get membername
     *
     * @return string
     */
    public function getMembername()
    {
        return $this->membername;
    }

    /**
     * Set stateInterface
     *
     * @param string $stateInterface
     *
     * @return self
     */
    protected function setStateInterface($stateInterface = null)
    {
        if (!is_null($stateInterface)) {
            Assertion::maxLength($stateInterface, 80);
        }

        $this->stateInterface = $stateInterface;

        return $this;
    }

    /**
     * Get stateInterface
     *
     * @return string
     */
    public function getStateInterface()
    {
        return $this->stateInterface;
    }

    /**
     * Set penalty
     *
     * @param integer $penalty
     *
     * @return self
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
     * Set paused
     *
     * @param integer $paused
     *
     * @return self
     */
    protected function setPaused($paused = null)
    {
        if (!is_null($paused)) {
            if (!is_null($paused)) {
                Assertion::integerish($paused);
            }
        }

        $this->paused = $paused;

        return $this;
    }

    /**
     * Get paused
     *
     * @return integer
     */
    public function getPaused()
    {
        return $this->paused;
    }

    /**
     * Set queueMember
     *
     * @param \Ivoz\Domain\Model\QueueMember\QueueMemberInterface $queueMember
     *
     * @return self
     */
    protected function setQueueMember(\Ivoz\Domain\Model\QueueMember\QueueMemberInterface $queueMember = null)
    {
        $this->queueMember = $queueMember;

        return $this;
    }

    /**
     * Get queueMember
     *
     * @return \Ivoz\Domain\Model\QueueMember\QueueMemberInterface
     */
    public function getQueueMember()
    {
        return $this->queueMember;
    }



    // @codeCoverageIgnoreEnd
}

