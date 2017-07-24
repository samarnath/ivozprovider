<?php

namespace Ivoz\Domain\Model\BrandService;

use Core\Domain\Model\EntityInterface;

interface BrandServiceInterface extends EntityInterface
{
    /**
     * Get code
     *
     * @return string
     */
    public function getCode();


    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return BrandServiceInterface
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get service
     *
     * @return \Ivoz\Domain\Model\Service\ServiceInterface
     */
    public function getService();



}

