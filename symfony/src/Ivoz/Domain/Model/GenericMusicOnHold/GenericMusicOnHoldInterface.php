<?php

namespace Ivoz\Domain\Model\GenericMusicOnHold;

use Core\Domain\Model\EntityInterface;

interface GenericMusicOnHoldInterface extends EntityInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get originalFile
     *
     * @return OriginalFile
     */
    public function getOriginalFile();


    /**
     * Get encodedFile
     *
     * @return EncodedFile
     */
    public function getEncodedFile();

}

