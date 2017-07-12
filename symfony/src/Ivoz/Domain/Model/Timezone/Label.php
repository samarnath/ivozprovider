<?php

namespace Ivoz\Domain\Model\Timezone;

use Assert\Assertion;

/**
 * Label
 */
class Label
{
    /**
     * @column timeZoneLabel
     * @comment ml
     * @var string
     */
    protected $label = '';

    /**
     * @column timeZoneLabel_en
     * @var string
     */
    protected $en = '';

    /**
     * @column timeZoneLabel_es
     * @var string
     */
    protected $es = '';


    /**
     * Constructor
     */
    public function __construct($label, $en, $es)
    {
        $this->setLabel($label);
        $this->setEn($en);
        $this->setEs($es);
    }

    // @codeCoverageIgnoreStart

    /**
     * Set label
     *
     * @param string $label
     *
     * @return self
     */
    protected function setLabel($label)
    {
        Assertion::notNull($label);
        Assertion::maxLength($label, 20);

        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
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
        Assertion::maxLength($en, 20);

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
        Assertion::maxLength($es, 20);

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

