<?php

namespace Ivoz\Domain\Model\Domain;



interface DomainInterface
{
    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain();


    /**
     * Get scope
     *
     * @return string
     */
    public function getScope();


    /**
     * Get pointsTo
     *
     * @return string
     */
    public function getPointsTo();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return DomainInterface
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

