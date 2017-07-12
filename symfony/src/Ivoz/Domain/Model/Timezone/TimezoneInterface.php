<?php

namespace Ivoz\Domain\Model\Timezone;



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
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry();


    /**
     * Get label
     *
     * @return Label
     */
    public function getLabel();

}

