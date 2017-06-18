<?php

namespace Core\Domain\Model\Country;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Country
 */
class Country implements EntityInterface, CountryInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $code = '';

    /**
     * @comment ml
     * @var string
     */
    protected $name;

    /**
     * @column name_en
     * @var string
     */
    protected $nameEn;

    /**
     * @column name_es
     * @var string
     */
    protected $nameEs;

    /**
     * @comment ml
     * @var string
     */
    protected $zone;

    /**
     * @column zone_en
     * @var string
     */
    protected $zoneEn = '';

    /**
     * @column zone_es
     * @var string
     */
    protected $zoneEs = '';

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
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($code, $zoneEn, $zoneEs, $nationalCC)
    {
        $this->setCode($code);
        $this->setZoneEn($zoneEn);
        $this->setZoneEs($zoneEs);
        $this->setNationalCC($nationalCC);
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
     * @param CountryDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CountryDTO::class);

        $self = new self(
            $dto->getCode(),
            $dto->getZoneEn(),
            $dto->getZoneEs(),
            $dto->getNationalCC()
        );

        return $self
            ->setName($dto->getName())
            ->setNameEn($dto->getNameEn())
            ->setNameEs($dto->getNameEs())
            ->setZone($dto->getZone())
            ->setCallingCode($dto->getCallingCode())
            ->setIntCode($dto->getIntCode())
            ->setE164Pattern($dto->getE164Pattern());
    }

    /**
     * @param CountryDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CountryDTO::class);

        $this
            ->setCode($dto->getCode())
            ->setName($dto->getName())
            ->setNameEn($dto->getNameEn())
            ->setNameEs($dto->getNameEs())
            ->setZone($dto->getZone())
            ->setZoneEn($dto->getZoneEn())
            ->setZoneEs($dto->getZoneEs())
            ->setCallingCode($dto->getCallingCode())
            ->setIntCode($dto->getIntCode())
            ->setE164Pattern($dto->getE164Pattern())
            ->setNationalCC($dto->getNationalCC());


        return $this;
    }

    /**
     * @return CountryDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setCode($this->getCode())
            ->setName($this->getName())
            ->setNameEn($this->getNameEn())
            ->setNameEs($this->getNameEs())
            ->setZone($this->getZone())
            ->setZoneEn($this->getZoneEn())
            ->setZoneEs($this->getZoneEs())
            ->setCallingCode($this->getCallingCode())
            ->setIntCode($this->getIntCode())
            ->setE164Pattern($this->getE164Pattern())
            ->setNationalCC($this->getNationalCC());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'nameEn' => $this->getNameEn(),
            'nameEs' => $this->getNameEs(),
            'zone' => $this->getZone(),
            'zoneEn' => $this->getZoneEn(),
            'zoneEs' => $this->getZoneEs(),
            'callingCode' => $this->getCallingCode(),
            'intCode' => $this->getIntCode(),
            'e164Pattern' => $this->getE164Pattern(),
            'nationalCC' => $this->getNationalCC()
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
     * Set code
     *
     * @param string $code
     *
     * @return Country
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
     * Set name
     *
     * @param string $name
     *
     * @return Country
     */
    protected function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 100);
        }

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
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return Country
     */
    protected function setNameEn($nameEn = null)
    {
        if (!is_null($nameEn)) {
            Assertion::maxLength($nameEn, 100);
        }

        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set nameEs
     *
     * @param string $nameEs
     *
     * @return Country
     */
    protected function setNameEs($nameEs = null)
    {
        if (!is_null($nameEs)) {
            Assertion::maxLength($nameEs, 100);
        }

        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * Set zone
     *
     * @param string $zone
     *
     * @return Country
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
     * Set zoneEn
     *
     * @param string $zoneEn
     *
     * @return Country
     */
    protected function setZoneEn($zoneEn)
    {
        Assertion::notNull($zoneEn);
        Assertion::maxLength($zoneEn, 55);

        $this->zoneEn = $zoneEn;

        return $this;
    }

    /**
     * Get zoneEn
     *
     * @return string
     */
    public function getZoneEn()
    {
        return $this->zoneEn;
    }

    /**
     * Set zoneEs
     *
     * @param string $zoneEs
     *
     * @return Country
     */
    protected function setZoneEs($zoneEs)
    {
        Assertion::notNull($zoneEs);
        Assertion::maxLength($zoneEs, 55);

        $this->zoneEs = $zoneEs;

        return $this;
    }

    /**
     * Get zoneEs
     *
     * @return string
     */
    public function getZoneEs()
    {
        return $this->zoneEs;
    }

    /**
     * Set callingCode
     *
     * @param integer $callingCode
     *
     * @return Country
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
     * @return Country
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
     * @return Country
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
     * @return Country
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



    // @codeCoverageIgnoreEnd
}

