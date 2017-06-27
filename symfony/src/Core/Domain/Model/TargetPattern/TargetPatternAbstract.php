<?php

namespace Core\Domain\Model\TargetPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * TargetPatternAbstract
 */
abstract class TargetPatternAbstract
{
    /**
     * @var string
     */
    protected $regExp;

    /**
     * @var \Core\Domain\Model\TargetPattern\Name
     */
    protected $name;

    /**
     * @var \Core\Domain\Model\TargetPattern\Description
     */
    protected $description;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set regExp
     *
     * @param string $regExp
     *
     * @return self
     */
    protected function setRegExp($regExp)
    {
        Assertion::notNull($regExp);
        Assertion::maxLength($regExp, 80);

        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * Set name
     *
     * @param Name $name
     *
     * @return self
     */
    protected function setName(Name $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param Description $description
     *
     * @return self
     */
    protected function setDescription(Description $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    // @codeCoverageIgnoreEnd
}

