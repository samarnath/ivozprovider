<?php

namespace Ast\Domain\Model\QueueMember;

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
    private $uniqueid;

    /**
     * @column queue_name
     * @var string
     */
    private $queueName;

    /**
     * @var string
     */
    private $interface;

    /**
     * @var string
     */
    private $membername;

    /**
     * @column state_interface
     * @var string
     */
    private $stateInterface;

    /**
     * @var integer
     */
    private $penalty;

    /**
     * @var integer
     */
    private $paused;

    /**
     * @var mixed
     */
    private $queueMemberId;

    /**
     * @var mixed
     */
    private $queueMember;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'uniqueid' => $this->getUniqueid(),
            'queueName' => $this->getQueueName(),
            'interface' => $this->getInterface(),
            'membername' => $this->getMembername(),
            'stateInterface' => $this->getStateInterface(),
            'penalty' => $this->getPenalty(),
            'paused' => $this->getPaused(),
            'queueMemberId' => $this->getQueueMemberId()
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
            ->setUniqueid(isset($data['uniqueid']) ? $data['uniqueid'] : null)
            ->setQueueName(isset($data['queueName']) ? $data['queueName'] : null)
            ->setInterface(isset($data['interface']) ? $data['interface'] : null)
            ->setMembername(isset($data['membername']) ? $data['membername'] : null)
            ->setStateInterface(isset($data['stateInterface']) ? $data['stateInterface'] : null)
            ->setPenalty(isset($data['penalty']) ? $data['penalty'] : null)
            ->setPaused(isset($data['paused']) ? $data['paused'] : null)
            ->setQueueMemberId(isset($data['queueMemberId']) ? $data['queueMemberId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->queueMember = $transformer->transform('Core\\Domain\\Model\\QueueMember\\QueueMember', $this->getQueueMemberId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $uniqueid
     *
     * @return QueueMemberDTO
     */
    public function setUniqueid($uniqueid)
    {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUniqueid()
    {
        return $this->uniqueid;
    }

    /**
     * @param string $queueName
     *
     * @return QueueMemberDTO
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;

        return $this;
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @param string $interface
     *
     * @return QueueMemberDTO
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;

        return $this;
    }

    /**
     * @return string
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @param string $membername
     *
     * @return QueueMemberDTO
     */
    public function setMembername($membername = null)
    {
        $this->membername = $membername;

        return $this;
    }

    /**
     * @return string
     */
    public function getMembername()
    {
        return $this->membername;
    }

    /**
     * @param string $stateInterface
     *
     * @return QueueMemberDTO
     */
    public function setStateInterface($stateInterface = null)
    {
        $this->stateInterface = $stateInterface;

        return $this;
    }

    /**
     * @return string
     */
    public function getStateInterface()
    {
        return $this->stateInterface;
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
     * @param integer $paused
     *
     * @return QueueMemberDTO
     */
    public function setPaused($paused = null)
    {
        $this->paused = $paused;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPaused()
    {
        return $this->paused;
    }

    /**
     * @param integer $queueMemberId
     *
     * @return QueueMemberDTO
     */
    public function setQueueMemberId($queueMemberId)
    {
        $this->queueMemberId = $queueMemberId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQueueMemberId()
    {
        return $this->queueMemberId;
    }

    /**
     * @return \Core\Domain\Model\QueueMember\QueueMember
     */
    public function getQueueMember()
    {
        return $this->queueMember;
    }
}

