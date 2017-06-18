<?php

namespace Core\Domain\Model\LcrRuleTarget;



interface LcrRuleTargetInterface
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
     * @return \Core\Domain\Model\LcrRule\LcrRuleInterface
     */
    public function getRule();


    /**
     * Get gw
     *
     * @return \Core\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    public function getGw();


    /**
     * Get outgoingRouting
     *
     * @return \Core\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting();



}

