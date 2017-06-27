<?php

namespace Core\Domain\Model\Country;



interface CountryInterface
{
    /**
     * Get code
     *
     * @return string
     */
    public function getCode();


    /**
     * Get callingCode
     *
     * @return integer
     */
    public function getCallingCode();


    /**
     * Get intCode
     *
     * @return string
     */
    public function getIntCode();


    /**
     * Get e164Pattern
     *
     * @return string
     */
    public function getE164Pattern();


    /**
     * Get nationalCC
     *
     * @return boolean
     */
    public function getNationalCC();


    /**
     * Get name
     *
     * @return Name
     */
    public function getName();


    /**
     * Get zone
     *
     * @return Zone
     */
    public function getZone();

}

