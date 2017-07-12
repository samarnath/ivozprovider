<?php

namespace Ivoz\Domain\Model\CompanyAdmin;



interface CompanyAdminInterface
{
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
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get timezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone();



}

