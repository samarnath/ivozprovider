<?php

namespace Ivoz\Domain\Model\Country;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class CountryDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $code = '';

    /**
     * @var integer
     */
    private $callingCode;

    /**
     * @var string
     */
    private $intCode;

    /**
     * @var string
     */
    private $e164Pattern;

    /**
     * @var boolean
     */
    private $nationalCC = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nameEn;

    /**
     * @var string
     */
    private $nameEs;

    /**
     * @var string
     */
    private $zone;

    /**
     * @var string
     */
    private $zoneEn = '';

    /**
     * @var string
     */
    private $zoneEs = '';

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'code' => $this->getCode(),
            'callingCode' => $this->getCallingCode(),
            'intCode' => $this->getIntCode(),
            'e164Pattern' => $this->getE164Pattern(),
            'nationalCC' => $this->getNationalCC(),
            'id' => $this->getId(),
            'nameName' => $this->getNameName(),
            'nameEn' => $this->getNameEn(),
            'nameEs' => $this->getNameEs(),
            'zoneZone' => $this->getZoneZone(),
            'zoneEn' => $this->getZoneEn(),
            'zoneEs' => $this->getZoneEs()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @param string $name
     *
     * @return CountryDTO
     */
    public function setName($name)
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
    public function setNameEn($nameEn)
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
    public function setNameEs($nameEs)
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
    public function setZone($zone)
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
}

