<?php

namespace Core\Model\PricingPlan;



interface PricingPlanInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn();


    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn();


    /**
     * Get descriptionEs
     *
     * @return string
     */
    public function getDescriptionEs();


    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();



}

