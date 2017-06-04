<?php

namespace Core\Model\RoutingPatternGroup;

use Doctrine\Common\Collections\Criteria;

interface RoutingPatternGroupInterface
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
     * Get relPatterns
     *
     * @return ArrayCollection
     */
    public function getRelPatterns(Criteria $criteria = null);


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();



}

