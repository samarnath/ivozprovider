<?php

namespace Core\Domain\Model\LcrRuleTarget;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * LcrRuleTargetAbstract
 */
abstract class LcrRuleTargetAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @column lcr_id
     * @var integer
     */
    protected $lcrId = '1';

    /**
     * @var boolean
     */
    protected $priority;

    /**
     * @var integer
     */
    protected $weight = '1';

    /**
     * @var \Core\Domain\Model\LcrRule\LcrRuleInterface
     */
    protected $rule;

    /**
     * @var \Core\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    protected $gw;

    /**
     * @var \Core\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    protected $outgoingRouting;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($lcrId, $priority, $weight)
    {
        $this->setLcrId($lcrId);
        $this->setPriority($priority);
        $this->setWeight($weight);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return LcrRuleTargetDTO
     */
    public static function createDTO()
    {
        return new LcrRuleTargetDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrRuleTargetDTO
         */
        Assertion::isInstanceOf($dto, LcrRuleTargetDTO::class);

        $self = new static(
            $dto->getLcrId(),
            $dto->getPriority(),
            $dto->getWeight()
        );

        return $self
            ->setRule($dto->getRule())
            ->setGw($dto->getGw())
            ->setOutgoingRouting($dto->getOutgoingRouting());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrRuleTargetDTO
         */
        Assertion::isInstanceOf($dto, LcrRuleTargetDTO::class);

        $this
            ->setLcrId($dto->getLcrId())
            ->setPriority($dto->getPriority())
            ->setWeight($dto->getWeight())
            ->setRule($dto->getRule())
            ->setGw($dto->getGw())
            ->setOutgoingRouting($dto->getOutgoingRouting());


        return $this;
    }

    /**
     * @return LcrRuleTargetDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setLcrId($this->getLcrId())
            ->setPriority($this->getPriority())
            ->setWeight($this->getWeight())
            ->setRuleId($this->getRule() ? $this->getRule()->getId() : null)
            ->setGwId($this->getGw() ? $this->getGw()->getId() : null)
            ->setOutgoingRoutingId($this->getOutgoingRouting() ? $this->getOutgoingRouting()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'lcrId' => $this->getLcrId(),
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'ruleId' => $this->getRule() ? $this->getRule()->getId() : null,
            'gwId' => $this->getGw() ? $this->getGw()->getId() : null,
            'outgoingRoutingId' => $this->getOutgoingRouting() ? $this->getOutgoingRouting()->getId() : null
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
     * Set lcrId
     *
     * @param integer $lcrId
     *
     * @return self
     */
    protected function setLcrId($lcrId)
    {
        Assertion::notNull($lcrId);
        Assertion::integerish($lcrId);
        Assertion::greaterOrEqualThan($lcrId, 0);

        $this->lcrId = $lcrId;

        return $this;
    }

    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId()
    {
        return $this->lcrId;
    }

    /**
     * Set priority
     *
     * @param boolean $priority
     *
     * @return self
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::between(intval($priority), 0, 1);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return boolean
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    protected function setWeight($weight)
    {
        Assertion::notNull($weight);
        Assertion::integerish($weight);
        Assertion::greaterOrEqualThan($weight, 0);

        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set rule
     *
     * @param \Core\Domain\Model\LcrRule\LcrRuleInterface $rule
     *
     * @return self
     */
    protected function setRule(\Core\Domain\Model\LcrRule\LcrRuleInterface $rule)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get rule
     *
     * @return \Core\Domain\Model\LcrRule\LcrRuleInterface
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * Set gw
     *
     * @param \Core\Domain\Model\LcrGateway\LcrGatewayInterface $gw
     *
     * @return self
     */
    protected function setGw(\Core\Domain\Model\LcrGateway\LcrGatewayInterface $gw)
    {
        $this->gw = $gw;

        return $this;
    }

    /**
     * Get gw
     *
     * @return \Core\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    public function getGw()
    {
        return $this->gw;
    }

    /**
     * Set outgoingRouting
     *
     * @param \Core\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return self
     */
    protected function setOutgoingRouting(\Core\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting)
    {
        $this->outgoingRouting = $outgoingRouting;

        return $this;
    }

    /**
     * Get outgoingRouting
     *
     * @return \Core\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting()
    {
        return $this->outgoingRouting;
    }



    // @codeCoverageIgnoreEnd
}

