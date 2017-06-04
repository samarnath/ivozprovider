<?php

namespace Ast\Model\PsAor;



interface PsAorInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get sorceryId
     *
     * @return string
     */
    public function getSorceryId();


    /**
     * Get defaultExpiration
     *
     * @return integer
     */
    public function getDefaultExpiration();


    /**
     * Get maxContacts
     *
     * @return integer
     */
    public function getMaxContacts();


    /**
     * Get minimumExpiration
     *
     * @return integer
     */
    public function getMinimumExpiration();


    /**
     * Get removeExisting
     *
     * @return string
     */
    public function getRemoveExisting();


    /**
     * Get authenticateQualify
     *
     * @return string
     */
    public function getAuthenticateQualify();


    /**
     * Get maximumExpiration
     *
     * @return integer
     */
    public function getMaximumExpiration();


    /**
     * Get supportPath
     *
     * @return string
     */
    public function getSupportPath();


    /**
     * Get contact
     *
     * @return string
     */
    public function getContact();


    /**
     * Get qualifyFrequency
     *
     * @return integer
     */
    public function getQualifyFrequency();



}

