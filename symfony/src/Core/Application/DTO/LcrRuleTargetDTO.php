<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class LcrRuleTargetDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column lcr_id
     * @var integer
     */
    public $lcrId = '1';

    /**
     * @var boolean
     */
    public $priority;

    /**
     * @var integer
     */
    public $weight = '1';

    /**
     * @var mixed
     */
    public $ruleId;

    /**
     * @var mixed
     */
    public $gwId;

    /**
     * @var mixed
     */
    public $outgoingRoutingId;

    /**
     * @var mixed
     */
    public $rule;

    /**
     * @var mixed
     */
    public $gw;

    /**
     * @var mixed
     */
    public $outgoingRouting;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'lcrId' => $this->getLcrId(),
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'ruleId' => $this->getRuleId(),
            'gwId' => $this->getGwId(),
            'outgoingRoutingId' => $this->getOutgoingRoutingId()
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
            ->setLcrId(isset($data['lcrId']) ? $data['lcrId'] : null)
            ->setPriority(isset($data['priority']) ? $data['priority'] : null)
            ->setWeight(isset($data['weight']) ? $data['weight'] : null)
            ->setRuleId(isset($data['ruleId']) ? $data['ruleId'] : null)
            ->setGwId(isset($data['gwId']) ? $data['gwId'] : null)
            ->setOutgoingRoutingId(isset($data['outgoingRoutingId']) ? $data['outgoingRoutingId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->rule = $transformer->transform('Core\\Model\\LcrRule\\LcrRule', $this->getRuleId());
        $this->gw = $transformer->transform('Core\\Model\\LcrGateway\\LcrGateway', $this->getGwId());
        $this->outgoingRouting = $transformer->transform('Core\\Model\\OutgoingRouting\\OutgoingRouting', $this->getOutgoingRoutingId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return LcrRuleTargetDTO
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
     * @param integer $lcrId
     *
     * @return LcrRuleTargetDTO
     */
    public function setLcrId($lcrId)
    {
        $this->lcrId = $lcrId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLcrId()
    {
        return $this->lcrId;
    }

    /**
     * @param boolean $priority
     *
     * @return LcrRuleTargetDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param integer $weight
     *
     * @return LcrRuleTargetDTO
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param integer $ruleId
     *
     * @return LcrRuleTargetDTO
     */
    public function setRuleId($ruleId)
    {
        $this->ruleId = $ruleId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRuleId()
    {
        return $this->ruleId;
    }

    /**
     * @return \Core\Model\LcrRule\LcrRule
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @param integer $gwId
     *
     * @return LcrRuleTargetDTO
     */
    public function setGwId($gwId)
    {
        $this->gwId = $gwId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getGwId()
    {
        return $this->gwId;
    }

    /**
     * @return \Core\Model\LcrGateway\LcrGateway
     */
    public function getGw()
    {
        return $this->gw;
    }

    /**
     * @param integer $outgoingRoutingId
     *
     * @return LcrRuleTargetDTO
     */
    public function setOutgoingRoutingId($outgoingRoutingId)
    {
        $this->outgoingRoutingId = $outgoingRoutingId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingRoutingId()
    {
        return $this->outgoingRoutingId;
    }

    /**
     * @return \Core\Model\OutgoingRouting\OutgoingRouting
     */
    public function getOutgoingRouting()
    {
        return $this->outgoingRouting;
    }
}

