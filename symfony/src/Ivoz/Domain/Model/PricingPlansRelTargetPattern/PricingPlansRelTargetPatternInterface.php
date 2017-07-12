<?php

namespace Ivoz\Domain\Model\PricingPlansRelTargetPattern;



interface PricingPlansRelTargetPatternInterface
{
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
     * @return \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get targetPattern
     *
     * @return \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

