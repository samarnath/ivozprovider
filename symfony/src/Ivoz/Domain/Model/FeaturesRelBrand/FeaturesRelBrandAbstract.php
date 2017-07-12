<?php

namespace Ivoz\Domain\Model\FeaturesRelBrand;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * FeaturesRelBrandAbstract
 */
abstract class FeaturesRelBrandAbstract
{
    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\Feature\FeatureInterface
     */
    protected $feature;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    abstract public function __wakeup();

    /**
     * @return FeaturesRelBrandDTO
     */
    public static function createDTO()
    {
        return new FeaturesRelBrandDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FeaturesRelBrandDTO
         */
        Assertion::isInstanceOf($dto, FeaturesRelBrandDTO::class);

        $self = new static();

        return $self
            ->setBrand($dto->getBrand())
            ->setFeature($dto->getFeature())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FeaturesRelBrandDTO
         */
        Assertion::isInstanceOf($dto, FeaturesRelBrandDTO::class);

        $this
            ->setBrand($dto->getBrand())
            ->setFeature($dto->getFeature());


        return $this;
    }

    /**
     * @return FeaturesRelBrandDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setFeatureId($this->getFeature() ? $this->getFeature()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'featureId' => $this->getFeature() ? $this->getFeature()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null)
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
     * Set feature
     *
     * @param \Ivoz\Domain\Model\Feature\FeatureInterface $feature
     *
     * @return self
     */
    protected function setFeature(\Ivoz\Domain\Model\Feature\FeatureInterface $feature)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * Get feature
     *
     * @return \Ivoz\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature()
    {
        return $this->feature;
    }



    // @codeCoverageIgnoreEnd
}

