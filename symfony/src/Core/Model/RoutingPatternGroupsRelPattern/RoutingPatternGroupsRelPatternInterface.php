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
     * @return \Core\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();


    /**
     * Set routingPatternGroup
     *
     * @param \Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return RoutingPatternGroupsRelPatternInterface
     */
    public function setRoutingPatternGroup(\Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null);


    /**
     * Get routingPatternGroup
     *
     * @return \Core\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup();



}

