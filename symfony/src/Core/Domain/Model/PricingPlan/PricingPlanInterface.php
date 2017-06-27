<?php

namespace Core\Domain\Model\PricingPlan;



interface PricingPlanInterface
{
    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get name
     *
     * @return Name
     */
    public function getName();


    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription();

}

