<?php

namespace Core\Model\FriendsPattern;



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
     * @return \Core\Model\Friend\Friend
     */
    public function getFriend();



}

