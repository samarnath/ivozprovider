<?php

namespace Ivoz\Domain\Model\MediaRelaySet;

use Core\Domain\Model\EntityInterface;

interface MediaRelaySetInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();



}

