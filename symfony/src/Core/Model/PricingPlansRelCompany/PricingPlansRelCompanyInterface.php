<?php

namespace Core\Model\PricingPlansRelCompany;



interface PricingPlansRelCompanyInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();



}

