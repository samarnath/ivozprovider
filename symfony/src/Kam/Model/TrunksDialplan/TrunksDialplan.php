<?php

namespace Kam\Model\TrunksDialplan;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TrunksDialplan
 */
class TrunksDialplan implements EntityInterface, TrunksDialplanInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $dpid;

    /**
     * @var integer
     */
    protected $pr;

    /**
     * @column match_op
     * @var integer
     */
    protected $matchOp;

    /**
     * @column match_exp
     * @var string
     */
    protected $matchExp;

    /**
     * @column match_len
     * @var integer
     */
    protected $matchLen;

    /**
     * @column subst_exp
     * @var string
     */
    protected $substExp;

    /**
     * @column repl_exp
     * @var string
     */
    protected $replExp;

    /**
     * @var string
     */
    protected $attrs;

    /**
     * @var \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk
     */
    protected $transformationRulesetGroupsTrunk;


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
     * @param TrunksDialplanDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TrunksDialplanDTO::class);

        $self = new self(
            $dto->getDpid(),
            $dto->getPr(),
            $dto->getMatchOp(),
            $dto->getMatchExp(),
            $dto->getMatchLen(),
            $dto->getSubstExp(),
            $dto->getReplExp(),
            $dto->getAttrs()
        );

        return $self
            ->setTransformationRulesetGroupsTrunk($dto->getTransformationRulesetGroupsTrunk());
    }

    /**
     * @param TrunksDialplanDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
            ->setDpid($this->getDpid())
            ->setPr($this->getPr())
            ->setMatchOp($this->getMatchOp())
            ->setMatchExp($this->getMatchExp())
            ->setMatchLen($this->getMatchLen())
            ->setSubstExp($this->getSubstExp())
            ->setReplExp($this->getReplExp())
            ->setAttrs($this->getAttrs())
            ->setTransformationRulesetGroupsTrunkId($this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'dpid' => $this->getDpid(),
            'pr' => $this->getPr(),
            'matchOp' => $this->getMatchOp(),
            'matchExp' => $this->getMatchExp(),
            'matchLen' => $this->getMatchLen(),
            'substExp' => $this->getSubstExp(),
            'replExp' => $this->getReplExp(),
            'attrs' => $this->getAttrs(),
            'transformationRulesetGroupsTrunkId' => $this->getTransformationRulesetGroupsTrunk() ? $this->getTransformationRulesetGroupsTrunk()->getId() : null
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
     * Set dpid
     *
     * @param integer $dpid
     *
     * @return TrunksDialplan
     */
    protected function setDpid($dpid)
    {
        Assertion::notNull($dpid);
        Assertion::integerish($dpid);

        $this->dpid = $dpid;

        return $this;
    }

    /**
     * Get dpid
     *
     * @return integer
     */
    public function getDpid()
    {
        return $this->dpid;
    }

    /**
     * Set pr
     *
     * @param integer $pr
     *
     * @return TrunksDialplan
     */
    protected function setPr($pr)
    {
        Assertion::notNull($pr);
        Assertion::integerish($pr);

        $this->pr = $pr;

        return $this;
    }

    /**
     * Get pr
     *
     * @return integer
     */
    public function getPr()
    {
        return $this->pr;
    }

    /**
     * Set matchOp
     *
     * @param integer $matchOp
     *
     * @return TrunksDialplan
     */
    protected function setMatchOp($matchOp)
    {
        Assertion::notNull($matchOp);
        Assertion::integerish($matchOp);

        $this->matchOp = $matchOp;

        return $this;
    }

    /**
     * Get matchOp
     *
     * @return integer
     */
    public function getMatchOp()
    {
        return $this->matchOp;
    }

    /**
     * Set matchExp
     *
     * @param string $matchExp
     *
     * @return TrunksDialplan
     */
    protected function setMatchExp($matchExp)
    {
        Assertion::notNull($matchExp);
        Assertion::maxLength($matchExp, 64);

        $this->matchExp = $matchExp;

        return $this;
    }

    /**
     * Get matchExp
     *
     * @return string
     */
    public function getMatchExp()
    {
        return $this->matchExp;
    }

    /**
     * Set matchLen
     *
     * @param integer $matchLen
     *
     * @return TrunksDialplan
     */
    protected function setMatchLen($matchLen)
    {
        Assertion::notNull($matchLen);
        Assertion::integerish($matchLen);

        $this->matchLen = $matchLen;

        return $this;
    }

    /**
     * Get matchLen
     *
     * @return integer
     */
    public function getMatchLen()
    {
        return $this->matchLen;
    }

    /**
     * Set substExp
     *
     * @param string $substExp
     *
     * @return TrunksDialplan
     */
    protected function setSubstExp($substExp)
    {
        Assertion::notNull($substExp);
        Assertion::maxLength($substExp, 64);

        $this->substExp = $substExp;

        return $this;
    }

    /**
     * Get substExp
     *
     * @return string
     */
    public function getSubstExp()
    {
        return $this->substExp;
    }

    /**
     * Set replExp
     *
     * @param string $replExp
     *
     * @return TrunksDialplan
     */
    protected function setReplExp($replExp)
    {
        Assertion::notNull($replExp);
        Assertion::maxLength($replExp, 64);

        $this->replExp = $replExp;

        return $this;
    }

    /**
     * Get replExp
     *
     * @return string
     */
    public function getReplExp()
    {
        return $this->replExp;
    }

    /**
     * Set attrs
     *
     * @param string $attrs
     *
     * @return TrunksDialplan
     */
    protected function setAttrs($attrs)
    {
        Assertion::notNull($attrs);
        Assertion::maxLength($attrs, 64);

        $this->attrs = $attrs;

        return $this;
    }

    /**
     * Get attrs
     *
     * @return string
     */
    public function getAttrs()
    {
        return $this->attrs;
    }

    /**
     * Set transformationRulesetGroupsTrunk
     *
     * @param \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk $transformationRulesetGroupsTrunk
     *
     * @return TrunksDialplan
     */
    protected function setTransformationRulesetGroupsTrunk(\Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk $transformationRulesetGroupsTrunk)
    {
        $this->transformationRulesetGroupsTrunk = $transformationRulesetGroupsTrunk;

        return $this;
    }

    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunk
     */
    public function getTransformationRulesetGroupsTrunk()
    {
        return $this->transformationRulesetGroupsTrunk;
    }



    // @codeCoverageIgnoreEnd
}

