<?php

namespace Core\Domain\Model\TransformationRulesetGroupsTrunk;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TransformationRulesetGroupsTrunk
 */
class TransformationRulesetGroupsTrunk extends TransformationRulesetGroupsTrunkAbstract implements TransformationRulesetGroupsTrunkInterface, EntityInterface
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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TransformationRulesetGroupsTrunkDTO
         */
        Assertion::isInstanceOf($dto, TransformationRulesetGroupsTrunkDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getDescription(),
            $dto->getAutomatic());

        return $self
            ->setCallerIn($dto->getCallerIn())
            ->setCalleeIn($dto->getCalleeIn())
            ->setCallerOut($dto->getCallerOut())
            ->setCalleeOut($dto->getCalleeOut())
            ->setInternationalCode($dto->getInternationalCode())
            ->setNationalNumLength($dto->getNationalNumLength())
            ->setBrand($dto->getBrand())
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
         * @var $dto TransformationRulesetGroupsTrunkDTO
         */
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
            ->setName($this->getName())
            ->setCallerIn($this->getCallerIn())
            ->setCalleeIn($this->getCalleeIn())
            ->setCallerOut($this->getCallerOut())
            ->setCalleeOut($this->getCalleeOut())
            ->setDescription($this->getDescription())
            ->setAutomatic($this->getAutomatic())
            ->setInternationalCode($this->getInternationalCode())
            ->setNationalNumLength($this->getNationalNumLength())
            ->setId($this->getId())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'callerIn' => $this->getCallerIn(),
            'calleeIn' => $this->getCalleeIn(),
            'callerOut' => $this->getCallerOut(),
            'calleeOut' => $this->getCalleeOut(),
            'description' => $this->getDescription(),
            'automatic' => $this->getAutomatic(),
            'internationalCode' => $this->getInternationalCode(),
            'nationalNumLength' => $this->getNationalNumLength(),
            'id' => $this->getId(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
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
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
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

