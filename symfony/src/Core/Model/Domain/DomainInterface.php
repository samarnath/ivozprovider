<?php

namespace Core\Model\Domain;



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
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Set brand
     *
     * @param \Core\Model\Brand\Brand $brand
     *
     * @return DomainInterface
     */
    public function setBrand(\Core\Model\Brand\Brand $brand = null);


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand();



}

