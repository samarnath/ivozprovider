<?php

namespace Core\Domain\Model\ParsedCDR;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ParsedCDRDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $statId;

    /**
     * @var integer
     */
    private $xstatId;

    /**
     * @var string
     */
    private $statType;

    /**
     * @var string
     */
    private $initialLeg;

    /**
     * @var string
     */
    private $initialLegHash;

    /**
     * @var string
     */
    private $cid;

    /**
     * @var string
     */
    private $cidHash;

    /**
     * @var string
     */
    private $xcid;

    /**
     * @var string
     */
    private $xcidHash;

    /**
     * @var string
     */
    private $proxies;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @var \DateTime
     */
    private $calldate = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var string
     */
    private $aParty;

    /**
     * @var string
     */
    private $bParty;

    /**
     * @var string
     */
    private $caller;

    /**
     * @var string
     */
    private $callee;

    /**
     * @var string
     */
    private $xCaller;

    /**
     * @var string
     */
    private $xCallee;

    /**
     * @var string
     */
    private $initialReferrer;

    /**
     * @var string
     */
    private $referrer;

    /**
     * @var string
     */
    private $referee;

    /**
     * @var string
     */
    private $lastForwarder;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $peeringContractId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $peeringContract;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
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
            'brandId' => $this->getBrandId(),
            'companyId' => $this->getCompanyId(),
            'peeringContractId' => $this->getPeeringContractId()
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
            ->setStatId(isset($data['statId']) ? $data['statId'] : null)
            ->setXstatId(isset($data['xstatId']) ? $data['xstatId'] : null)
            ->setStatType(isset($data['statType']) ? $data['statType'] : null)
            ->setInitialLeg(isset($data['initialLeg']) ? $data['initialLeg'] : null)
            ->setInitialLegHash(isset($data['initialLegHash']) ? $data['initialLegHash'] : null)
            ->setCid(isset($data['cid']) ? $data['cid'] : null)
            ->setCidHash(isset($data['cidHash']) ? $data['cidHash'] : null)
            ->setXcid(isset($data['xcid']) ? $data['xcid'] : null)
            ->setXcidHash(isset($data['xcidHash']) ? $data['xcidHash'] : null)
            ->setProxies(isset($data['proxies']) ? $data['proxies'] : null)
            ->setType(isset($data['type']) ? $data['type'] : null)
            ->setSubtype(isset($data['subtype']) ? $data['subtype'] : null)
            ->setCalldate(isset($data['calldate']) ? $data['calldate'] : null)
            ->setDuration(isset($data['duration']) ? $data['duration'] : null)
            ->setAParty(isset($data['aParty']) ? $data['aParty'] : null)
            ->setBParty(isset($data['bParty']) ? $data['bParty'] : null)
            ->setCaller(isset($data['caller']) ? $data['caller'] : null)
            ->setCallee(isset($data['callee']) ? $data['callee'] : null)
            ->setXCaller(isset($data['xCaller']) ? $data['xCaller'] : null)
            ->setXCallee(isset($data['xCallee']) ? $data['xCallee'] : null)
            ->setInitialReferrer(isset($data['initialReferrer']) ? $data['initialReferrer'] : null)
            ->setReferrer(isset($data['referrer']) ? $data['referrer'] : null)
            ->setReferee(isset($data['referee']) ? $data['referee'] : null)
            ->setLastForwarder(isset($data['lastForwarder']) ? $data['lastForwarder'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setPeeringContractId(isset($data['peeringContractId']) ? $data['peeringContractId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\BrandInterface', $this->getBrandId());
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
        $this->peeringContract = $transformer->transform('Core\\Domain\\Model\\PeeringContract\\PeeringContractInterface', $this->getPeeringContractId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ParsedCDRDTO
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
     * @param integer $statId
     *
     * @return ParsedCDRDTO
     */
    public function setStatId($statId = null)
    {
        $this->statId = $statId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStatId()
    {
        return $this->statId;
    }

    /**
     * @param integer $xstatId
     *
     * @return ParsedCDRDTO
     */
    public function setXstatId($xstatId = null)
    {
        $this->xstatId = $xstatId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getXstatId()
    {
        return $this->xstatId;
    }

    /**
     * @param string $statType
     *
     * @return ParsedCDRDTO
     */
    public function setStatType($statType = null)
    {
        $this->statType = $statType;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatType()
    {
        return $this->statType;
    }

    /**
     * @param string $initialLeg
     *
     * @return ParsedCDRDTO
     */
    public function setInitialLeg($initialLeg = null)
    {
        $this->initialLeg = $initialLeg;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitialLeg()
    {
        return $this->initialLeg;
    }

    /**
     * @param string $initialLegHash
     *
     * @return ParsedCDRDTO
     */
    public function setInitialLegHash($initialLegHash = null)
    {
        $this->initialLegHash = $initialLegHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitialLegHash()
    {
        return $this->initialLegHash;
    }

    /**
     * @param string $cid
     *
     * @return ParsedCDRDTO
     */
    public function setCid($cid = null)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * @param string $cidHash
     *
     * @return ParsedCDRDTO
     */
    public function setCidHash($cidHash = null)
    {
        $this->cidHash = $cidHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getCidHash()
    {
        return $this->cidHash;
    }

    /**
     * @param string $xcid
     *
     * @return ParsedCDRDTO
     */
    public function setXcid($xcid = null)
    {
        $this->xcid = $xcid;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcid()
    {
        return $this->xcid;
    }

    /**
     * @param string $xcidHash
     *
     * @return ParsedCDRDTO
     */
    public function setXcidHash($xcidHash = null)
    {
        $this->xcidHash = $xcidHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcidHash()
    {
        return $this->xcidHash;
    }

    /**
     * @param string $proxies
     *
     * @return ParsedCDRDTO
     */
    public function setProxies($proxies = null)
    {
        $this->proxies = $proxies;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxies()
    {
        return $this->proxies;
    }

    /**
     * @param string $type
     *
     * @return ParsedCDRDTO
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $subtype
     *
     * @return ParsedCDRDTO
     */
    public function setSubtype($subtype = null)
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param \DateTime $calldate
     *
     * @return ParsedCDRDTO
     */
    public function setCalldate($calldate)
    {
        $this->calldate = $calldate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * @param integer $duration
     *
     * @return ParsedCDRDTO
     */
    public function setDuration($duration = null)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $aParty
     *
     * @return ParsedCDRDTO
     */
    public function setAParty($aParty = null)
    {
        $this->aParty = $aParty;

        return $this;
    }

    /**
     * @return string
     */
    public function getAParty()
    {
        return $this->aParty;
    }

    /**
     * @param string $bParty
     *
     * @return ParsedCDRDTO
     */
    public function setBParty($bParty = null)
    {
        $this->bParty = $bParty;

        return $this;
    }

    /**
     * @return string
     */
    public function getBParty()
    {
        return $this->bParty;
    }

    /**
     * @param string $caller
     *
     * @return ParsedCDRDTO
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
     * @return ParsedCDRDTO
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
     * @param string $xCaller
     *
     * @return ParsedCDRDTO
     */
    public function setXCaller($xCaller = null)
    {
        $this->xCaller = $xCaller;

        return $this;
    }

    /**
     * @return string
     */
    public function getXCaller()
    {
        return $this->xCaller;
    }

    /**
     * @param string $xCallee
     *
     * @return ParsedCDRDTO
     */
    public function setXCallee($xCallee = null)
    {
        $this->xCallee = $xCallee;

        return $this;
    }

    /**
     * @return string
     */
    public function getXCallee()
    {
        return $this->xCallee;
    }

    /**
     * @param string $initialReferrer
     *
     * @return ParsedCDRDTO
     */
    public function setInitialReferrer($initialReferrer = null)
    {
        $this->initialReferrer = $initialReferrer;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitialReferrer()
    {
        return $this->initialReferrer;
    }

    /**
     * @param string $referrer
     *
     * @return ParsedCDRDTO
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
     * @param string $referee
     *
     * @return ParsedCDRDTO
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
     * @param string $lastForwarder
     *
     * @return ParsedCDRDTO
     */
    public function setLastForwarder($lastForwarder = null)
    {
        $this->lastForwarder = $lastForwarder;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastForwarder()
    {
        return $this->lastForwarder;
    }

    /**
     * @param integer $brandId
     *
     * @return ParsedCDRDTO
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
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $companyId
     *
     * @return ParsedCDRDTO
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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return ParsedCDRDTO
     */
    public function setPeeringContractId($peeringContractId)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @return \Core\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }
}

