<?php

namespace Ivoz\Domain\Model\CallACLPattern;



interface CallACLPatternInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();



}

