<?php

namespace Core\Domain\Model\Terminal;



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
     * Get allowAudio
     *
     * @return string
     */
    public function getAllowAudio();


    /**
     * Get allowVideo
     *
     * @return string
     */
    public function getAllowVideo();


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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get terminalModel
     *
     * @return \Core\Domain\Model\TerminalModel\TerminalModelInterface
     */
    public function getTerminalModel();



}

