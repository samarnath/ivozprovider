<?php

namespace Ivoz\Domain\Model\BrandOperator;



interface BrandOperatorInterface
{
    /**
     * Get username
     *
     * @return string
     */
    public function getUsername();


    /**
     * Get pass
     *
     * @return string
     */
    public function getPass();


    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();


    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname();


    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return BrandOperatorInterface
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get timezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone();



}

