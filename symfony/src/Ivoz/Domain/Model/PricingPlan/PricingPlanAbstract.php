<?php

namespace Ivoz\Domain\Model\PricingPlan;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PricingPlanAbstract
 */
abstract class PricingPlanAbstract
{
    /**
     * @var \DateTime
     */
    protected $createdOn = 'CURRENT_TIMESTAMP';

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Description
     */
    protected $description;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $createdOn,
        Name $name,
        Description $description
    ) {
        $this->setCreatedOn($createdOn);
        $this->setName($name);
        $this->setDescription($description);
    }

    abstract public function __wakeup();

    /**
     * @return PricingPlanDTO
     */
    public static function createDTO()
    {
        return new PricingPlanDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlanDTO
         */
        Assertion::isInstanceOf($dto, PricingPlanDTO::class);

        $name = new Name(
            $dto->getNameName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescriptionDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $self = new static(
            $dto->getCreatedOn(),
            $name,
            $description
        );

        return $self
            ->setBrand($dto->getBrand())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlanDTO
         */
        Assertion::isInstanceOf($dto, PricingPlanDTO::class);

        $name = new Name(
            $dto->getNameName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescriptionDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $this
            ->setCreatedOn($dto->getCreatedOn())
            ->setName($name)
            ->setDescription($description)
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return PricingPlanDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setCreatedOn($this->getCreatedOn())
            ->setName($this->getName()->getName())
            ->setDescriptionEn($this->getDescription()->getEn())
            ->setDescriptionEs($this->getDescription()->getEs())
            ->setDescription($this->getDescription()->getDescription())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'createdOn' => $this->getCreatedOn(),
            'name' => $this->getName()->getName(),
            'en' => $this->getName()->getEn(),
            'es' => $this->getName()->getEs(),
            'description' => $this->getDescription()->getDescription(),
            'en' => $this->getDescription()->getEn(),
            'es' => $this->getDescription()->getEs(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return self
     */
    protected function setCreatedOn($createdOn)
    {
        Assertion::notNull($createdOn);

        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set name
     *
     * @param Name $name
     *
     * @return self
     */
    protected function setName(Name $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param Description $description
     *
     * @return self
     */
    protected function setDescription(Description $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    // @codeCoverageIgnoreEnd
}

