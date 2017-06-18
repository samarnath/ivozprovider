<?php

namespace Core\Domain\Model\EtagVersion;



interface EtagVersionInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get table
     *
     * @return string
     */
    public function getTable();


    /**
     * Get etag
     *
     * @return string
     */
    public function getEtag();


    /**
     * Get lastChange
     *
     * @return \DateTime
     */
    public function getLastChange();



}

