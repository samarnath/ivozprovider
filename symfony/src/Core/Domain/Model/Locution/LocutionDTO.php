<?php

namespace Core\Domain\Model\Locution;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class LocutionDTO implements DataTransferObjectInterface
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
    private $companyId;

    /**
     * @var mixed
     */
    private $company;

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
            'companyId' => $this->getCompanyId()
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
            ->setOriginalFileFileSize(isset($data['originalFileFileSize']) ? $data['originalFileFileSize'] : null)
            ->setOriginalFileMimeType(isset($data['originalFileMimeType']) ? $data['originalFileMimeType'] : null)
            ->setOriginalFileBaseName(isset($data['originalFileBaseName']) ? $data['originalFileBaseName'] : null)
            ->setEncodedFileFileSize(isset($data['encodedFileFileSize']) ? $data['encodedFileFileSize'] : null)
            ->setEncodedFileMimeType(isset($data['encodedFileMimeType']) ? $data['encodedFileMimeType'] : null)
            ->setEncodedFileBaseName(isset($data['encodedFileBaseName']) ? $data['encodedFileBaseName'] : null)
            ->setStatus(isset($data['status']) ? $data['status'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @return LocutionDTO
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
     * @param integer $companyId
     *
     * @return LocutionDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }
}

