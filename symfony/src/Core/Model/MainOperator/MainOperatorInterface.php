<?php

namespace Core\Model\MainOperator;



interface MainOperatorInterface
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
     * Get timezone
     *
     * @return \Core\Model\Timezone\TimezoneInterface
     */
    public function getTimezone();



}

