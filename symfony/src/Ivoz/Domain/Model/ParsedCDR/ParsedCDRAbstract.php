<?php

namespace Ivoz\Domain\Model\ParsedCDR;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ParsedCDRAbstract
 */
abstract class ParsedCDRAbstract
{
    /**
     * @var integer
     */
    protected $statId;

    /**
     * @var integer
     */
    protected $xstatId;

    /**
     * @var string
     */
    protected $statType;

    /**
     * @var string
     */
    protected $initialLeg;

    /**
     * @var string
     */
    protected $initialLegHash;

    /**
     * @var string
     */
    protected $cid;

    /**
     * @var string
     */
    protected $cidHash;

    /**
     * @var string
     */
    protected $xcid;

    /**
     * @var string
     */
    protected $xcidHash;

    /**
     * @var string
     */
    protected $proxies;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $subtype;

    /**
     * @var \DateTime
     */
    protected $calldate = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    protected $duration;

    /**
     * @var string
     */
    protected $aParty;

    /**
     * @var string
     */
    protected $bParty;

    /**
     * @var string
     */
    protected $caller;

    /**
     * @var string
     */
    protected $callee;

    /**
     * @var string
     */
    protected $xCaller;

    /**
     * @var string
     */
    protected $xCallee;

    /**
     * @var string
     */
    protected $initialReferrer;

    /**
     * @var string
     */
    protected $referrer;

    /**
     * @var string
     */
    protected $referee;

    /**
     * @var string
     */
    protected $lastForwarder;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface
     */
    protected $peeringContract;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($calldate)
    {
        $this->setCalldate($calldate);
    }

    abstract public function __wakeup();

    /**
     * @return ParsedCDRDTO
     */
    public static function createDTO()
    {
        return new ParsedCDRDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ParsedCDRDTO
         */
        Assertion::isInstanceOf($dto, ParsedCDRDTO::class);

        $self = new static(
            $dto->getCalldate());

        return $self
            ->setStatId($dto->getStatId())
            ->setXstatId($dto->getXstatId())
            ->setStatType($dto->getStatType())
            ->setInitialLeg($dto->getInitialLeg())
            ->setInitialLegHash($dto->getInitialLegHash())
            ->setCid($dto->getCid())
            ->setCidHash($dto->getCidHash())
            ->setXcid($dto->getXcid())
            ->setXcidHash($dto->getXcidHash())
            ->setProxies($dto->getProxies())
            ->setType($dto->getType())
            ->setSubtype($dto->getSubtype())
            ->setDuration($dto->getDuration())
            ->setAParty($dto->getAParty())
            ->setBParty($dto->getBParty())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setXCaller($dto->getXCaller())
            ->setXCallee($dto->getXCallee())
            ->setInitialReferrer($dto->getInitialReferrer())
            ->setReferrer($dto->getReferrer())
            ->setReferee($dto->getReferee())
            ->setLastForwarder($dto->getLastForwarder())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
            ->setPeeringContract($dto->getPeeringContract())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ParsedCDRDTO
         */
        Assertion::isInstanceOf($dto, ParsedCDRDTO::class);

        $this
            ->setStatId($dto->getStatId())
            ->setXstatId($dto->getXstatId())
            ->setStatType($dto->getStatType())
            ->setInitialLeg($dto->getInitialLeg())
            ->setInitialLegHash($dto->getInitialLegHash())
            ->setCid($dto->getCid())
            ->setCidHash($dto->getCidHash())
            ->setXcid($dto->getXcid())
            ->setXcidHash($dto->getXcidHash())
            ->setProxies($dto->getProxies())
            ->setType($dto->getType())
            ->setSubtype($dto->getSubtype())
            ->setCalldate($dto->getCalldate())
            ->setDuration($dto->getDuration())
            ->setAParty($dto->getAParty())
            ->setBParty($dto->getBParty())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setXCaller($dto->getXCaller())
            ->setXCallee($dto->getXCallee())
            ->setInitialReferrer($dto->getInitialReferrer())
            ->setReferrer($dto->getReferrer())
            ->setReferee($dto->getReferee())
            ->setLastForwarder($dto->getLastForwarder())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
            ->setPeeringContract($dto->getPeeringContract());


        return $this;
    }

