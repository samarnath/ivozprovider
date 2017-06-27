<?php

namespace Core\Domain\Model\TransformationRulesetGroupsTrunk;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * TransformationRulesetGroupsTrunkAbstract
 */
abstract class TransformationRulesetGroupsTrunkAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @column caller_in
     * @var integer
     */
    protected $callerIn;

    /**
     * @column callee_in
     * @var integer
     */
    protected $calleeIn;

    /**
     * @column caller_out
     * @var integer
     */
    protected $callerOut;

    /**
     * @column callee_out
     * @var integer
     */
    protected $calleeOut;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var boolean
     */
    protected $automatic = '0';

    /**
     * @var string
     */
    protected $internationalCode;

    /**
     * @var integer
     */
    protected $nationalNumLength;

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Core\Domain\Model\Country\CountryInterface
     */
    protected $country;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 100);

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
     * Set callerIn
     *
     * @param integer $callerIn
     *
     * @return self
     */
    protected function setCallerIn($callerIn = null)
    {
        if (!is_null($callerIn)) {
            if (!is_null($callerIn)) {
                Assertion::integerish($callerIn);
            }
        }

        $this->callerIn = $callerIn;

        return $this;
    }

    /**
     * Get callerIn
     *
     * @return integer
     */
    public function getCallerIn()
    {
        return $this->callerIn;
    }

    /**
     * Set calleeIn
     *
     * @param integer $calleeIn
     *
     * @return self
     */
    protected function setCalleeIn($calleeIn = null)
    {
        if (!is_null($calleeIn)) {
            if (!is_null($calleeIn)) {
                Assertion::integerish($calleeIn);
            }
        }

        $this->calleeIn = $calleeIn;

        return $this;
    }

    /**
     * Get calleeIn
     *
     * @return integer
     */
    public function getCalleeIn()
    {
        return $this->calleeIn;
    }

    /**
     * Set callerOut
     *
     * @param integer $callerOut
     *
     * @return self
     */
    protected function setCallerOut($callerOut = null)
    {
        if (!is_null($callerOut)) {
            if (!is_null($callerOut)) {
                Assertion::integerish($callerOut);
            }
        }

        $this->callerOut = $callerOut;

        return $this;
    }

    /**
     * Get callerOut
     *
     * @return integer
     */
    public function getCallerOut()
    {
        return $this->callerOut;
    }

    /**
     * Set calleeOut
     *
     * @param integer $calleeOut
     *
     * @return self
     */
    protected function setCalleeOut($calleeOut = null)
    {
        if (!is_null($calleeOut)) {
            if (!is_null($calleeOut)) {
                Assertion::integerish($calleeOut);
            }
        }

        $this->calleeOut = $calleeOut;

        return $this;
    }

    /**
     * Get calleeOut
     *
     * @return integer
     */
    public function getCalleeOut()
    {
        return $this->calleeOut;
    }

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
        Assertion::maxLength($description, 500);

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
     * Set automatic
     *
     * @param boolean $automatic
     *
     * @return self
     */
    protected function setAutomatic($automatic)
    {
        Assertion::notNull($automatic);
        Assertion::between(intval($automatic), 0, 1);

        $this->automatic = $automatic;

        return $this;
    }

    /**
     * Get automatic
     *
     * @return boolean
     */
    public function getAutomatic()
    {
        return $this->automatic;
    }

    /**
     * Set internationalCode
     *
     * @param string $internationalCode
     *
     * @return self
     */
    protected function setInternationalCode($internationalCode = null)
    {
        if (!is_null($internationalCode)) {
            Assertion::maxLength($internationalCode, 10);
        }

        $this->internationalCode = $internationalCode;

        return $this;
    }

    /**
     * Get internationalCode
     *
     * @return string
     */
    public function getInternationalCode()
    {
        return $this->internationalCode;
    }

    /**
     * Set nationalNumLength
     *
     * @param integer $nationalNumLength
     *
     * @return self
     */
    protected function setNationalNumLength($nationalNumLength = null)
    {
        if (!is_null($nationalNumLength)) {
            if (!is_null($nationalNumLength)) {
                Assertion::integerish($nationalNumLength);
                Assertion::greaterOrEqualThan($nationalNumLength, 0);
            }
        }

        $this->nationalNumLength = $nationalNumLength;

        return $this;
    }

    /**
     * Get nationalNumLength
     *
     * @return integer
     */
    public function getNationalNumLength()
    {
        return $this->nationalNumLength;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set country
     *
     * @param \Core\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    protected function setCountry(\Core\Domain\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }



    // @codeCoverageIgnoreEnd
}

