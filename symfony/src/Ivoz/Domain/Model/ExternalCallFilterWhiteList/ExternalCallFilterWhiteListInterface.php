<?php

namespace Ivoz\Domain\Model\ExternalCallFilterWhiteList;

use Core\Domain\Model\EntityInterface;

interface ExternalCallFilterWhiteListInterface extends EntityInterface
{
    /**
     * Get filter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter();


    /**
     * Get matchlist
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchlist();



}

