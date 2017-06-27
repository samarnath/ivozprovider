<?php

namespace Kam\Domain\Model\TrunksDialplan;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * TrunksDialplanAbstract
 */
abstract class TrunksDialplanAbstract
{
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
     * @var \Core\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    protected $transformationRulesetGroupsTrunk;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set dpid
     *
     * @param integer $dpid
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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



    // @codeCoverageIgnoreEnd
}

