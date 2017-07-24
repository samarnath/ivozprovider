<?php

namespace Ivoz\Domain\Model\GenericCallACLPattern;

use Core\Domain\Model\EntityInterface;

interface GenericCallACLPatternInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

