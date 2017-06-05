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
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get peeringContract
     *
     * @return \Core\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();


    /**
     * Get routingPattern
     *
     * @return \Core\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();


    /**
     * Get routingPatternGroup
     *
     * @return \Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup();



}

