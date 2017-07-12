<?php

namespace Ivoz\Domain\Model\Timezone;

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
     * @var Label
     */
    protected $label;

    /**
     * @var \Ivoz\Domain\Model\Country\CountryInterface
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
    public function __construct($tz, Label $label)
    {
        $this->setTz($tz);
        $this->setLabel($label);
    }

    abstract public function __wakeup();

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

        $label = new Label(
            $dto->getLabelLabel(),
            $dto->getLabelEn(),
            $dto->getLabelEs()
        );

        $self = new static(
            $dto->getTz(),
            $label
        );

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

        $label = new Label(
            $dto->getLabelLabel(),
            $dto->getLabelEn(),
            $dto->getLabelEs()
        );

        $this
            ->setTz($dto->getTz())
            ->setComment($dto->getComment())
            ->setLabel($label)
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
            ->setLabel($this->getLabel()->getLabel())
            ->setLabelEn($this->getLabel()->getEn())
            ->setLabelEs($this->getLabel()->getEs())
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
            'label' => $this->getLabel()->getLabel(),
            'en' => $this->getLabel()->getEn(),
            'es' => $this->getLabel()->getEs(),
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null
        ];
    }


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
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    protected function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set label
     *
     * @param Label $label
     *
     * @return self
     */
    protected function setLabel(Label $label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    // @codeCoverageIgnoreEnd
}

