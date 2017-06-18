<?php

namespace Core\Domain\Model\BrandURL;



interface BrandURLInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * Get logoFileSize
     *
     * @return integer
     */
    public function getLogoFileSize();


    /**
     * Get logoMimeType
     *
     * @return string
     */
    public function getLogoMimeType();


    /**
     * Get logoBaseName
     *
     * @return string
     */
    public function getLogoBaseName();


    /**
     * Get userTheme
     *
     * @return string
     */
    public function getUserTheme();


    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return BrandURLInterface
     */
    public function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

