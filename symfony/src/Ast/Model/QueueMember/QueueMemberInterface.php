<?php

namespace Ast\Model\QueueMember;



interface QueueMemberInterface
{
    /**
     * Get uniqueid
     *
     * @return integer
     */
    public function getUniqueid();


    /**
     * Get queueName
     *
     * @return string
     */
    public function getQueueName();


    /**
     * Get interface
     *
     * @return string
     */
    public function getInterface();


    /**
     * Get membername
     *
     * @return string
     */
    public function getMembername();


    /**
     * Get stateInterface
     *
     * @return string
     */
    public function getStateInterface();


    /**
     * Get penalty
     *
     * @return integer
     */
    public function getPenalty();


    /**
     * Get paused
     *
     * @return integer
     */
    public function getPaused();


    /**
     * Get queueMember
     *
     * @return \Core\Model\QueueMember\QueueMember
     */
    public function getQueueMember();



}

