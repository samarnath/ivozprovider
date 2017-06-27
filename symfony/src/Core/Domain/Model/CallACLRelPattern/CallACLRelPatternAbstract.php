<?php

namespace Core\Domain\Model\CallACLRelPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CallACLRelPatternAbstract
 */
abstract class CallACLRelPatternAbstract
{
    /**
     * @var integer
     */
    protected $priority;

    /**
     * @comment enum:allow|deny
     * @var string
     */
    protected $policy;

    /**
     * @var \Core\Domain\Model\CallACL\CallACLInterface
     */
    protected $callACL;

    /**
     * @var \Core\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    protected $callACLPattern;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set policy
     *
     * @param string $policy
     *
     * @return self
     */
    protected function setPolicy($policy)
    {
        Assertion::notNull($policy);
        Assertion::maxLength($policy, 25);
        Assertion::choice($policy, array (
          0 => 'allow',
          1 => 'deny',
        ));

        $this->policy = $policy;

        return $this;
    }

    /**
     * Get policy
     *
     * @return string
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * Set callACL
     *
     * @param \Core\Domain\Model\CallACL\CallACLInterface $callACL
     *
     * @return self
     */
    protected function setCallACL(\Core\Domain\Model\CallACL\CallACLInterface $callACL)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Core\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set callACLPattern
     *
     * @param \Core\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     *
     * @return self
     */
    protected function setCallACLPattern(\Core\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern)
    {
        $this->callACLPattern = $callACLPattern;

        return $this;
    }

    /**
     * Get callACLPattern
     *
     * @return \Core\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern()
    {
        return $this->callACLPattern;
    }



    // @codeCoverageIgnoreEnd
}

