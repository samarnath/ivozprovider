<?php

namespace Ivoz\Domain\Model\EtagVersion;

use Core\Domain\Model\EntityInterface;

interface EtagVersionInterface extends EntityInterface
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

