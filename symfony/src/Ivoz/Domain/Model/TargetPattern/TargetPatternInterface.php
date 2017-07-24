<?php

namespace Ivoz\Domain\Model\TargetPattern;

use Core\Domain\Model\EntityInterface;

interface TargetPatternInterface extends EntityInterface
{
    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp();


    /**
     * Get name
     *
     * @return Name
     */
    public function getName();


    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription();

}

