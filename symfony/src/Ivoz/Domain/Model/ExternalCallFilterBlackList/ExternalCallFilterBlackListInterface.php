<?php

namespace Ivoz\Domain\Model\ExternalCallFilterBlackList;

use Core\Domain\Model\EntityInterface;

interface ExternalCallFilterBlackListInterface extends EntityInterface
{
    /**
     * Get filter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get matchList
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList();



}

