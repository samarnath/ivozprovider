<?php

namespace Core\Domain\Model\TransformationRulesetGroupsTrunk;



interface TransformationRulesetGroupsTrunkInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get callerIn
     *
     * @return integer
     */
    public function getCallerIn();


    /**
     * Get calleeIn
     *
     * @return integer
     */
    public function getCalleeIn();


    /**
     * Get callerOut
     *
     * @return integer
     */
    public function getCallerOut();


    /**
     * Get calleeOut
     *
     * @return integer
     */
    public function getCalleeOut();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get automatic
     *
     * @return boolean
     */
    public function getAutomatic();


    /**
     * Get internationalCode
     *
     * @return string
     */
    public function getInternationalCode();


    /**
     * Get nationalNumLength
     *
     * @return integer
     */
    public function getNationalNumLength();


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry();



}

