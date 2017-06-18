<?php

namespace Core\Domain\Model\ApplicationServer;



interface ApplicationServerInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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

