<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;

use Core\Domain\Model\EntityInterface;

interface RoutingPatternGroupInterface extends EntityInterface
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

