<?php

namespace Core\Model\TerminalManufacturer;



interface TerminalManufacturerInterface
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



}

