<?php

namespace Ivoz\Domain\Model\ProxyUser;

use Core\Domain\Model\EntityInterface;

interface ProxyUserInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();



}

