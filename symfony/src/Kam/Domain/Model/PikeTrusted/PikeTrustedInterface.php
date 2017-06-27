<?php

namespace Kam\Domain\Model\PikeTrusted;



interface PikeTrustedInterface
{
    /**
     * Get srcIp
     *
     * @return string
     */
    public function getSrcIp();


    /**
     * Get proto
     *
     * @return string
     */
    public function getProto();


    /**
     * Get fromPattern
     *
     * @return string
     */
    public function getFromPattern();


    /**
     * Get ruriPattern
     *
     * @return string
     */
    public function getRuriPattern();


    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();


    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();



}

