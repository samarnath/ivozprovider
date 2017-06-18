<?php

namespace Core\Domain\Model\PricingPlansRelTargetPattern;



interface PricingPlansRelTargetPatternInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get connectionCharge
     *
     * @return string
     */
    public function getConnectionCharge();


    /**
     * Get periodTime
     *
     * @return integer
     */
    public function getPeriodTime();


    /**
     * Get perPeriodCharge
     *
     * @return string
     */
    public function getPerPeriodCharge();


    /**
     * Get pricingPlan
     *
     * @return \Core\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get targetPattern
     *
     * @return \Core\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

