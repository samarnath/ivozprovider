<?php

namespace Ivoz\Domain\Model\BrandURL;

use Core\Domain\Model\EntityInterface;

interface BrandURLInterface extends EntityInterface
{
    /**
     * Get url
     *
     * @return string
     */
    public function getUrl();


    /**
     * Get klearTheme
     *
     * @return string
     */
    public function getKlearTheme();


    /**
     * Get urlType
     *
     * @return string
     */
    public function getUrlType();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get userTheme
     *
     * @return string
     */
    public function getUserTheme();


    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return BrandURLInterface
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get logo
     *
     * @return Logo
     */
    public function getLogo();

}

