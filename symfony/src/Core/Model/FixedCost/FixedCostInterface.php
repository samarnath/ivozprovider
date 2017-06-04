<?php

namespace Core\Model\FixedCost;



interface FixedCostInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();



}

