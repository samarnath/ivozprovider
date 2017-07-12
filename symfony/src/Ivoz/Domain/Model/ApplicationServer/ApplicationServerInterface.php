<?php

namespace Ivoz\Domain\Model\ApplicationServer;



interface ApplicationServerInterface
{
    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();



}

