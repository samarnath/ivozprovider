<?php

namespace Ast\Domain\Model\QueueMember;



interface QueueMemberInterface
{
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
     * @return \Ivoz\Domain\Model\QueueMember\QueueMemberInterface
     */
    public function getQueueMember();



}

