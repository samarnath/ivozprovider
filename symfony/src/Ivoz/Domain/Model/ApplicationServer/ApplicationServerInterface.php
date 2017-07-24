<?php

namespace Ivoz\Domain\Model\ApplicationServer;

use Core\Domain\Model\EntityInterface;

interface ApplicationServerInterface extends EntityInterface
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