    /**
     * @return ParsedCDRDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setStatId($this->getStatId())
            ->setXstatId($this->getXstatId())
            ->setStatType($this->getStatType())
            ->setInitialLeg($this->getInitialLeg())
            ->setInitialLegHash($this->getInitialLegHash())
            ->setCid($this->getCid())
            ->setCidHash($this->getCidHash())
            ->setXcid($this->getXcid())
            ->setXcidHash($this->getXcidHash())
            ->setProxies($this->getProxies())
            ->setType($this->getType())
            ->setSubtype($this->getSubtype())
            ->setCalldate($this->getCalldate())
            ->setDuration($this->getDuration())
            ->setAParty($this->getAParty())
            ->setBParty($this->getBParty())
            ->setCaller($this->getCaller())
            ->setCallee($this->getCallee())
            ->setXCaller($this->getXCaller())
            ->setXCallee($this->getXCallee())
            ->setInitialReferrer($this->getInitialReferrer())
            ->setReferrer($this->getReferrer())
            ->setReferee($this->getReferee())
            ->setLastForwarder($this->getLastForwarder())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setPeeringContractId($this->getPeeringContract() ? $this->getPeeringContract()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'statId' => $this->getStatId(),
            'xstatId' => $this->getXstatId(),
            'statType' => $this->getStatType(),
            'initialLeg' => $this->getInitialLeg(),
            'initialLegHash' => $this->getInitialLegHash(),
            'cid' => $this->getCid(),
            'cidHash' => $this->getCidHash(),
            'xcid' => $this->getXcid(),
            'xcidHash' => $this->getXcidHash(),
            'proxies' => $this->getProxies(),
            'type' => $this->getType(),
            'subtype' => $this->getSubtype(),
            'calldate' => $this->getCalldate(),
            'duration' => $this->getDuration(),
            'aParty' => $this->getAParty(),
            'bParty' => $this->getBParty(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'xCaller' => $this->getXCaller(),
            'xCallee' => $this->getXCallee(),
            'initialReferrer' => $this->getInitialReferrer(),
            'referrer' => $this->getReferrer(),
            'referee' => $this->getReferee(),
            'lastForwarder' => $this->getLastForwarder(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'peeringContractId' => $this->getPeeringContract() ? $this->getPeeringContract()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set statId
     *
     * @param integer $statId
     *
     * @return self
     */
    protected function setStatId($statId = null)
    {
        if (!is_null($statId)) {
            if (!is_null($statId)) {
                Assertion::integerish($statId);
                Assertion::greaterOrEqualThan($statId, 0);
            }
        }

        $this->statId = $statId;

        return $this;
    }

    /**
     * Get statId
     *
     * @return integer
     */
    public function getStatId()
    {
        return $this->statId;
    }

    /**
     * Set xstatId
     *
     * @param integer $xstatId
     *
     * @return self
     */
    protected function setXstatId($xstatId = null)
    {
        if (!is_null($xstatId)) {
            if (!is_null($xstatId)) {
                Assertion::integerish($xstatId);
                Assertion::greaterOrEqualThan($xstatId, 0);
            }
        }

        $this->xstatId = $xstatId;

        return $this;
    }

    /**
     * Get xstatId
     *
     * @return integer
     */
    public function getXstatId()
    {
        return $this->xstatId;
    }

    /**
     * Set statType
     *
     * @param string $statType
     *
     * @return self
     */
    protected function setStatType($statType = null)
    {
        if (!is_null($statType)) {
            Assertion::maxLength($statType, 256);
        }

        $this->statType = $statType;

        return $this;
    }

    /**
     * Get statType
     *
     * @return string
     */
    public function getStatType()
    {
        return $this->statType;
    }

