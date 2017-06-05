<?php

namespace Core\Model\CompanyAdmin;



interface CompanyAdminInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get username
     *
     * @return string
     */
    public function getUsername();


    /**
     * Get pass
     *
     * @return string
     */
    public function getPass();


    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();


    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get timezone
     *
     * @return \Core\Model\Timezone\TimezoneInterface
     */
    public function getTimezone();



}

