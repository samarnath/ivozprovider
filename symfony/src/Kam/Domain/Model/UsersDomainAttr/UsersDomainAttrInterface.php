<?php

namespace Kam\Domain\Model\UsersDomainAttr;



interface UsersDomainAttrInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getDid();



}

