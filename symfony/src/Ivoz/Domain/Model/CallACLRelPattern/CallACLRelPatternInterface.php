<?php

namespace Ivoz\Domain\Model\CallACLRelPattern;



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
     * @return \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL();


    /**
     * Get callACLPattern
     *
     * @return \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern();



}

