<?php

namespace Kam\Domain\Model\Dispatcher;



interface DispatcherInterface
{
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
     * @return \Core\Domain\Model\ApplicationServer\ApplicationServerInterface
     */
    public function getApplicationServer();



}

