<?php

namespace Ivoz\Domain\Model\Service;



interface ServiceInterface
{
    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();


    /**
     * Get defaultCode
     *
     * @return string
     */
    public function getDefaultCode();


    /**
     * Get extraArgs
     *
     * @return boolean
     */
    public function getExtraArgs();


    /**
     * Get name
     *
     * @return Name
     */
    public function getName();


    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription();

}

