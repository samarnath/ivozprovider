<?php

namespace Kam\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamAccCdrDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $proxy;

    /**
     * @column start_time_utc
     * @var \DateTime
     */
    public $startTimeUtc = '2000-01-01 00:00:00';

    /**
     * @column end_time_utc
     * @var \DateTime
     */
    public $endTimeUtc = 'CURRENT_TIMESTAMP';

    /**
     * @column start_time
     * @var \DateTime
     */
    public $startTime = '2000-01-01 00:00:00';

    /**
     * @column end_time
     * @var \DateTime
     */
    public $endTime = '2000-01-01 00:00:00';

    /**
     * @var float
     */
    public $duration = '0.000';

    /**
     * @var string
     */
    public $caller;

    /**
     * @var string
     */
    public $callee;

    /**
     * @var string
     */
    public $referee;

    /**
     * @var string
     */
    public $referrer;

    /**
     * @var string
     */
    public $asiden;

    /**
     * @var string
     */
    public $asaddress;

    /**
     * @var string
     */
    public $callid;

    /**
     * @var string
     */
    public $callidhash;

    /**
     * @var string
     */
    public $xcallid;

    /**
     * @var string
     */
    public $parsed = 'no';

    /**
     * @var string
     */
    public $diversion;

    /**
     * @var string
     */
    public $peeringcontractid;

    /**
     * @var string
     */
    public $bounced = 'no';

    /**
     * @var boolean
     */
    public $externallyrated;

    /**
     * @var boolean
     */
    public $metered = '0';

    /**
     * @var \DateTime
     */
    public $meteringdate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    public $pricingplanname;

    /**
     * @var string
     */
    public $targetpatternname;

    /**
     * @var string
     */
    public $price;

    /**
     * @var string
     */
    public $pricingplandetails;

    /**
     * @var string
     */
    public $direction;

    /**
     * @var \DateTime
     */
    public $remeteringdate;

    /**
     * @var mixed
     */
    public $pricingPlanId;

    /**
     * @var mixed
     */
    public $targetPatternId;

    /**
     * @var mixed
     */
    public $invoiceId;

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $pricingPlan;

    /**
     * @var mixed
     */
    public $targetPattern;

    /**
     * @var mixed
     */
    public $invoice;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'proxy' => $this->getProxy(),
            'startTimeUtc' => $this->getStartTimeUtc(),
            'endTimeUtc' => $this->getEndTimeUtc(),
            'startTime' => $this->getStartTime(),
            'endTime' => $this->getEndTime(),
            'duration' => $this->getDuration(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'referee' => $this->getReferee(),
            'referrer' => $this->getReferrer(),
            'asiden' => $this->getAsiden(),
            'asaddress' => $this->getAsaddress(),
            'callid' => $this->getCallid(),
            'callidhash' => $this->getCallidhash(),
            'xcallid' => $this->getXcallid(),
            'parsed' => $this->getParsed(),
            'diversion' => $this->getDiversion(),
            'peeringcontractid' => $this->getPeeringcontractid(),
            'bounced' => $this->getBounced(),
            'externallyrated' => $this->getExternallyrated(),
            'metered' => $this->getMetered(),
            'meteringdate' => $this->getMeteringdate(),
            'pricingplanname' => $this->getPricingplanname(),
            'targetpatternname' => $this->getTargetpatternname(),
            'price' => $this->getPrice(),
            'pricingplandetails' => $this->getPricingplandetails(),
            'direction' => $this->getDirection(),
            'remeteringdate' => $this->getRemeteringdate(),
            'pricingPlanId' => $this->getPricingPlanId(),
            'targetPatternId' => $this->getTargetPatternId(),
            'invoiceId' => $this->getInvoiceId(),
            'brandId' => $this->getBrandId(),
            'companyId' => $this->getCompanyId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setProxy(isset($data['proxy']) ? $data['proxy'] : null)
            ->setStartTimeUtc(isset($data['startTimeUtc']) ? $data['startTimeUtc'] : null)
            ->setEndTimeUtc(isset($data['endTimeUtc']) ? $data['endTimeUtc'] : null)
            ->setStartTime(isset($data['startTime']) ? $data['startTime'] : null)
            ->setEndTime(isset($data['endTime']) ? $data['endTime'] : null)
            ->setDuration(isset($data['duration']) ? $data['duration'] : null)
            ->setCaller(isset($data['caller']) ? $data['caller'] : null)
            ->setCallee(isset($data['callee']) ? $data['callee'] : null)
            ->setReferee(isset($data['referee']) ? $data['referee'] : null)
            ->setReferrer(isset($data['referrer']) ? $data['referrer'] : null)
            ->setAsiden(isset($data['asiden']) ? $data['asiden'] : null)
            ->setAsaddress(isset($data['asaddress']) ? $data['asaddress'] : null)
            ->setCallid(isset($data['callid']) ? $data['callid'] : null)
            ->setCallidhash(isset($data['callidhash']) ? $data['callidhash'] : null)
            ->setXcallid(isset($data['xcallid']) ? $data['xcallid'] : null)
            ->setParsed(isset($data['parsed']) ? $data['parsed'] : null)
            ->setDiversion(isset($data['diversion']) ? $data['diversion'] : null)
            ->setPeeringcontractid(isset($data['peeringcontractid']) ? $data['peeringcontractid'] : null)
            ->setBounced(isset($data['bounced']) ? $data['bounced'] : null)
            ->setExternallyrated(isset($data['externallyrated']) ? $data['externallyrated'] : null)
            ->setMetered(isset($data['metered']) ? $data['metered'] : null)
            ->setMeteringdate(isset($data['meteringdate']) ? $data['meteringdate'] : null)
            ->setPricingplanname(isset($data['pricingplanname']) ? $data['pricingplanname'] : null)
            ->setTargetpatternname(isset($data['targetpatternname']) ? $data['targetpatternname'] : null)
            ->setPrice(isset($data['price']) ? $data['price'] : null)
            ->setPricingplandetails(isset($data['pricingplandetails']) ? $data['pricingplandetails'] : null)
            ->setDirection(isset($data['direction']) ? $data['direction'] : null)
            ->setRemeteringdate(isset($data['remeteringdate']) ? $data['remeteringdate'] : null)
            ->setPricingPlanId(isset($data['pricingPlanId']) ? $data['pricingPlanId'] : null)
            ->setTargetPatternId(isset($data['targetPatternId']) ? $data['targetPatternId'] : null)
            ->setInvoiceId(isset($data['invoiceId']) ? $data['invoiceId'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pricingPlan = $transformer->transform('Core\\Model\\PricingPlan\\PricingPlan', $this->getPricingPlanId());
        $this->targetPattern = $transformer->transform('Core\\Model\\TargetPattern\\TargetPattern', $this->getTargetPatternId());
        $this->invoice = $transformer->transform('Core\\Model\\Invoice\\Invoice', $this->getInvoiceId());
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return KamAccCdrDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $proxy
     *
     * @return KamAccCdrDTO
     */
    public function setProxy($proxy = null)
    {
        $this->proxy = $proxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param \DateTime $startTimeUtc
     *
     * @return KamAccCdrDTO
     */
    public function setStartTimeUtc($startTimeUtc)
    {
        $this->startTimeUtc = $startTimeUtc;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTimeUtc()
    {
        return $this->startTimeUtc;
    }

    /**
     * @param \DateTime $endTimeUtc
     *
     * @return KamAccCdrDTO
     */
    public function setEndTimeUtc($endTimeUtc)
    {
        $this->endTimeUtc = $endTimeUtc;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTimeUtc()
    {
        return $this->endTimeUtc;
    }

    /**
     * @param \DateTime $startTime
     *
     * @return KamAccCdrDTO
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $endTime
     *
     * @return KamAccCdrDTO
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param float $duration
     *
     * @return KamAccCdrDTO
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $caller
     *
     * @return KamAccCdrDTO
     */
    public function setCaller($caller = null)
    {
        $this->caller = $caller;

        return $this;
    }

    /**
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * @param string $callee
     *
     * @return KamAccCdrDTO
     */
    public function setCallee($callee = null)
    {
        $this->callee = $callee;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * @param string $referee
     *
     * @return KamAccCdrDTO
     */
    public function setReferee($referee = null)
    {
        $this->referee = $referee;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferee()
    {
        return $this->referee;
    }

    /**
     * @param string $referrer
     *
     * @return KamAccCdrDTO
     */
    public function setReferrer($referrer = null)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param string $asiden
     *
     * @return KamAccCdrDTO
     */
    public function setAsiden($asiden = null)
    {
        $this->asiden = $asiden;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsiden()
    {
        return $this->asiden;
    }

    /**
     * @param string $asaddress
     *
     * @return KamAccCdrDTO
     */
    public function setAsaddress($asaddress = null)
    {
        $this->asaddress = $asaddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsaddress()
    {
        return $this->asaddress;
    }

    /**
     * @param string $callid
     *
     * @return KamAccCdrDTO
     */
    public function setCallid($callid = null)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param string $callidhash
     *
     * @return KamAccCdrDTO
     */
    public function setCallidhash($callidhash = null)
    {
        $this->callidhash = $callidhash;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallidhash()
    {
        return $this->callidhash;
    }

    /**
     * @param string $xcallid
     *
     * @return KamAccCdrDTO
     */
    public function setXcallid($xcallid = null)
    {
        $this->xcallid = $xcallid;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcallid()
    {
        return $this->xcallid;
    }

    /**
     * @param string $parsed
     *
     * @return KamAccCdrDTO
     */
    public function setParsed($parsed = null)
    {
        $this->parsed = $parsed;

        return $this;
    }

    /**
     * @return string
     */
    public function getParsed()
    {
        return $this->parsed;
    }

    /**
     * @param string $diversion
     *
     * @return KamAccCdrDTO
     */
    public function setDiversion($diversion = null)
    {
        $this->diversion = $diversion;

        return $this;
    }

    /**
     * @return string
     */
    public function getDiversion()
    {
        return $this->diversion;
    }

    /**
     * @param string $peeringcontractid
     *
     * @return KamAccCdrDTO
     */
    public function setPeeringcontractid($peeringcontractid = null)
    {
        $this->peeringcontractid = $peeringcontractid;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeeringcontractid()
    {
        return $this->peeringcontractid;
    }

    /**
     * @param string $bounced
     *
     * @return KamAccCdrDTO
     */
    public function setBounced($bounced)
    {
        $this->bounced = $bounced;

        return $this;
    }

    /**
     * @return string
     */
    public function getBounced()
    {
        return $this->bounced;
    }

    /**
     * @param boolean $externallyrated
     *
     * @return KamAccCdrDTO
     */
    public function setExternallyrated($externallyrated = null)
    {
        $this->externallyrated = $externallyrated;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExternallyrated()
    {
        return $this->externallyrated;
    }

    /**
     * @param boolean $metered
     *
     * @return KamAccCdrDTO
     */
    public function setMetered($metered = null)
    {
        $this->metered = $metered;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMetered()
    {
        return $this->metered;
    }

    /**
     * @param \DateTime $meteringdate
     *
     * @return KamAccCdrDTO
     */
    public function setMeteringdate($meteringdate = null)
    {
        $this->meteringdate = $meteringdate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getMeteringdate()
    {
        return $this->meteringdate;
    }

    /**
     * @param string $pricingplanname
     *
     * @return KamAccCdrDTO
     */
    public function setPricingplanname($pricingplanname = null)
    {
        $this->pricingplanname = $pricingplanname;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingplanname()
    {
        return $this->pricingplanname;
    }

    /**
     * @param string $targetpatternname
     *
     * @return KamAccCdrDTO
     */
    public function setTargetpatternname($targetpatternname = null)
    {
        $this->targetpatternname = $targetpatternname;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetpatternname()
    {
        return $this->targetpatternname;
    }

    /**
     * @param string $price
     *
     * @return KamAccCdrDTO
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $pricingplandetails
     *
     * @return KamAccCdrDTO
     */
    public function setPricingplandetails($pricingplandetails = null)
    {
        $this->pricingplandetails = $pricingplandetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingplandetails()
    {
        return $this->pricingplandetails;
    }

    /**
     * @param string $direction
     *
     * @return KamAccCdrDTO
     */
    public function setDirection($direction = null)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param \DateTime $remeteringdate
     *
     * @return KamAccCdrDTO
     */
    public function setRemeteringdate($remeteringdate = null)
    {
        $this->remeteringdate = $remeteringdate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRemeteringdate()
    {
        return $this->remeteringdate;
    }

    /**
     * @param integer $pricingPlanId
     *
     * @return KamAccCdrDTO
     */
    public function setPricingPlanId($pricingPlanId)
    {
        $this->pricingPlanId = $pricingPlanId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPricingPlanId()
    {
        return $this->pricingPlanId;
    }

    /**
     * @return \Core\Model\PricingPlan\PricingPlan
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * @param integer $targetPatternId
     *
     * @return KamAccCdrDTO
     */
    public function setTargetPatternId($targetPatternId)
    {
        $this->targetPatternId = $targetPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetPatternId()
    {
        return $this->targetPatternId;
    }

    /**
     * @return \Core\Model\TargetPattern\TargetPattern
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * @param integer $invoiceId
     *
     * @return KamAccCdrDTO
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return \Core\Model\Invoice\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param integer $brandId
     *
     * @return KamAccCdrDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Core\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $companyId
     *
     * @return KamAccCdrDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}

