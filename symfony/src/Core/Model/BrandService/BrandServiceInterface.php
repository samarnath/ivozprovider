<?php

namespace Core\Model\BrandService;



interface BrandServiceInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get code
     *
     * @return string
     */
    public function getCode();


    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return BrandServiceInterface
     */
    public function setBrand(\Core\Model\Brand\Brand $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();


    /**
     * Get service
     *
     * @return \Core\Model\Service\Service
     */
    public function getService();



}

