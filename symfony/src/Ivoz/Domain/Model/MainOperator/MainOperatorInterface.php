<?php

namespace Ivoz\Domain\Model\MainOperator;

use Core\Domain\Model\EntityInterface;

interface MainOperatorInterface extends EntityInterface
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
     * Get timezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone();



}

