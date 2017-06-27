<?php

namespace Core\Domain\Model\Country;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CountryAbstract
 */
abstract class CountryAbstract
{
    /**
     * @var string
     */
    protected $code = '';

    /**
     * @column calling_code
     * @var integer
     */
    protected $callingCode;

    /**
     * @var string
     */
    protected $intCode;

    /**
     * @var string
     */
    protected $e164Pattern;

    /**
     * @var boolean
     */
    protected $nationalCC = '0';

    /**
     * @var \Core\Domain\Model\Country\Name
     */
    protected $name;

    /**
     * @var \Core\Domain\Model\Country\Zone
     */
    protected $zone;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set code
     *
     * @param string $code
     *
     * @return self
     */
    protected function setCode($code)
    {
        Assertion::notNull($code);
        Assertion::maxLength($code, 100);

        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set callingCode
     *
     * @param integer $callingCode
     *
     * @return self
     */
    protected function setCallingCode($callingCode = null)
    {
        if (!is_null($callingCode)) {
            if (!is_null($callingCode)) {
                Assertion::integerish($callingCode);
                Assertion::greaterOrEqualThan($callingCode, 0);
            }
        }

        $this->callingCode = $callingCode;

        return $this;
    }

    /**
     * Get callingCode
     *
     * @return integer
     */
    public function getCallingCode()
    {
        return $this->callingCode;
    }

    /**
     * Set intCode
     *
     * @param string $intCode
     *
     * @return self
     */
    protected function setIntCode($intCode = null)
    {
        if (!is_null($intCode)) {
            Assertion::maxLength($intCode, 5);
        }

        $this->intCode = $intCode;

        return $this;
    }

    /**
     * Get intCode
     *
     * @return string
     */
    public function getIntCode()
    {
        return $this->intCode;
    }

    /**
     * Set e164Pattern
     *
     * @param string $e164Pattern
     *
     * @return self
     */
    protected function setE164Pattern($e164Pattern = null)
    {
        if (!is_null($e164Pattern)) {
            Assertion::maxLength($e164Pattern, 250);
        }

        $this->e164Pattern = $e164Pattern;

        return $this;
    }

    /**
     * Get e164Pattern
     *
     * @return string
     */
    public function getE164Pattern()
    {
        return $this->e164Pattern;
    }

    /**
     * Set nationalCC
     *
     * @param boolean $nationalCC
     *
     * @return self
     */
    protected function setNationalCC($nationalCC)
    {
        Assertion::notNull($nationalCC);
        Assertion::between(intval($nationalCC), 0, 1);

        $this->nationalCC = $nationalCC;

        return $this;
    }

    /**
     * Get nationalCC
     *
     * @return boolean
     */
    public function getNationalCC()
    {
        return $this->nationalCC;
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
     * Set zone
     *
     * @param Zone $zone
     *
     * @return self
     */
    protected function setZone(Zone $zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    // @codeCoverageIgnoreEnd
}

