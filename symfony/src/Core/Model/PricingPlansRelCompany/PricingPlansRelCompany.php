<?php

namespace Core\Model\PricingPlansRelCompany;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PricingPlansRelCompany
 */
class PricingPlansRelCompany implements EntityInterface, PricingPlansRelCompanyInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \DateTime
     */
    protected $validFrom;

    /**
     * @var \DateTime
     */
    protected $validTo;

    /**
     * @var integer
     */
    protected $metric = '10';

    /**
     * @var \Core\Model\PricingPlan\PricingPlan
     */
    protected $pricingPlan;

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\Brand\Brand
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
    public function __construct($validFrom, $validTo, $metric)
    {
        $this->setValidFrom($validFrom);
        $this->setValidTo($validTo);
        $this->setMetric($metric);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return PricingPlansRelCompanyDTO
     */
    public static function createDTO()
    {
        return new PricingPlansRelCompanyDTO();
    }

    /**
     * Factory method
     * @param PricingPlansRelCompanyDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, PricingPlansRelCompanyDTO::class);

        $self = new self(
            $dto->getValidFrom(),
            $dto->getValidTo(),
            $dto->getMetric()
        );

        return $self
            ->setPricingPlan($dto->getPricingPlan())
            ->setCompany($dto->getCompany())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param PricingPlansRelCompanyDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, PricingPlansRelCompanyDTO::class);

        $this
            ->setValidFrom($dto->getValidFrom())
            ->setValidTo($dto->getValidTo())
            ->setMetric($dto->getMetric())
            ->setPricingPlan($dto->getPricingPlan())
            ->setCompany($dto->getCompany())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return PricingPlansRelCompanyDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setValidFrom($this->getValidFrom())
            ->setValidTo($this->getValidTo())
            ->setMetric($this->getMetric())
            ->setPricingPlanId($this->getPricingPlan() ? $this->getPricingPlan()->getId() : null)
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'validFrom' => $this->getValidFrom(),
            'validTo' => $this->getValidTo(),
            'metric' => $this->getMetric(),
            'pricingPlanId' => $this->getPricingPlan() ? $this->getPricingPlan()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
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
     * Set validFrom
     *
     * @param \DateTime $validFrom
     *
     * @return PricingPlansRelCompany
     */
    protected function setValidFrom($validFrom)
    {
        Assertion::notNull($validFrom);

        $this->validFrom = $validFrom;

        return $this;
    }

    /**
     * Get validFrom
     *
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * Set validTo
     *
     * @param \DateTime $validTo
     *
     * @return PricingPlansRelCompany
     */
    protected function setValidTo($validTo)
    {
        Assertion::notNull($validTo);

        $this->validTo = $validTo;

        return $this;
    }

    /**
     * Get validTo
     *
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * Set metric
     *
     * @param integer $metric
     *
     * @return PricingPlansRelCompany
     */
    protected function setMetric($metric)
    {
        Assertion::notNull($metric);
        Assertion::integerish($metric);

        $this->metric = $metric;

        return $this;
    }

    /**
     * Get metric
     *
     * @return integer
     */
    public function getMetric()
    {
        return $this->metric;
    }

    /**
     * Set pricingPlan
     *
     * @param \Core\Model\PricingPlan\PricingPlan $pricingPlan
     *
     * @return PricingPlansRelCompany
     */
    protected function setPricingPlan(\Core\Model\PricingPlan\PricingPlan $pricingPlan)
    {
        $this->pricingPlan = $pricingPlan;

        return $this;
    }

    /**
     * Get pricingPlan
     *
     * @return \Core\Model\PricingPlan\PricingPlan
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return PricingPlansRelCompany
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return PricingPlansRelCompany
     */
    protected function setBrand(\Core\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

