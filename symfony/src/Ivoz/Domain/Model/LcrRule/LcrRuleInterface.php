<?php

namespace Ivoz\Domain\Model\LcrRule;

use Core\Domain\Model\EntityInterface;

interface LcrRuleInterface extends EntityInterface
{
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
     * @return \Ivoz\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();


    /**
     * Get outgoingRouting
     *
     * @return \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();



}

