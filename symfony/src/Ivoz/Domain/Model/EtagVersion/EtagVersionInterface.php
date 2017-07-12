<?php

namespace Ivoz\Domain\Model\EtagVersion;



interface EtagVersionInterface
{
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

