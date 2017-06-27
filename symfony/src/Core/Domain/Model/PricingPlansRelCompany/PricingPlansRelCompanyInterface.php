<?php

namespace Core\Domain\Model\PricingPlansRelCompany;



interface PricingPlansRelCompanyInterface
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
     * @return \Core\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

