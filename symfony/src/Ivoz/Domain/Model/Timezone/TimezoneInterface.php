<?php

namespace Ivoz\Domain\Model\Timezone;

use Core\Domain\Model\EntityInterface;

interface TimezoneInterface extends EntityInterface
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

