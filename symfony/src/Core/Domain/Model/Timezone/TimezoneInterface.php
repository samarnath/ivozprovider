<?php

namespace Core\Domain\Model\Timezone;



interface TimezoneInterface
{
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
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry();



}

