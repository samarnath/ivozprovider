<?php

namespace Ivoz\Domain\Model\FeaturesRelCompany;



interface FeaturesRelCompanyInterface
{
    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get feature
     *
     * @return \Ivoz\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature();



}

