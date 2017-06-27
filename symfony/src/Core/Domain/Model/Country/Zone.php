<?php

namespace Core\Domain\Model\Country;

use Assert\Assertion;

/**
 * Zone
 */
class Zone
{
    /**
     * @comment ml
     * @var string
     */
    protected $zone;

    /**
     * @column zone_en
     * @var string
     */
    protected $en = '';

    /**
     * @column zone_es
     * @var string
     */
    protected $es = '';


    /**
     * Constructor
     */
    public function __construct($zone, $en, $es)
    {
        $this->setZone($zone);
        $this->setEn($en);
        $this->setEs($es);
    }

    // @codeCoverageIgnoreStart

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return self
     */
    protected function setZone($zone = null)
    {
        if (!is_null($zone)) {
            Assertion::maxLength($zone, 55);
        }

        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
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

