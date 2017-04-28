<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class CountryDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $code = '';

    /**
     * @var string
     */
    public $name;

    /**
     * @column name_en
     * @var string
     */
    public $nameEn;

    /**
     * @column name_es
     * @var string
     */
    public $nameEs;

    /**
     * @var string
     */
    public $zone;

    /**
     * @column zone_en
     * @var string
     */
    public $zoneEn = '';

    /**
     * @column zone_es
     * @var string
     */
    public $zoneEs = '';

    /**
     * @column calling_code
     * @var integer
     */
    public $callingCode;

    /**
     * @var string
     */
    public $intCode;

    /**
     * @var string
     */
    public $e164Pattern;

    /**
     * @var boolean
     */
    public $nationalCC = '0';

    /**
     * @return array
     */
    public function __toArray()
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

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setCode(isset($data['code']) ? $data['code'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setNameEn(isset($data['nameEn']) ? $data['nameEn'] : null)
            ->setNameEs(isset($data['nameEs']) ? $data['nameEs'] : null)
            ->setZone(isset($data['zone']) ? $data['zone'] : null)
            ->setZoneEn(isset($data['zoneEn']) ? $data['zoneEn'] : null)
            ->setZoneEs(isset($data['zoneEs']) ? $data['zoneEs'] : null)
            ->setCallingCode(isset($data['callingCode']) ? $data['callingCode'] : null)
            ->setIntCode(isset($data['intCode']) ? $data['intCode'] : null)
            ->setE164Pattern(isset($data['e164Pattern']) ? $data['e164Pattern'] : null)
            ->setNationalCC(isset($data['nationalCC']) ? $data['nationalCC'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return CountryDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $code
     *
     * @return CountryDTO
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $name
     *
     * @return CountryDTO
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $nameEn
     *
     * @return CountryDTO
     */
    public function setNameEn($nameEn = null)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * @param string $nameEs
     *
     * @return CountryDTO
     */
    public function setNameEs($nameEs = null)
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * @param string $zone
     *
     * @return CountryDTO
     */
    public function setZone($zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param string $zoneEn
     *
     * @return CountryDTO
     */
    public function setZoneEn($zoneEn)
    {
        $this->zoneEn = $zoneEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getZoneEn()
    {
        return $this->zoneEn;
    }

    /**
     * @param string $zoneEs
     *
     * @return CountryDTO
     */
    public function setZoneEs($zoneEs)
    {
        $this->zoneEs = $zoneEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getZoneEs()
    {
        return $this->zoneEs;
    }

    /**
     * @param integer $callingCode
     *
     * @return CountryDTO
     */
    public function setCallingCode($callingCode = null)
    {
        $this->callingCode = $callingCode;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallingCode()
    {
        return $this->callingCode;
    }

    /**
     * @param string $intCode
     *
     * @return CountryDTO
     */
    public function setIntCode($intCode = null)
    {
        $this->intCode = $intCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntCode()
    {
        return $this->intCode;
    }

    /**
     * @param string $e164Pattern
     *
     * @return CountryDTO
     */
    public function setE164Pattern($e164Pattern = null)
    {
        $this->e164Pattern = $e164Pattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getE164Pattern()
    {
        return $this->e164Pattern;
    }

    /**
     * @param boolean $nationalCC
     *
     * @return CountryDTO
     */
    public function setNationalCC($nationalCC)
    {
        $this->nationalCC = $nationalCC;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getNationalCC()
    {
        return $this->nationalCC;
    }
}

