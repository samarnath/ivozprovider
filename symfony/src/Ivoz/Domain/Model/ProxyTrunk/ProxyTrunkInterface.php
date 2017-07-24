<?php

namespace Ivoz\Domain\Model\ProxyTrunk;

use Core\Domain\Model\EntityInterface;

interface ProxyTrunkInterface extends EntityInterface
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

