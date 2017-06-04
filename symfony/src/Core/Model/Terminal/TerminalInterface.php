<?php

namespace Core\Model\Terminal;



interface TerminalInterface
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
     * Get domain
     *
     * @return string
     */
    public function getDomain();


    /**
     * Get disallow
     *
     * @return string
     */
    public function getDisallow();


    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow();


    /**
     * Get directMediaMethod
     *
     * @return string
     */
    public function getDirectMediaMethod();


    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();


    /**
     * Get mac
     *
     * @return string
     */
    public function getMac();


    /**
     * Get lastProvisionDate
     *
     * @return \DateTime
     */
    public function getLastProvisionDate();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get terminalModel
     *
     * @return \Core\Model\TerminalModel\TerminalModel
     */
    public function getTerminalModel();



}

