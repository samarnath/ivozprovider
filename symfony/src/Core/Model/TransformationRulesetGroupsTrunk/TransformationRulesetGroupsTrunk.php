<?php

namespace Core\Model\TransformationRulesetGroupsTrunk;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TransformationRulesetGroupsTrunk
 */
class TransformationRulesetGroupsTrunk implements EntityInterface, TransformationRulesetGroupsTrunkInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var \Core\Model\Brand\Brand
     */
    protected $brand;

    /**
     * @var \Core\Model\Country\Country
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
    public function __construct($name, $description, $automatic)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setAutomatic($automatic);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public static function createDTO()
    {
        return new TransformationRulesetGroupsTrunkDTO();
    }

    /**
     * Factory method
     * @param TransformationRulesetGroupsTrunkDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TransformationRulesetGroupsTrunkDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getDescription(),
            $dto->getAutomatic()
        );

        return $self
            ->setCallerIn($dto->getCallerIn())
            ->setCalleeIn($dto->getCalleeIn())
            ->setCallerOut($dto->getCallerOut())
            ->setCalleeOut($dto->getCalleeOut())
            ->setInternationalCode($dto->getInternationalCode())
            ->setNationalNumLength($dto->getNationalNumLength())
            ->setBrand($dto->getBrand())
            ->setCountry($dto->getCountry());
    }

    /**
     * @param TransformationRulesetGroupsTrunkDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TransformationRulesetGroupsTrunkDTO::class);

        $this
            ->setName($dto->getName())
            ->setCallerIn($dto->getCallerIn())
            ->setCalleeIn($dto->getCalleeIn())
            ->setCallerOut($dto->getCallerOut())
            ->setCalleeOut($dto->getCalleeOut())
            ->setDescription($dto->getDescription())
            ->setAutomatic($dto->getAutomatic())
            ->setInternationalCode($dto->getInternationalCode())
            ->setNationalNumLength($dto->getNationalNumLength())
            ->setBrand($dto->getBrand())
            ->setCountry($dto->getCountry());


        return $this;
    }

    /**
     * @return TransformationRulesetGroupsTrunkDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setCallerIn($this->getCallerIn())
            ->setCalleeIn($this->getCalleeIn())
            ->setCallerOut($this->getCallerOut())
            ->setCalleeOut($this->getCalleeOut())
            ->setDescription($this->getDescription())
            ->setAutomatic($this->getAutomatic())
            ->setInternationalCode($this->getInternationalCode())
            ->setNationalNumLength($this->getNationalNumLength())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
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
     * Set name
     *
     * @param string $name
     *
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @return TransformationRulesetGroupsTrunk
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
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return TransformationRulesetGroupsTrunk
     */
    protected function setBrand(\Core\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set country
     *
     * @param \Core\Model\Country\Country $country
     *
     * @return TransformationRulesetGroupsTrunk
     */
    protected function setCountry(\Core\Model\Country\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }



    // @codeCoverageIgnoreEnd
}

