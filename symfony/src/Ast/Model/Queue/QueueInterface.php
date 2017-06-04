<?php

namespace Ast\Model\Queue;



interface QueueInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get periodicAnnounce
     *
     * @return string
     */
    public function getPeriodicAnnounce();


    /**
     * Get periodicAnnounceFrequency
     *
     * @return integer
     */
    public function getPeriodicAnnounceFrequency();


    /**
     * Get timeout
     *
     * @return integer
     */
    public function getTimeout();


    /**
     * Get autopause
     *
     * @return string
     */
    public function getAutopause();


    /**
     * Get ringinuse
     *
     * @return string
     */
    public function getRinginuse();


    /**
     * Get wrapuptime
     *
     * @return integer
     */
    public function getWrapuptime();


    /**
     * Get maxlen
     *
     * @return integer
     */
    public function getMaxlen();


    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy();


    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight();


    /**
     * Get queue
     *
     * @return \Core\Model\Queue\Queue
     */
    public function getQueue();



}

