<?php

namespace Ivoz\Domain\Model\MusicOnHold;



interface MusicOnHoldInterface
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
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


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

