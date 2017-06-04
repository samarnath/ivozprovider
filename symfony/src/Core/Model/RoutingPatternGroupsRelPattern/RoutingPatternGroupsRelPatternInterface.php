<?php

namespace Core\Model\RoutingPatternGroupsRelPattern;



interface RoutingPatternGroupsRelPatternInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get routingPattern
     *
     * @return \Core\Model\RoutingPattern\RoutingPattern
     */
    public function getRoutingPattern();


    /**
     * Set routingPatternGroup
     *
     * @param \Core\Model\RoutingPatternGroup\RoutingPatternGroup $routingPatternGroup
     *
     * @return RoutingPatternGroupsRelPatternInterface
     */
    public function setRoutingPatternGroup(\Core\Model\RoutingPatternGroup\RoutingPatternGroup $routingPatternGroup = null);


    /**
     * Get routingPatternGroup
     *
     * @return \Core\Model\RoutingPatternGroup\RoutingPatternGroup
     */
    public function getRoutingPatternGroup();



}

