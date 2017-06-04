<?php

namespace Core\Model\Timezone;



interface TimezoneInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get tz
     *
     * @return string
     */
    public function getTz();


    /**
     * Get comment
     *
     * @return string
     */
    public function getComment();


    /**
     * Get timeZoneLabel
     *
     * @return string
     */
    public function getTimeZoneLabel();


    /**
     * Get timeZoneLabelEn
     *
     * @return string
     */
    public function getTimeZoneLabelEn();


    /**
     * Get timeZoneLabelEs
     *
     * @return string
     */
    public function getTimeZoneLabelEs();


    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry();



}

