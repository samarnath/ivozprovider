<?php

namespace Core\Domain\Model\GenericMusicOnHold;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class GenericMusicOnHoldDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $originalFileFileSize;

    /**
     * @var string
     */
    private $originalFileMimeType;

    /**
     * @var string
     */
    private $originalFileBaseName;

    /**
     * @var integer
     */
    private $encodedFileFileSize;

    /**
     * @var string
     */
    private $encodedFileMimeType;

    /**
     * @var string
     */
    private $encodedFileBaseName;

    /**
     * @var string
     */
    private $status;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'originalFileFileSize' => $this->getOriginalFileFileSize(),
            'originalFileMimeType' => $this->getOriginalFileMimeType(),
            'originalFileBaseName' => $this->getOriginalFileBaseName(),
            'encodedFileFileSize' => $this->getEncodedFileFileSize(),
            'encodedFileMimeType' => $this->getEncodedFileMimeType(),
            'encodedFileBaseName' => $this->getEncodedFileBaseName(),
            'status' => $this->getStatus(),
            'brandId' => $this->getBrandId()
        ];
    }

    /**
     * @param array $data
     * @return self
     * @deprecated
     *
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setOriginalFileFileSize(isset($data['originalFileFileSize']) ? $data['originalFileFileSize'] : null)
            ->setOriginalFileMimeType(isset($data['originalFileMimeType']) ? $data['originalFileMimeType'] : null)
            ->setOriginalFileBaseName(isset($data['originalFileBaseName']) ? $data['originalFileBaseName'] : null)
            ->setEncodedFileFileSize(isset($data['encodedFileFileSize']) ? $data['encodedFileFileSize'] : null)
            ->setEncodedFileMimeType(isset($data['encodedFileMimeType']) ? $data['encodedFileMimeType'] : null)
            ->setEncodedFileBaseName(isset($data['encodedFileBaseName']) ? $data['encodedFileBaseName'] : null)
            ->setStatus(isset($data['status']) ? $data['status'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return GenericMusicOnHoldDTO
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
     * @return GenericMusicOnHoldDTO
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
     * @param integer $originalFileFileSize
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setOriginalFileFileSize($originalFileFileSize = null)
    {
        $this->originalFileFileSize = $originalFileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOriginalFileFileSize()
    {
        return $this->originalFileFileSize;
    }

    /**
     * @param string $originalFileMimeType
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setOriginalFileMimeType($originalFileMimeType = null)
    {
        $this->originalFileMimeType = $originalFileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFileMimeType()
    {
        return $this->originalFileMimeType;
    }

    /**
     * @param string $originalFileBaseName
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setOriginalFileBaseName($originalFileBaseName = null)
    {
        $this->originalFileBaseName = $originalFileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFileBaseName()
    {
        return $this->originalFileBaseName;
    }

    /**
     * @param integer $encodedFileFileSize
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setEncodedFileFileSize($encodedFileFileSize = null)
    {
        $this->encodedFileFileSize = $encodedFileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEncodedFileFileSize()
    {
        return $this->encodedFileFileSize;
    }

    /**
     * @param string $encodedFileMimeType
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setEncodedFileMimeType($encodedFileMimeType = null)
    {
        $this->encodedFileMimeType = $encodedFileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncodedFileMimeType()
    {
        return $this->encodedFileMimeType;
    }

    /**
     * @param string $encodedFileBaseName
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setEncodedFileBaseName($encodedFileBaseName = null)
    {
        $this->encodedFileBaseName = $encodedFileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncodedFileBaseName()
    {
        return $this->encodedFileBaseName;
    }

    /**
     * @param string $status
     *
     * @return GenericMusicOnHoldDTO
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $brandId
     *
     * @return GenericMusicOnHoldDTO
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
     * @return \Core\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }
}

