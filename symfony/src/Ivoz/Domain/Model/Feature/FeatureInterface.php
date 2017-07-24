<?php

namespace Ivoz\Domain\Model\Feature;

use Core\Domain\Model\EntityInterface;

interface FeatureInterface extends EntityInterface
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
     * @return string
     */
    public function getName();


    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn();


    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs();



}

