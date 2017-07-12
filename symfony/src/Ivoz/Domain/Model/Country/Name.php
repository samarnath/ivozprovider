<?php

namespace Ivoz\Domain\Model\Country;

use Assert\Assertion;

/**
 * Name
 */
class Name
{
    /**
     * @comment ml
     * @var string
     */
    protected $name;

    /**
     * @column name_en
     * @var string
     */
    protected $en;

    /**
     * @column name_es
     * @var string
     */
    protected $es;


    /**
     * Constructor
     */
    public function __construct($name, $en, $es)
    {
        $this->setName($name);
        $this->setEn($en);
        $this->setEs($es);
    }

    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 100);
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set en
     *
     * @param string $en
     *
     * @return self
     */
    protected function setEn($en = null)
    {
        if (!is_null($en)) {
            Assertion::maxLength($en, 100);
        }

        $this->en = $en;

        return $this;
    }

    /**
     * Get en
     *
     * @return string
     */
    public function getEn()
    {
        return $this->en;
    }

    /**
     * Set es
     *
     * @param string $es
     *
     * @return self
     */
    protected function setEs($es = null)
    {
        if (!is_null($es)) {
            Assertion::maxLength($es, 100);
        }

        $this->es = $es;

        return $this;
    }

    /**
     * Get es
     *
     * @return string
     */
    public function getEs()
    {
        return $this->es;
    }



    // @codeCoverageIgnoreEnd
}

