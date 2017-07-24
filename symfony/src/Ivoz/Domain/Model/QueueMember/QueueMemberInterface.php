<?php

namespace Ivoz\Domain\Model\QueueMember;

use Core\Domain\Model\EntityInterface;

interface QueueMemberInterface extends EntityInterface
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

