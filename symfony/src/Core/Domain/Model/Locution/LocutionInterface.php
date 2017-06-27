<?php

namespace Core\Domain\Model\Locution;



interface LocutionInterface
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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get encodedFile
     *
     * @return EncodedFile
     */
    public function getEncodedFile();


    /**
     * Get originalFile
     *
     * @return OriginalFile
     */
    public function getOriginalFile();

}

