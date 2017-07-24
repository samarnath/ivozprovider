<?php

namespace Ivoz\Domain\Model\TerminalManufacturer;

use Core\Domain\Model\EntityInterface;

interface TerminalManufacturerInterface extends EntityInterface
{
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

