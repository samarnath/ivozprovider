<?php

namespace Ivoz\Domain\Model\PeeringContract;

use Core\Domain\Model\EntityInterface;

interface PeeringContractInterface extends EntityInterface
{
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get externallyRated
     *
     * @return boolean
     */
    public function getExternallyRated();


    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Ivoz\Domain\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    public function getTransformationRulesetGroupsTrunk();



}

