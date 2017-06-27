<?php

namespace Core\Domain\Model\FeaturesRelCompany;



interface FeaturesRelCompanyInterface
{
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

