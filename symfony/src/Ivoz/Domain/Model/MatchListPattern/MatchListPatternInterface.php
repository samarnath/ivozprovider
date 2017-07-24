<?php

namespace Ivoz\Domain\Model\MatchListPattern;

use Core\Domain\Model\EntityInterface;

interface MatchListPatternInterface extends EntityInterface
{
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get type
     *
     * @return string
     */
    public function getType();


    /**
     * Get regexp
     *
     * @return string
     */
    public function getRegexp();


    /**
     * Get numbervalue
     *
     * @return string
     */
    public function getNumbervalue();


    /**
     * Get matchList
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList();


    /**
     * Get matchListPattern
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getMatchListPattern();



}

