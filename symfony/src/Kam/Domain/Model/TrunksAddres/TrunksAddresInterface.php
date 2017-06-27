<?php

namespace Kam\Domain\Model\TrunksAddres;



interface TrunksAddresInterface
{
    /**
     * Get grp
     *
     * @return integer
     */
    public function getGrp();


    /**
     * Get ipAddr
     *
     * @return string
     */
    public function getIpAddr();


    /**
     * Get mask
     *
     * @return integer
     */
    public function getMask();


    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();


    /**
     * Get tag
     *
     * @return string
     */
    public function getTag();



}

