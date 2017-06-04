<?php

namespace Core\Model\FeaturesRelCompany;



interface FeaturesRelCompanyInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get feature
     *
     * @return \Core\Model\Feature\Feature
     */
    public function getFeature();



}

