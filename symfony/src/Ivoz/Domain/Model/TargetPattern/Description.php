<?php

namespace Ivoz\Domain\Model\TargetPattern;

use Assert\Assertion;

/**
 * Description
 */
class Description
{
    /**
     * @comment ml
     * @var string
     */
    protected $description;

    /**
     * @column description_en
     * @var string
     */
    protected $en;

    /**
     * @column description_es
     * @var string
     */
    protected $es;


    /**
     * Constructor
     */
    public function __construct($description, $en, $es)
    {
        $this->setDescription($description);
        $this->setEn($en);
        $this->setEs($es);
    }

    // @codeCoverageIgnoreStart

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 55);

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set en
     *
     * @param string $en
     *
     * @return self
     */
    protected function setEn($en)
    {
        Assertion::notNull($en);
        Assertion::maxLength($en, 55);

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
    protected function setEs($es)
    {
        Assertion::notNull($es);
        Assertion::maxLength($es, 55);

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

