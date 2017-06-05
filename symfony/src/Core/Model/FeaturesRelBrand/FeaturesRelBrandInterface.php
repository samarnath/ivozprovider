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
     * @param \Core\Model\Brand\BrandInterface $brand
     *
     * @return FeaturesRelBrandInterface
     */
    public function setBrand(\Core\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get feature
     *
     * @return \Core\Model\Feature\FeatureInterface
     */
    public function getFeature();



}

