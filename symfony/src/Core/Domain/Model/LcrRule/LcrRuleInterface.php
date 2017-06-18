<?php

namespace Core\Domain\Model\LcrRule;



interface LcrRuleInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId();


    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix();


    /**
     * Get fromUri
     *
     * @return string
     */
    public function getFromUri();


    /**
     * Get requestUri
     *
     * @return string
     */
    public function getRequestUri();


    /**
     * Get stopper
     *
     * @return integer
     */
    public function getStopper();


    /**
     * Get enabled
     *
     * @return integer
     */
    public function getEnabled();


    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get routingPattern
     *
     * @return \Core\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();


    /**
     * Get outgoingRouting
     *
     * @return \Core\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();



}

