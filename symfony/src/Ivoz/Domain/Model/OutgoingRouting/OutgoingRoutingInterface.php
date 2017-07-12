<?php

namespace Ivoz\Domain\Model\OutgoingRouting;



interface OutgoingRoutingInterface
{
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
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get peeringContract
     *
     * @return \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();


    /**
     * Get routingPattern
     *
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();


    /**
     * Get routingPatternGroup
     *
     * @return \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup();



}

