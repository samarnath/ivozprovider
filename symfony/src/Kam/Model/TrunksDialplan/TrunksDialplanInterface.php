<?php

namespace Kam\Model\TrunksDialplan;



interface TrunksDialplanInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get dpid
     *
     * @return integer
     */
    public function getDpid();


    /**
     * Get pr
     *
     * @return integer
     */
    public function getPr();


    /**
     * Get matchOp
     *
     * @return integer
     */
    public function getMatchOp();


    /**
     * Get matchExp
     *
     * @return string
     */
    public function getMatchExp();


    /**
     * Get matchLen
     *
     * @return integer
     */
    public function getMatchLen();


    /**
     * Get substExp
     *
     * @return string
     */
    public function getSubstExp();


    /**
     * Get replExp
     *
     * @return string
     */
    public function getReplExp();


    /**
     * Get attrs
     *
     * @return string
     */
    public function getAttrs();


    /**
     * Get transformationRulesetGroupsTrunk
     *
     * @return \Core\Model\TransformationRulesetGroupsTrunk\TransformationRulesetGroupsTrunkInterface
     */
    public function getTransformationRulesetGroupsTrunk();



}

