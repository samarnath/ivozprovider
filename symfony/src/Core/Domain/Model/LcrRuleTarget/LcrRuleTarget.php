<?php

namespace Core\Domain\Model\LcrRuleTarget;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * LcrRuleTarget
 */
class LcrRuleTarget extends LcrRuleTargetAbstract implements LcrRuleTargetInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrRuleTargetDTO
         */
        Assertion::isInstanceOf($dto, LcrRuleTargetDTO::class);

        $self = new self(
            $dto->getLcrId(),
            $dto->getPriority(),
            $dto->getWeight());

        return $self
            ->setRule($dto->getRule())
            ->setGw($dto->getGw())
            ->setOutgoingRouting($dto->getOutgoingRouting())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
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
        return self::createDTO()
            ->setLcrId($this->getLcrId())
            ->setPriority($this->getPriority())
            ->setWeight($this->getWeight())
            ->setId($this->getId())
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
            'lcrId' => $this->getLcrId(),
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'id' => $this->getId(),
            'ruleId' => $this->getRule() ? $this->getRule()->getId() : null,
            'gwId' => $this->getGw() ? $this->getGw()->getId() : null,
            'outgoingRoutingId' => $this->getOutgoingRouting() ? $this->getOutgoingRouting()->getId() : null
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


}

