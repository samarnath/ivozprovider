<?php

namespace Kam\Domain\Model\TrunksDialplan;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TrunksDialplan
 */
class TrunksDialplan extends TrunksDialplanAbstract implements TrunksDialplanInterface, EntityInterface
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
    public function __construct(
        $dpid,
        $pr,
        $matchOp,
        $matchExp,
        $matchLen,
        $substExp,
        $replExp,
        $attrs
    ) {
        $this->setDpid($dpid);
        $this->setPr($pr);
        $this->setMatchOp($matchOp);
        $this->setMatchExp($matchExp);
        $this->setMatchLen($matchLen);
        $this->setSubstExp($substExp);
        $this->setReplExp($replExp);
        $this->setAttrs($attrs);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return TrunksDialplanDTO
     */
    public static function createDTO()
    {
        return new TrunksDialplanDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TrunksDialplanDTO
         */
        Assertion::isInstanceOf($dto, TrunksDialplanDTO::class);

        $self = new self(
            $dto->getDpid(),
            $dto->getPr(),
            $dto->getMatchOp(),
            $dto->getMatchExp(),
            $dto->getMatchLen(),
            $dto->getSubstExp(),
            $dto->getReplExp(),
            $dto->getAttrs());

        return $self
            ->setTransformationRulesetGroupsTrunk($dto->getTransformationRulesetGroupsTrunk())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TrunksDialplanDTO
         */
        Assertion::isInstanceOf($dto, TrunksDialplanDTO::class);

        $this
            ->setDpid($dto->getDpid())
            ->setPr($dto->getPr())
            ->setMatchOp($dto->getMatchOp())
            ->setMatchExp($dto->getMatchExp())
            ->setMatchLen($dto->getMatchLen())
            ->setSubstExp($dto->getSubstExp())
            ->setReplExp($dto->getReplExp())
            ->setAttrs($dto->getAttrs())
            ->setTransformationRulesetGroupsTrunk($dto->getTransformationRulesetGroupsTrunk());


        return $this;
    }

    /**
     * @return TrunksDialplanDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setDpid($this->getDpid())
            ->setPr($this->getPr())
            ->setMatchOp($this->getMatchOp())
            ->setMatchExp($this->getMatchExp())
            ->setMatchLen($this->getMatchLen())
            ->setSubstExp($this->getSubstExp())
            ->setReplExp($this->getReplExp())
            ->setAttrs($this->getAttrs())
            ->setId($this->getId())
            ->setTransformationRulesetGroupsTrunkId($this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'dpid' => $this->getDpid(),
            'pr' => $this->getPr(),
            'matchOp' => $this->getMatchOp(),
            'matchExp' => $this->getMatchExp(),
            'matchLen' => $this->getMatchLen(),
            'substExp' => $this->getSubstExp(),
            'replExp' => $this->getReplExp(),
            'attrs' => $this->getAttrs(),
            'id' => $this->getId(),
            'transformationRulesetGroupsTrunkId' => $this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null
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
     * Set transformationRulesetGroupsTrunk
     *
     * @param \Core\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk
     *
     * @return self
     */
    protected function setTransformationRulesetGroupsTrunk(\Core\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface $transformationRulesetGroupsTrunk)
    {
        $this->transformationRulesetGroupsTrunk = $transformationRulesetGroupsTrunk;

        return $this;
    }

    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Core\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    public function getTransformationRulesetGroupsTrunk()
    {
        return $this->transformationRulesetGroupsTrunk;
    }


}

