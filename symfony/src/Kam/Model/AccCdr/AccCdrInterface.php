<?php

namespace Kam\Model\AccCdr;



interface AccCdrInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get proxy
     *
     * @return string
     */
    public function getProxy();


    /**
     * Get startTimeUtc
     *
     * @return \DateTime
     */
    public function getStartTimeUtc();


    /**
     * Get endTimeUtc
     *
     * @return \DateTime
     */
    public function getEndTimeUtc();


    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime();


    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime();


    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration();


    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller();


    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee();


    /**
     * Get referee
     *
     * @return string
     */
    public function getReferee();


    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer();


    /**
     * Get asiden
     *
     * @return string
     */
    public function getAsiden();


    /**
     * Get asaddress
     *
     * @return string
     */
    public function getAsaddress();


    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid();


    /**
     * Get callidhash
     *
     * @return string
     */
    public function getCallidhash();


    /**
     * Get xcallid
     *
     * @return string
     */
    public function getXcallid();


    /**
     * Get parsed
     *
     * @return string
     */
    public function getParsed();


    /**
     * Get diversion
     *
     * @return string
     */
    public function getDiversion();


    /**
     * Get peeringcontractid
     *
     * @return string
     */
    public function getPeeringcontractid();


    /**
     * Get bounced
     *
     * @return string
     */
    public function getBounced();


    /**
     * Get externallyrated
     *
     * @return boolean
     */
    public function getExternallyrated();


    /**
     * Get metered
     *
     * @return boolean
     */
    public function getMetered();


    /**
     * Get meteringdate
     *
     * @return \DateTime
     */
    public function getMeteringdate();


    /**
     * Get pricingplanname
     *
     * @return string
     */
    public function getPricingplanname();


    /**
     * Get targetpatternname
     *
     * @return string
     */
    public function getTargetpatternname();


    /**
     * Get price
     *
     * @return string
     */
    public function getPrice();


    /**
     * Get pricingplandetails
     *
     * @return string
     */
    public function getPricingplandetails();


    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection();


    /**
     * Get remeteringdate
     *
     * @return \DateTime
     */
    public function getRemeteringdate();


    /**
     * Get pricingPlan
     *
     * @return \Core\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan();


    /**
     * Get targetPattern
     *
     * @return \Core\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern();


    /**
     * Get invoice
     *
     * @return \Core\Model\Invoice\InvoiceInterface
     */
    public function getInvoice();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();



}

