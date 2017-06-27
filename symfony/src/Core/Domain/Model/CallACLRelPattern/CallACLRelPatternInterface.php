<?php

namespace Core\Domain\Model\CallACLRelPattern;



interface CallACLRelPatternInterface
{
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
     * @return \Core\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL();


    /**
     * Get callACLPattern
     *
     * @return \Core\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern();



}

