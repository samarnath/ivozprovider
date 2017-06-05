<?php

namespace Core\Model\BrandService;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * BrandService
 */
class BrandService implements EntityInterface, BrandServiceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var \Core\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Core\Model\Service\ServiceInterface
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

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return BrandServiceDTO
     */
    public static function createDTO()
    {
        return new BrandServiceDTO();
    }

    /**
     * Factory method
     * @param BrandServiceDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, BrandServiceDTO::class);

        $self = new self(
            $dto->getCode()
        );

        return $self
            ->setBrand($dto->getBrand())
            ->setService($dto->getService());
    }

    /**
     * @param BrandServiceDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'code' => $this->getCode(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'serviceId' => $this->getService() ? $this->getService()->getId() : null
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
     * @return BrandService
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
     * @param \Core\Model\Brand\BrandInterface $brand
     *
     * @return BrandService
     */
    public function setBrand(\Core\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set service
     *
     * @param \Core\Model\Service\ServiceInterface $service
     *
     * @return BrandService
     */
    protected function setService(\Core\Model\Service\ServiceInterface $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Core\Model\Service\ServiceInterface
     */
    public function getService()
    {
        return $this->service;
    }



    // @codeCoverageIgnoreEnd
}

