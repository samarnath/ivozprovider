<?php

namespace Ivoz\Domain\Model\FixedCost;

use Core\Domain\Model\EntityInterface;

interface FixedCostInterface extends EntityInterface
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
     * Get cost
     *
     * @return string
     */
    public function getCost();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

