<?php

namespace Core\Domain\Model\Timezone;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * TimezoneAbstract
 */
abstract class TimezoneAbstract
{
    /**
     * @var string
     */
    protected $tz;

    /**
     * @var string
     */
    protected $comment = '';

    /**
     * @column time_zone_label
     * @var string
     */
    protected $timeZoneLabel;

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
     * Set tz
     *
     * @param string $tz
     *
     * @return self
     */
    protected function setTz($tz)
    {
        Assertion::notNull($tz);
        Assertion::maxLength($tz, 255);

        $this->tz = $tz;

        return $this;
    }

    /**
     * Get tz
     *
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return self
     */
    protected function setComment($comment = null)
    {
        if (!is_null($comment)) {
            Assertion::maxLength($comment, 150);
        }

        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set timeZoneLabel
     *
     * @param string $timeZoneLabel
     *
     * @return self
     */
    protected function setTimeZoneLabel($timeZoneLabel)
    {
        Assertion::notNull($timeZoneLabel);

        $this->timeZoneLabel = $timeZoneLabel;

        return $this;
    }

    /**
     * Get timeZoneLabel
     *
     * @return string
     */
    public function getTimeZoneLabel()
    {
        return $this->timeZoneLabel;
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

