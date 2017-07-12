<?php

namespace Ivoz\Domain\Model\QueueMember;



interface QueueMemberInterface
{
    /**
     * Get penalty
     *
     * @return integer
     */
    public function getPenalty();


    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue();


    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser();



}

