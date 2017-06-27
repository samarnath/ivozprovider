<?php

namespace Kam\Domain\Model\UsersLocationAttr;



interface UsersLocationAttrInterface
{
    /**
     * Get ruid
     *
     * @return string
     */
    public function getRuid();


    /**
     * Get username
     *
     * @return string
     */
    public function getUsername();


    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain();


    /**
     * Get aname
     *
     * @return string
     */
    public function getAname();


    /**
     * Get atype
     *
     * @return integer
     */
    public function getAtype();


    /**
     * Get avalue
     *
     * @return string
     */
    public function getAvalue();


    /**
     * Get lastModified
     *
     * @return \DateTime
     */
    public function getLastModified();



}

