<?php

namespace Ivoz\Domain\Model\PricingPlansRelCompany;

use Core\Domain\Model\EntityInterface;

interface PricingPlansRelCompanyInterface extends EntityInterface
{
    /**
     * Get validFrom
     *
     * @return \DateTime
     */
    public function getValidFrom();


    /**
     * Get validTo
     *
     * @return \DateTime
     */
    public function getValidTo();


    /**
     * Get metric
     *
     * @return integer
     */
    public function getMetric();


    /**
     * Get pricingPlan
     *
     * @return \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

