<?php

namespace Core\Domain\Model\Domain;



interface DomainInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return DomainInterface
     */
    public function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();



}

