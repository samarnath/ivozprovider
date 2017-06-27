<?php

namespace Core\Domain\Model\ProxyUser;



interface ProxyUserInterface
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

