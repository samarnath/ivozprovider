<?php

namespace Kam\Model\TrunksAddres;



interface TrunksAddresInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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

