<?php

namespace Core\Model\OutgoingRouting;



interface OutgoingRoutingInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get type
     *
     * @return string
     */
    public function getType();


    /**
     * Get priority
     *
     * @return boolean
     */
    public function getPriority();


    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get peeringContract
     *
     * @return \Core\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract();


    /**
     * Get routingPattern
     *
     * @return \Core\Model\RoutingPattern\RoutingPattern
     */
    public function getRoutingPattern();


    /**
     * Get routingPatternGroup
     *
     * @return \Core\Model\RoutingPatternGroup\RoutingPatternGroup
     */
    public function getRoutingPatternGroup();



}

