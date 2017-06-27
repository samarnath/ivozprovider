<?php

namespace Core\Domain\Model\ParsedCDR;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ParsedCDR
 */
class ParsedCDR extends ParsedCDRAbstract implements ParsedCDRInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

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

        $self = new self(
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'peeringContractId' => $this->getPeeringContract() ? $this->getPeeringContract()->getId() : null
        ];
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Core\Domain\Model\Company\CompanyInterface $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set peeringContract
     *
     * @param \Core\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract
     *
     * @return self
     */
    protected function setPeeringContract(\Core\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract = null)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * Get peeringContract
     *
     * @return \Core\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }


}

