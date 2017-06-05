<?php

namespace Kam\Model\UsersAddres;



interface UsersAddresInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get sourceAddress
     *
     * @return string
     */
    public function getSourceAddress();


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


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();



}

