<?php

namespace Ivoz\Domain\Model\BrandService;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * BrandServiceAbstract
 */
abstract class BrandServiceAbstract
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\Service\ServiceInterface
     */
    protected $service;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($code)
    {
        $this->setCode($code);
    }

    abstract public function __wakeup();

    /**
     * @return BrandServiceDTO
     */
    public static function createDTO()
    {
        return new BrandServiceDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandServiceDTO
         */
        Assertion::isInstanceOf($dto, BrandServiceDTO::class);

        $self = new static(
            $dto->getCode());

        return $self
            ->setBrand($dto->getBrand())
            ->setService($dto->getService())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandServiceDTO
         */
        Assertion::isInstanceOf($dto, BrandServiceDTO::class);

        $this
            ->setCode($dto->getCode())
            ->setBrand($dto->getBrand())
            ->setService($dto->getService());


        return $this;
    }

    /**
     * @return BrandServiceDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setCode($this->getCode())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setServiceId($this->getService() ? $this->getService()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'code' => $this->getCode(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'serviceId' => $this->getService() ? $this->getService()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set code
     *
     * @param string $code
     *
     * @return self
     */
    protected function setCode($code)
    {
        Assertion::notNull($code);
        Assertion::maxLength($code, 3);

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
     * Set service
     *
     * @param \Ivoz\Domain\Model\Service\ServiceInterface $service
     *
     * @return self
     */
    protected function setService(\Ivoz\Domain\Model\Service\ServiceInterface $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Ivoz\Domain\Model\Service\ServiceInterface
     */
    public function getService()
    {
        return $this->service;
    }



    // @codeCoverageIgnoreEnd
}

