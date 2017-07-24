<?php

namespace Ivoz\Domain\Model\Locution;

use Core\Domain\Model\EntityInterface;

interface LocutionInterface extends EntityInterface
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

