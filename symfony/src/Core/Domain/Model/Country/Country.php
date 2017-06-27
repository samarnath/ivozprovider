<?php

namespace Core\Domain\Model\Country;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Country
 */
class Country extends CountryAbstract implements CountryInterface, EntityInterface
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
    public function __construct(
        $code,
        $nationalCC,
        Name $name,
        Zone $zone
    ) {
        $this->setCode($code);
        $this->setNationalCC($nationalCC);
        $this->setName($name);
        $this->setZone($zone);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return CountryDTO
     */
    public static function createDTO()
    {
        return new CountryDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CountryDTO
         */
        Assertion::isInstanceOf($dto, CountryDTO::class);

        $name = new Name(
            $dto->getNameName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $zone = new Zone(
            $dto->getZoneZone(),
            $dto->getZoneEn(),
            $dto->getZoneEs()
        );

        $self = new self(
            $dto->getCode(),
            $dto->getNationalCC(),
            $name,
            $zone
        );

        return $self
            ->setCallingCode($dto->getCallingCode())
            ->setIntCode($dto->getIntCode())
            ->setE164Pattern($dto->getE164Pattern())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CountryDTO
         */
        Assertion::isInstanceOf($dto, CountryDTO::class);

        $name = new Name(
            $dto->getNameName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $zone = new Zone(
            $dto->getZoneZone(),
            $dto->getZoneEn(),
            $dto->getZoneEs()
        );

        $this
            ->setCode($dto->getCode())
            ->setCallingCode($dto->getCallingCode())
            ->setIntCode($dto->getIntCode())
            ->setE164Pattern($dto->getE164Pattern())
            ->setNationalCC($dto->getNationalCC())
            ->setName($name)
            ->setZone($zone);


        return $this;
    }

    /**
     * @return CountryDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setCode($this->getCode())
            ->setCallingCode($this->getCallingCode())
            ->setIntCode($this->getIntCode())
            ->setE164Pattern($this->getE164Pattern())
            ->setNationalCC($this->getNationalCC())
            ->setId($this->getId())
            ->setName($this->getName()->getName())
            ->setZoneEn($this->getZone()->getEn())
            ->setZoneEs($this->getZone()->getEs())
            ->setZone($this->getZone()->getZone());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'code' => $this->getCode(),
            'callingCode' => $this->getCallingCode(),
            'intCode' => $this->getIntCode(),
            'e164Pattern' => $this->getE164Pattern(),
            'nationalCC' => $this->getNationalCC(),
            'id' => $this->getId(),
            'name' => $this->getName()->getName(),
            'en' => $this->getName()->getEn(),
            'es' => $this->getName()->getEs(),
            'zone' => $this->getZone()->getZone(),
            'en' => $this->getZone()->getEn(),
            'es' => $this->getZone()->getEs()
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


}

