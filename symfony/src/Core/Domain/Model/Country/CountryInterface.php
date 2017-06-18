<?php

namespace Core\Domain\Model\Country;



interface CountryInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get code
     *
     * @return string
     */
    public function getCode();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn();


    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs();


    /**
     * Get zone
     *
     * @return string
     */
    public function getZone();


    /**
     * Get zoneEn
     *
     * @return string
     */
    public function getZoneEn();


    /**
     * Get zoneEs
     *
     * @return string
     */
    public function getZoneEs();


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



}

