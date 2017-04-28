<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TransformationRulesetGroupsTrunkDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @column caller_in
     * @var integer
     */
    public $callerIn;

    /**
     * @column callee_in
     * @var integer
     */
    public $calleeIn;

    /**
     * @column caller_out
     * @var integer
     */
    public $callerOut;

    /**
     * @column callee_out
     * @var integer
     */
    public $calleeOut;

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var boolean
     */
    public $automatic = '0';

    /**
     * @var string
     */
    public $internationalCode;

    /**
     * @var integer
     */
    public $nationalNumLength;

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $countryId;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $country;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'callerIn' => $this->getCallerIn(),
            'calleeIn' => $this->getCalleeIn(),
            'callerOut' => $this->getCallerOut(),
            'calleeOut' => $this->getCalleeOut(),
            'description' => $this->getDescription(),
            'automatic' => $this->getAutomatic(),
            'internationalCode' => $this->getInternationalCode(),
            'nationalNumLength' => $this->getNationalNumLength(),
            'brandId' => $this->getBrandId(),
            'countryId' => $this->getCountryId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setCallerIn(isset($data['callerIn']) ? $data['callerIn'] : null)
            ->setCalleeIn(isset($data['calleeIn']) ? $data['calleeIn'] : null)
            ->setCallerOut(isset($data['callerOut']) ? $data['callerOut'] : null)
            ->setCalleeOut(isset($data['calleeOut']) ? $data['calleeOut'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setAutomatic(isset($data['automatic']) ? $data['automatic'] : null)
            ->setInternationalCode(isset($data['internationalCode']) ? $data['internationalCode'] : null)
            ->setNationalNumLength(isset($data['nationalNumLength']) ? $data['nationalNumLength'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setCountryId(isset($data['countryId']) ? $data['countryId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->country = $transformer->transform('Core\\Model\\Country\\Country', $this->getCountryId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return TransformationRulesetGroupsTrunkDTO
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
     * @return TransformationRulesetGroupsTrunkDTO
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
     * @param integer $callerIn
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setCallerIn($callerIn = null)
    {
        $this->callerIn = $callerIn;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallerIn()
    {
        return $this->callerIn;
    }

    /**
     * @param integer $calleeIn
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setCalleeIn($calleeIn = null)
    {
        $this->calleeIn = $calleeIn;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCalleeIn()
    {
        return $this->calleeIn;
    }

    /**
     * @param integer $callerOut
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setCallerOut($callerOut = null)
    {
        $this->callerOut = $callerOut;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallerOut()
    {
        return $this->callerOut;
    }

    /**
     * @param integer $calleeOut
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setCalleeOut($calleeOut = null)
    {
        $this->calleeOut = $calleeOut;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCalleeOut()
    {
        return $this->calleeOut;
    }

    /**
     * @param string $description
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param boolean $automatic
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setAutomatic($automatic)
    {
        $this->automatic = $automatic;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getAutomatic()
    {
        return $this->automatic;
    }

    /**
     * @param string $internationalCode
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setInternationalCode($internationalCode = null)
    {
        $this->internationalCode = $internationalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getInternationalCode()
    {
        return $this->internationalCode;
    }

    /**
     * @param integer $nationalNumLength
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setNationalNumLength($nationalNumLength = null)
    {
        $this->nationalNumLength = $nationalNumLength;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNationalNumLength()
    {
        return $this->nationalNumLength;
    }

    /**
     * @param integer $brandId
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $countryId
     *
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @return \Core\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}

