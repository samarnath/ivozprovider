<?php

namespace Core\Model\Timezone;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Timezone
 */
class Timezone implements EntityInterface, TimezoneInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $tz;

    /**
     * @var string
     */
    protected $comment = '';

    /**
     * @comment ml
     * @var string
     */
    protected $timeZoneLabel = '';

    /**
     * @column timeZoneLabel_en
     * @var string
     */
    protected $timeZoneLabelEn = '';

    /**
     * @column timeZoneLabel_es
     * @var string
     */
    protected $timeZoneLabelEs = '';

    /**
     * @var \Core\Model\Country\CountryInterface
     */
    protected $country;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $tz,
        $timeZoneLabel,
        $timeZoneLabelEn,
        $timeZoneLabelEs
    ) {
        $this->setTz($tz);
        $this->setTimeZoneLabel($timeZoneLabel);
        $this->setTimeZoneLabelEn($timeZoneLabelEn);
        $this->setTimeZoneLabelEs($timeZoneLabelEs);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return TimezoneDTO
     */
    public static function createDTO()
    {
        return new TimezoneDTO();
    }

    /**
     * Factory method
     * @param TimezoneDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TimezoneDTO::class);

        $self = new self(
            $dto->getTz(),
            $dto->getTimeZoneLabel(),
            $dto->getTimeZoneLabelEn(),
            $dto->getTimeZoneLabelEs()
        );

        return $self
            ->setComment($dto->getComment())
            ->setCountry($dto->getCountry());
    }

    /**
     * @param TimezoneDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TimezoneDTO::class);

        $this
            ->setTz($dto->getTz())
            ->setComment($dto->getComment())
            ->setTimeZoneLabel($dto->getTimeZoneLabel())
            ->setTimeZoneLabelEn($dto->getTimeZoneLabelEn())
            ->setTimeZoneLabelEs($dto->getTimeZoneLabelEs())
            ->setCountry($dto->getCountry());


        return $this;
    }

    /**
     * @return TimezoneDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setTz($this->getTz())
            ->setComment($this->getComment())
            ->setTimeZoneLabel($this->getTimeZoneLabel())
            ->setTimeZoneLabelEn($this->getTimeZoneLabelEn())
            ->setTimeZoneLabelEs($this->getTimeZoneLabelEs())
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'tz' => $this->getTz(),
            'comment' => $this->getComment(),
            'timeZoneLabel' => $this->getTimeZoneLabel(),
            'timeZoneLabelEn' => $this->getTimeZoneLabelEn(),
            'timeZoneLabelEs' => $this->getTimeZoneLabelEs(),
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tz
     *
     * @param string $tz
     *
     * @return Timezone
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
     * @return Timezone
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
     * @return Timezone
     */
    protected function setTimeZoneLabel($timeZoneLabel)
    {
        Assertion::notNull($timeZoneLabel);
        Assertion::maxLength($timeZoneLabel, 20);

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
     * Set timeZoneLabelEn
     *
     * @param string $timeZoneLabelEn
     *
     * @return Timezone
     */
    protected function setTimeZoneLabelEn($timeZoneLabelEn)
    {
        Assertion::notNull($timeZoneLabelEn);
        Assertion::maxLength($timeZoneLabelEn, 20);

        $this->timeZoneLabelEn = $timeZoneLabelEn;

        return $this;
    }

    /**
     * Get timeZoneLabelEn
     *
     * @return string
     */
    public function getTimeZoneLabelEn()
    {
        return $this->timeZoneLabelEn;
    }

    /**
     * Set timeZoneLabelEs
     *
     * @param string $timeZoneLabelEs
     *
     * @return Timezone
     */
    protected function setTimeZoneLabelEs($timeZoneLabelEs)
    {
        Assertion::notNull($timeZoneLabelEs);
        Assertion::maxLength($timeZoneLabelEs, 20);

        $this->timeZoneLabelEs = $timeZoneLabelEs;

        return $this;
    }

    /**
     * Get timeZoneLabelEs
     *
     * @return string
     */
    public function getTimeZoneLabelEs()
    {
        return $this->timeZoneLabelEs;
    }

    /**
     * Set country
     *
     * @param \Core\Model\Country\CountryInterface $country
     *
     * @return Timezone
     */
    protected function setCountry(\Core\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Core\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }



    // @codeCoverageIgnoreEnd
}

