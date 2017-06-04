<?php

namespace Kam\Model\Dispatcher;



interface DispatcherInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get setid
     *
     * @return integer
     */
    public function getSetid();


    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination();


    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags();


    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority();


    /**
     * Get attrs
     *
     * @return string
     */
    public function getAttrs();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get applicationServer
     *
     * @return \Core\Model\ApplicationServer\ApplicationServer
     */
    public function getApplicationServer();



}

