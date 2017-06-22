<?php

namespace Core\Domain\Model\BrandService;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class BrandServiceDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $serviceId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $service;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'code' => $this->getCode(),
            'brandId' => $this->getBrandId(),
            'serviceId' => $this->getServiceId()
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
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setServiceId(isset($data['serviceId']) ? $data['serviceId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\BrandInterface', $this->getBrandId());
        $this->service = $transformer->transform('Core\\Domain\\Model\\Service\\ServiceInterface', $this->getServiceId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return BrandServiceDTO
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
     * @return BrandServiceDTO
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
     * @param integer $brandId
     *
     * @return BrandServiceDTO
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
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $serviceId
     *
     * @return BrandServiceDTO
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @return \Core\Domain\Model\Service\ServiceInterface
     */
    public function getService()
    {
        return $this->service;
    }
}

