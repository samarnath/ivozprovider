<?php

namespace Core\Model\FeaturesRelBrand;



interface FeaturesRelBrandInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return FeaturesRelBrandInterface
     */
    public function setBrand(\Core\Model\Brand\Brand $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();


    /**
     * Get feature
     *
     * @return \Core\Model\Feature\Feature
     */
    public function getFeature();



}

