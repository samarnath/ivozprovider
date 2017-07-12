<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;



interface RoutingPatternGroupInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

