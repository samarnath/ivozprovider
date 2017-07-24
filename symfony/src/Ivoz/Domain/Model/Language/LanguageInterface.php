<?php

namespace Ivoz\Domain\Model\Language;

use Core\Domain\Model\EntityInterface;

interface LanguageInterface extends EntityInterface
{
    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();


    /**
     * Get name
     *
     * @return Name
     */
    public function getName();

}

