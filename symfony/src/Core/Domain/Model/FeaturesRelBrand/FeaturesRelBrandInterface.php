<?php

namespace Core\Domain\Model\FeaturesRelBrand;



interface FeaturesRelBrandInterface
{
    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return FeaturesRelBrandInterface
     */
    public function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get feature
     *
     * @return \Core\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature();



}

