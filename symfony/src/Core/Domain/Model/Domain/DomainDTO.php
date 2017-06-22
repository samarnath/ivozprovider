<?php

namespace Core\Domain\Model\Domain;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class DomainDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $scope = 'global';

    /**
     * @var string
     */
    private $pointsTo = 'proxyusers';

    /**
     * @var string
     */
    private $description;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $company;

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
            'domain' => $this->getDomain(),
            'scope' => $this->getScope(),
            'pointsTo' => $this->getPointsTo(),
            'description' => $this->getDescription(),
            'companyId' => $this->getCompanyId(),
            'brandId' => $this->getBrandId()
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
            ->setDomain(isset($data['domain']) ? $data['domain'] : null)
            ->setScope(isset($data['scope']) ? $data['scope'] : null)
            ->setPointsTo(isset($data['pointsTo']) ? $data['pointsTo'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\BrandInterface', $this->getBrandId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return DomainDTO
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
     * @param string $domain
     *
     * @return DomainDTO
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $scope
     *
     * @return DomainDTO
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param string $pointsTo
     *
     * @return DomainDTO
     */
    public function setPointsTo($pointsTo)
    {
        $this->pointsTo = $pointsTo;

        return $this;
    }

    /**
     * @return string
     */
    public function getPointsTo()
    {
        return $this->pointsTo;
    }

    /**
     * @param string $description
     *
     * @return DomainDTO
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $companyId
     *
     * @return DomainDTO
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

    /**
     * @param integer $brandId
     *
     * @return DomainDTO
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
}

