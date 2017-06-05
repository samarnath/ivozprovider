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
     * @param \Core\Model\Brand\BrandInterface $brand
     *
     * @return BrandServiceInterface
     */
    public function setBrand(\Core\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get service
     *
     * @return \Core\Model\Service\ServiceInterface
     */
    public function getService();



}

