<?php

namespace Ivoz\Domain\Model\Brand;

use Ivoz\Domain\Model\Company\CompanyInterface;
use Ivoz\Domain\Model\Feature\FeatureInterface;
use Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrandInterface;
use Ivoz\Domain\Model\OutgoingRouting\OutgoingRoutingInterface;

trait BrandTrait
{
    public function getActivePricingPlans($date = null)
    {
        $activePricingPlans = array();

        /**
         * @var $company CompanyInterface
         */
        foreach ($this->getCompanies() as $company) {
//            $this>_logger>log("[Brands] Company: ".$company>getName(), \Zend_Log::DEBUG);
            if (!is_null($company->getActivePricingPlan($date))) {
//                $this>_logger>log("[Brands] Active Pricing Plan is NOT null.", \Zend_Log::DEBUG);
                $activePricingPlans[] = $company->getActivePricingPlan();
            }
        }

        return $activePricingPlans;
    }

    public function getActivePrincingPlansIds($date = null)
    {
        $activePricingPlansIds = array();
        foreach ($this->getActivePricingPlans($date) as $activePricingPlan) {
            $activePricingPlansIds[] = $activePricingPlan->getId();
        }

        return $activePricingPlansIds;
    }

    public function getLanguageCode()
    {
        $language = $this->getLanguage();
        if (!$language) {
            return 'en';
        }

        return $language->getIden();
    }

    public function willUseExternallyRating(CompanyInterface $company, $destination=null)
    {
        $outgoingRoutings = $company->getOutgoingRoutings();

        /**
         * @var $outgoingRouting OutgoingRoutingInterface
         */
        foreach ($outgoingRoutings as $outgoingRouting) {
            if (!$outgoingRouting->getPeeringContract()->getExternallyRated()) {
                return false;
            }
        }

        // This call will be rated using externally rater
        return true;
    }

    /**
     * Get the size in bytes used by the recordings on this brand
     *
     */
    public function getRecordingsDiskUsage()
    {
        // Get the sum of all the companies usages
        $total = 0;

        /**
         * @var $company CompanyInterface
         */
        foreach ($this->getCompanies() as $company) {
            $total += $company->getRecordingsDiskUsage();
        }

        return $total;
    }

    /**
     * Get the size in bytes for disk usage limit on this brand
     */
    public function getRecordingsLimit()
    {
        return $this->getRecordingsLimitMB() * 1024 * 1024;
    }

    /**
     * @return FeatureInterface[]
     */
    public function getFeatures()
    {
        $features = array();
        /**
         * @var $relFeature FeaturesRelBrandInterface
         */
        foreach ($this->getRelFeatures() as $relFeature) {
            array_push($features, $relFeature->getFeature());
        }

        return $features;
    }

    public function hasFeature($featureId) {
        foreach ($this->getFeatures() as $feature) {
            if ($feature->getId() == $featureId) {

                return true;
            }
        }

        return false;
    }
}