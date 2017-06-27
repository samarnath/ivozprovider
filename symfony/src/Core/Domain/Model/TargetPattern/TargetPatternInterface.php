<?php

namespace Core\Domain\Model\TargetPattern;



interface TargetPatternInterface
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

