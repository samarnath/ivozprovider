<?php

namespace Core\Domain\Model\FeaturesRelCompany;



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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get feature
     *
     * @return \Core\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature();



}

