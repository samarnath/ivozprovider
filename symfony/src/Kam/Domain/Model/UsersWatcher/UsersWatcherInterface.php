<?php

namespace Kam\Domain\Model\UsersWatcher;



interface UsersWatcherInterface
{
    /**
     * Get presentityUri
     *
     * @return string
     */
    public function getPresentityUri();


    /**
     * Get watcherUsername
     *
     * @return string
     */
    public function getWatcherUsername();


    /**
     * Get watcherDomain
     *
     * @return string
     */
    public function getWatcherDomain();


    /**
     * Get event
     *
     * @return string
     */
    public function getEvent();


    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus();


    /**
     * Get reason
     *
     * @return string
     */
    public function getReason();


    /**
     * Get insertedTime
     *
     * @return integer
     */
    public function getInsertedTime();



}

