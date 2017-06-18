<?php

namespace Kam\Domain\Model\TrunksDomainAttr;



interface TrunksDomainAttrInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get did
     *
     * @return string
     */
    public function getDid();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get type
     *
     * @return integer
     */
    public function getType();


    /**
     * Get value
     *
     * @return string
     */
    public function getValue();


    /**
     * Get lastModified
     *
     * @return \DateTime
     */
    public function getLastModified();



}

