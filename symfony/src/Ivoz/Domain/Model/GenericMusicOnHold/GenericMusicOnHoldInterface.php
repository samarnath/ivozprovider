<?php

namespace Ivoz\Domain\Model\GenericMusicOnHold;



interface GenericMusicOnHoldInterface
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

