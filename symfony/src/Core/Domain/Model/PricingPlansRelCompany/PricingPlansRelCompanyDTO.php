<?php

namespace Core\Domain\Model\PricingPlansRelCompany;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PricingPlansRelCompanyDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $validFrom;

    /**
     * @var \DateTime
     */
    private $validTo;

    /**
     * @var integer
     */
    private $metric = '10';

    /**
     * @var mixed
     */
    private $pricingPlanId;

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
    private $pricingPlan;

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
            'validFrom' => $this->getValidFrom(),
            'validTo' => $this->getValidTo(),
            'metric' => $this->getMetric(),
            'pricingPlanId' => $this->getPricingPlanId(),
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
            ->setValidFrom(isset($data['validFrom']) ? $data['validFrom'] : null)
            ->setValidTo(isset($data['validTo']) ? $data['validTo'] : null)
            ->setMetric(isset($data['metric']) ? $data['metric'] : null)
            ->setPricingPlanId(isset($data['pricingPlanId']) ? $data['pricingPlanId'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pricingPlan = $transformer->transform('Core\\Domain\\Model\\PricingPlan\\PricingPlanInterface', $this->getPricingPlanId());
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\BrandInterface', $this->getBrandId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PricingPlansRelCompanyDTO
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
     * @param \DateTime $validFrom
     *
     * @return PricingPlansRelCompanyDTO
     */
    public function setValidFrom($validFrom)
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * @param \DateTime $validTo
     *
     * @return PricingPlansRelCompanyDTO
     */
    public function setValidTo($validTo)
    {
        $this->validTo = $validTo;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * @param integer $metric
     *
     * @return PricingPlansRelCompanyDTO
     */
    public function setMetric($metric)
    {
        $this->metric = $metric;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * @param integer $pricingPlanId
     *
     * @return PricingPlansRelCompanyDTO
     */
    public function setPricingPlanId($pricingPlanId)
    {
        $this->pricingPlanId = $pricingPlanId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPricingPlanId()
    {
        return $this->pricingPlanId;
    }

    /**
     * @return \Core\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * @param integer $companyId
     *
     * @return PricingPlansRelCompanyDTO
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
     * @return PricingPlansRelCompanyDTO
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