    /**
     * Set initialLeg
     *
     * @param string $initialLeg
     *
     * @return self
     */
    protected function setInitialLeg($initialLeg = null)
    {
        if (!is_null($initialLeg)) {
            Assertion::maxLength($initialLeg, 255);
        }

        $this->initialLeg = $initialLeg;

        return $this;
    }

    /**
     * Get initialLeg
     *
     * @return string
     */
    public function getInitialLeg()
    {
        return $this->initialLeg;
    }

    /**
     * Set initialLegHash
     *
     * @param string $initialLegHash
     *
     * @return self
     */
    protected function setInitialLegHash($initialLegHash = null)
    {
        if (!is_null($initialLegHash)) {
            Assertion::maxLength($initialLegHash, 128);
        }

        $this->initialLegHash = $initialLegHash;

        return $this;
    }

    /**
     * Get initialLegHash
     *
     * @return string
     */
    public function getInitialLegHash()
    {
        return $this->initialLegHash;
    }

    /**
     * Set cid
     *
     * @param string $cid
     *
     * @return self
     */
    protected function setCid($cid = null)
    {
        if (!is_null($cid)) {
            Assertion::maxLength($cid, 255);
        }

        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid
     *
     * @return string
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set cidHash
     *
     * @param string $cidHash
     *
     * @return self
     */
    protected function setCidHash($cidHash = null)
    {
        if (!is_null($cidHash)) {
            Assertion::maxLength($cidHash, 128);
        }

        $this->cidHash = $cidHash;

        return $this;
    }

    /**
     * Get cidHash
     *
     * @return string
     */
    public function getCidHash()
    {
        return $this->cidHash;
    }

    /**
     * Set xcid
     *
     * @param string $xcid
     *
     * @return self
     */
    protected function setXcid($xcid = null)
    {
        if (!is_null($xcid)) {
            Assertion::maxLength($xcid, 255);
        }

        $this->xcid = $xcid;

        return $this;
    }

    /**
     * Get xcid
     *
     * @return string
     */
    public function getXcid()
    {
        return $this->xcid;
    }

    /**
     * Set xcidHash
     *
     * @param string $xcidHash
     *
     * @return self
     */
    protected function setXcidHash($xcidHash = null)
    {
        if (!is_null($xcidHash)) {
            Assertion::maxLength($xcidHash, 128);
        }

        $this->xcidHash = $xcidHash;

        return $this;
    }

    /**
     * Get xcidHash
     *
     * @return string
     */
    public function getXcidHash()
    {
        return $this->xcidHash;
    }

    /**
     * Set proxies
     *
     * @param string $proxies
     *
     * @return self
     */
    protected function setProxies($proxies = null)
    {
        if (!is_null($proxies)) {
            Assertion::maxLength($proxies, 32);
        }

        $this->proxies = $proxies;

        return $this;
    }

    /**
     * Get proxies
     *
     * @return string
     */
    public function getProxies()
    {
        return $this->proxies;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    protected function setType($type = null)
    {
        if (!is_null($type)) {
            Assertion::maxLength($type, 32);
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set subtype
     *
     * @param string $subtype
     *
     * @return self
     */
    protected function setSubtype($subtype = null)
    {
        if (!is_null($subtype)) {
            Assertion::maxLength($subtype, 64);
        }

        $this->subtype = $subtype;

        return $this;
    }

    /**
     * Get subtype
     *
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * Set calldate
     *
     * @param \DateTime $calldate
     *
     * @return self
     */
    protected function setCalldate($calldate)
    {
        Assertion::notNull($calldate);

        $this->calldate = $calldate;

        return $this;
    }

    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return self
     */
    protected function setDuration($duration = null)
    {
        if (!is_null($duration)) {
            if (!is_null($duration)) {
                Assertion::integerish($duration);
                Assertion::greaterOrEqualThan($duration, 0);
            }
        }

        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set aParty
     *
     * @param string $aParty
     *
     * @return self
     */
    protected function setAParty($aParty = null)
    {
        if (!is_null($aParty)) {
            Assertion::maxLength($aParty, 128);
        }

        $this->aParty = $aParty;

        return $this;
    }

    /**
     * Get aParty
     *
     * @return string
     */
    public function getAParty()
    {
        return $this->aParty;
    }

    /**
     * Set bParty
     *
     * @param string $bParty
     *
     * @return self
     */
    protected function setBParty($bParty = null)
    {
        if (!is_null($bParty)) {
            Assertion::maxLength($bParty, 128);
        }

        $this->bParty = $bParty;

        return $this;
    }

    /**
     * Get bParty
     *
     * @return string
     */
    public function getBParty()
    {
        return $this->bParty;
    }

    /**
     * Set caller
     *
     * @param string $caller
     *
     * @return self
     */
    protected function setCaller($caller = null)
    {
        if (!is_null($caller)) {
            Assertion::maxLength($caller, 128);
        }

        $this->caller = $caller;

        return $this;
    }

    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * Set callee
     *
     * @param string $callee
     *
     * @return self
     */
    protected function setCallee($callee = null)
    {
        if (!is_null($callee)) {
            Assertion::maxLength($callee, 128);
        }

        $this->callee = $callee;

        return $this;
    }

    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * Set xCaller
     *
     * @param string $xCaller
     *
     * @return self
     */
    protected function setXCaller($xCaller = null)
    {
        if (!is_null($xCaller)) {
            Assertion::maxLength($xCaller, 128);
        }

        $this->xCaller = $xCaller;

        return $this;
    }

    /**
     * Get xCaller
     *
     * @return string
     */
    public function getXCaller()
    {
        return $this->xCaller;
    }

    /**
     * Set xCallee
     *
     * @param string $xCallee
     *
     * @return self
     */
    protected function setXCallee($xCallee = null)
    {
        if (!is_null($xCallee)) {
            Assertion::maxLength($xCallee, 128);
        }

        $this->xCallee = $xCallee;

        return $this;
    }

    /**
     * Get xCallee
     *
     * @return string
     */
    public function getXCallee()
    {
        return $this->xCallee;
    }

    /**
     * Set initialReferrer
     *
     * @param string $initialReferrer
     *
     * @return self
     */
    protected function setInitialReferrer($initialReferrer = null)
    {
        if (!is_null($initialReferrer)) {
            Assertion::maxLength($initialReferrer, 128);
        }

        $this->initialReferrer = $initialReferrer;

        return $this;
    }

    /**
     * Get initialReferrer
     *
     * @return string
     */
    public function getInitialReferrer()
    {
        return $this->initialReferrer;
    }

    /**
     * Set referrer
     *
     * @param string $referrer
     *
     * @return self
     */
    protected function setReferrer($referrer = null)
    {
        if (!is_null($referrer)) {
            Assertion::maxLength($referrer, 128);
        }

        $this->referrer = $referrer;

        return $this;
    }

    /**
     * Get referrer
     *
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * Set referee
     *
     * @param string $referee
     *
     * @return self
     */
    protected function setReferee($referee = null)
    {
        if (!is_null($referee)) {
            Assertion::maxLength($referee, 128);
        }

        $this->referee = $referee;

        return $this;
    }

    /**
     * Get referee
     *
     * @return string
     */
    public function getReferee()
    {
        return $this->referee;
    }

    /**
     * Set lastForwarder
     *
     * @param string $lastForwarder
     *
     * @return self
     */
    protected function setLastForwarder($lastForwarder = null)
    {
        if (!is_null($lastForwarder)) {
            Assertion::maxLength($lastForwarder, 32);
        }

        $this->lastForwarder = $lastForwarder;

        return $this;
    }

    /**
     * Get lastForwarder
     *
     * @return string
     */
    public function getLastForwarder()
    {
        return $this->lastForwarder;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set peeringContract
     *
     * @param \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract
     *
     * @return self
     */
    protected function setPeeringContract(\Ivoz\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract = null)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * Get peeringContract
     *
     * @return \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }



    // @codeCoverageIgnoreEnd
}

