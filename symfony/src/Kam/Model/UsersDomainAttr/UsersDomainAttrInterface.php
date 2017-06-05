<?php

namespace Kam\Model\UsersDomainAttr;



interface UsersDomainAttrInterface
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


    /**
     * Get did
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getDid();



}

