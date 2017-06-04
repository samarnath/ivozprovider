<?php

namespace Core\Model\CallACLRelPattern;



interface CallACLRelPatternInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();


    /**
     * Get policy
     *
     * @return string
     */
    public function getPolicy();


    /**
     * Get callACL
     *
     * @return \Core\Model\CallACL\CallACL
     */
    public function getCallACL();


    /**
     * Get callACLPattern
     *
     * @return \Core\Model\CallACLPattern\CallACLPattern
     */
    public function getCallACLPattern();



}

