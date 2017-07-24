<?php

namespace Ivoz\Domain\Model\FriendsPattern;

use Core\Domain\Model\EntityInterface;

interface FriendsPatternInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp();


    /**
     * Get friend
     *
     * @return \Ivoz\Domain\Model\Friend\FriendInterface
     */
    public function getFriend();



}

