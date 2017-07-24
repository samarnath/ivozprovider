<?php

namespace Ivoz\Domain\Model\FeaturesRelCompany;

use Core\Domain\Model\EntityInterface;

interface FeaturesRelCompanyInterface extends EntityInterface
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

