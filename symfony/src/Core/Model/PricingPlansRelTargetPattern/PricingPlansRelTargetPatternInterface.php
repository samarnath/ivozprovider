<?php

namespace Core\Model\PricingPlansRelTargetPattern;



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
     * @return \Core\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get targetPattern
     *
     * @return \Core\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();



}

