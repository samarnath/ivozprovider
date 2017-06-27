<?php

namespace Core\Domain\Model\Timezone;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Timezone
 */
class Timezone extends TimezoneAbstract implements TimezoneInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($tz, $timeZoneLabel)
    {
        $this->setTz($tz);
        $this->setTimeZoneLabel($timeZoneLabel);
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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TimezoneDTO
         */
        Assertion::isInstanceOf($dto, TimezoneDTO::class);

        $self = new self(
            $dto->getTz(),
            $dto->getTimeZoneLabel());

        return $self
            ->setComment($dto->getComment())
            ->setCountry($dto->getCountry())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TimezoneDTO
         */
        Assertion::isInstanceOf($dto, TimezoneDTO::class);

        $this
            ->setTz($dto->getTz())
            ->setComment($dto->getComment())
            ->setTimeZoneLabel($dto->getTimeZoneLabel())
            ->setCountry($dto->getCountry());


        return $this;
    }

    /**
     * @return TimezoneDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setTz($this->getTz())
            ->setComment($this->getComment())
            ->setTimeZoneLabel($this->getTimeZoneLabel())
            ->setId($this->getId())
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'tz' => $this->getTz(),
            'comment' => $this->getComment(),
            'timeZoneLabel' => $this->getTimeZoneLabel(),
            'id' => $this->getId(),
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null
        ];
    }


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


}

