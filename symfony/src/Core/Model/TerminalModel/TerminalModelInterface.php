<?php

namespace Core\Model\TerminalModel;



interface TerminalModelInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get genericTemplate
     *
     * @return string
     */
    public function getGenericTemplate();


    /**
     * Get specificTemplate
     *
     * @return string
     */
    public function getSpecificTemplate();


    /**
     * Get genericUrlPattern
     *
     * @return string
     */
    public function getGenericUrlPattern();


    /**
     * Get specificUrlPattern
     *
     * @return string
     */
    public function getSpecificUrlPattern();


    /**
     * Get terminalManufacturer
     *
     * @return \Core\Model\TerminalManufacturer\TerminalManufacturerInterface
     */
    public function getTerminalManufacturer();



}

