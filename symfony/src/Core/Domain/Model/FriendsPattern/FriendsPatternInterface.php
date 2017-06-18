<?php

namespace Core\Domain\Model\FriendsPattern;



interface FriendsPatternInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Domain\Model\Friend\FriendInterface
     */
    public function getFriend();



}

