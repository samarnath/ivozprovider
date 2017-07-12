<?php

namespace Ivoz\Domain\Model\RoutingPatternGroupsRelPattern;



interface RoutingPatternGroupsRelPatternInterface
{
    /**
     * Get routingPattern
     *
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();


    /**
     * Set routingPatternGroup
     *
     * @param \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return RoutingPatternGroupsRelPatternInterface
     */
    public function setRoutingPatternGroup(\Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null);


    /**
     * Get routingPatternGroup
     *
     * @return \Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup();



}

