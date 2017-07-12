<?php

namespace Ivoz\Domain\Model\RoutingPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * RoutingPatternAbstract
 */
abstract class RoutingPatternAbstract
{
    /**
     * @var string
     */
    protected $regExp;

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
        $regExp,
        Name $name,
        Description $description
    ) {
        $this->setRegExp($regExp);
        $this->setName($name);
        $this->setDescription($description);
    }

    abstract public function __wakeup();

    /**
     * @return RoutingPatternDTO
     */
    public static function createDTO()
    {
        return new RoutingPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternDTO
         */
        Assertion::isInstanceOf($dto, RoutingPatternDTO::class);

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
            $dto->getRegExp(),
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
         * @var $dto RoutingPatternDTO
         */
        Assertion::isInstanceOf($dto, RoutingPatternDTO::class);

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
            ->setRegExp($dto->getRegExp())
            ->setName($name)
            ->setDescription($description)
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return RoutingPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setRegExp($this->getRegExp())
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
            'regExp' => $this->getRegExp(),
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
     * Set regExp
     *
     * @param string $regExp
     *
     * @return self
     */
    protected function setRegExp($regExp)
    {
        Assertion::notNull($regExp);
        Assertion::maxLength($regExp, 80);

        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
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

