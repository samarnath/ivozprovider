<?php

namespace Ivoz\Domain\Model\LcrRuleTarget;

use Core\Domain\Model\EntityInterface;

interface LcrRuleTargetInterface extends EntityInterface
{
    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId();


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
     * Get rule
     *
     * @return \Ivoz\Domain\Model\LcrRule\LcrRuleInterface
     */
    public function getRule();


    /**
     * Get gw
     *
     * @return \Ivoz\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    public function getGw();


    /**
     * Get outgoingRouting
     *
     * @return \Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();



}

