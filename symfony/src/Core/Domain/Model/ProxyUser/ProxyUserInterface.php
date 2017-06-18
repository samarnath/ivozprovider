<?php

namespace Core\Domain\Model\ProxyUser;



interface ProxyUserInterface
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
     * Get ip
     *
     * @return string
     */
    public function getIp();



}

