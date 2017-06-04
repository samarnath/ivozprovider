<?php

namespace Core\Model\TransformationRulesetGroupsTrunk;



interface TransformationRulesetGroupsTrunkInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();


    /**
     * Get country
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountry();



}

