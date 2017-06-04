<?php

namespace Core\Model\Company;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Company
 */
class Company implements EntityInterface, CompanyInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @column domain_users
     * @var string
     */
    protected $domainUsers;

    /**
     * @var string
     */
    protected $nif;

    /**
     * @var integer
     */
    protected $externalMaxCalls = '0';

    /**
     * @var string
     */
    protected $postalAddress;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $town;

    /**
     * @var string
     */
    protected $province;

    /**
     * @var string
     */
    protected $country;

    /**
     * @column outbound_prefix
     * @var string
     */
    protected $outboundPrefix;

    /**
     * @var boolean
     */
    protected $ipfilter = '1';

    /**
     * @var boolean
     */
    protected $onDemandRecord = '0';

    /**
     * @var string
     */
    protected $onDemandRecordCode;

    /**
     * @var string
     */
    protected $areaCode;

    /**
     * @var string
     */
    protected $externallyExtraOpts;

    /**
     * @var integer
     */
    protected $recordingsLimitMB;

    /**
     * @var string
     */
    protected $recordingsLimitEmail;

    /**
     * @var \Core\Model\Brand\BrandInterfaceInterface
     */
    protected $brand;

    /**
     * @var \Core\Model\Language\Language
     */
    protected $language;

    /**
     * @var \Core\Model\MediaRelaySet\MediaRelaySet
     */
    protected $mediaRelaySets;

    /**
     * @var \Core\Model\Timezone\Timezone
     */
    protected $defaultTimezone;

    /**
     * @var \Core\Model\ApplicationServer\ApplicationServer
     */
    protected $applicationServer;

    /**
     * @var \Core\Model\Country\Country
     */
    protected $countryCode;

    /**
     * @var \Core\Model\DDI\DDI
     */
    protected $outgoingDDI;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $name,
        $domainUsers,
        $nif,
        $externalMaxCalls,
        $postalAddress,
        $postalCode,
        $town,
        $province,
        $country
    ) {
        $this->setName($name);
        $this->setDomainUsers($domainUsers);
        $this->setNif($nif);
        $this->setExternalMaxCalls($externalMaxCalls);
        $this->setPostalAddress($postalAddress);
        $this->setPostalCode($postalCode);
        $this->setTown($town);
        $this->setProvince($province);
        $this->setCountry($country);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return CompanyDTO
     */
    public static function createDTO()
    {
        return new CompanyDTO();
    }

    /**
     * Factory method
     * @param CompanyDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CompanyDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getDomainUsers(),
            $dto->getNif(),
            $dto->getExternalMaxCalls(),
            $dto->getPostalAddress(),
            $dto->getPostalCode(),
            $dto->getTown(),
            $dto->getProvince(),
            $dto->getCountry()
        );

        return $self
            ->setOutboundPrefix($dto->getOutboundPrefix())
            ->setIpfilter($dto->getIpfilter())
            ->setOnDemandRecord($dto->getOnDemandRecord())
            ->setOnDemandRecordCode($dto->getOnDemandRecordCode())
            ->setAreaCode($dto->getAreaCode())
            ->setExternallyExtraOpts($dto->getExternallyExtraOpts())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($dto->getRecordingsLimitEmail())
            ->setBrand($dto->getBrand())
            ->setLanguage($dto->getLanguage())
            ->setMediaRelaySets($dto->getMediaRelaySets())
            ->setDefaultTimezone($dto->getDefaultTimezone())
            ->setApplicationServer($dto->getApplicationServer())
            ->setCountryCode($dto->getCountryCode())
            ->setOutgoingDDI($dto->getOutgoingDDI());
    }

    /**
     * @param CompanyDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CompanyDTO::class);

        $this
            ->setName($dto->getName())
            ->setDomainUsers($dto->getDomainUsers())
            ->setNif($dto->getNif())
            ->setExternalMaxCalls($dto->getExternalMaxCalls())
            ->setPostalAddress($dto->getPostalAddress())
            ->setPostalCode($dto->getPostalCode())
            ->setTown($dto->getTown())
            ->setProvince($dto->getProvince())
            ->setCountry($dto->getCountry())
            ->setOutboundPrefix($dto->getOutboundPrefix())
            ->setIpfilter($dto->getIpfilter())
            ->setOnDemandRecord($dto->getOnDemandRecord())
            ->setOnDemandRecordCode($dto->getOnDemandRecordCode())
            ->setAreaCode($dto->getAreaCode())
            ->setExternallyExtraOpts($dto->getExternallyExtraOpts())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($dto->getRecordingsLimitEmail())
            ->setBrand($dto->getBrand())
            ->setLanguage($dto->getLanguage())
            ->setMediaRelaySets($dto->getMediaRelaySets())
            ->setDefaultTimezone($dto->getDefaultTimezone())
            ->setApplicationServer($dto->getApplicationServer())
            ->setCountryCode($dto->getCountryCode())
            ->setOutgoingDDI($dto->getOutgoingDDI());


        return $this;
    }

    /**
     * @return CompanyDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setDomainUsers($this->getDomainUsers())
            ->setNif($this->getNif())
            ->setExternalMaxCalls($this->getExternalMaxCalls())
            ->setPostalAddress($this->getPostalAddress())
            ->setPostalCode($this->getPostalCode())
            ->setTown($this->getTown())
            ->setProvince($this->getProvince())
            ->setCountry($this->getCountry())
            ->setOutboundPrefix($this->getOutboundPrefix())
            ->setIpfilter($this->getIpfilter())
            ->setOnDemandRecord($this->getOnDemandRecord())
            ->setOnDemandRecordCode($this->getOnDemandRecordCode())
            ->setAreaCode($this->getAreaCode())
            ->setExternallyExtraOpts($this->getExternallyExtraOpts())
            ->setRecordingsLimitMB($this->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($this->getRecordingsLimitEmail())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setLanguageId($this->getLanguage() ? $this->getLanguage()->getId() : null)
            ->setMediaRelaySetsId($this->getMediaRelaySets() ? $this->getMediaRelaySets()->getId() : null)
            ->setDefaultTimezoneId($this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null)
            ->setApplicationServerId($this->getApplicationServer() ? $this->getApplicationServer()->getId() : null)
            ->setCountryCodeId($this->getCountryCode() ? $this->getCountryCode()->getId() : null)
            ->setOutgoingDDIId($this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'domainUsers' => $this->getDomainUsers(),
            'nif' => $this->getNif(),
            'externalMaxCalls' => $this->getExternalMaxCalls(),
            'postalAddress' => $this->getPostalAddress(),
            'postalCode' => $this->getPostalCode(),
            'town' => $this->getTown(),
            'province' => $this->getProvince(),
            'country' => $this->getCountry(),
            'outboundPrefix' => $this->getOutboundPrefix(),
            'ipfilter' => $this->getIpfilter(),
            'onDemandRecord' => $this->getOnDemandRecord(),
            'onDemandRecordCode' => $this->getOnDemandRecordCode(),
            'areaCode' => $this->getAreaCode(),
            'externallyExtraOpts' => $this->getExternallyExtraOpts(),
            'recordingsLimitMB' => $this->getRecordingsLimitMB(),
            'recordingsLimitEmail' => $this->getRecordingsLimitEmail(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'mediaRelaySetsId' => $this->getMediaRelaySets() ? $this->getMediaRelaySets()->getId() : null,
            'defaultTimezoneId' => $this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null,
            'applicationServerId' => $this->getApplicationServer() ? $this->getApplicationServer()->getId() : null,
            'countryCodeId' => $this->getCountryCode() ? $this->getCountryCode()->getId() : null,
            'outgoingDDIId' => $this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

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
     * Set name
     *
     * @param string $name
     *
     * @return Company
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 80);

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set domainUsers
     *
     * @param string $domainUsers
     *
     * @return Company
     */
    protected function setDomainUsers($domainUsers)
    {
        Assertion::notNull($domainUsers);
        Assertion::maxLength($domainUsers, 190);

        $this->domainUsers = $domainUsers;

        return $this;
    }

    /**
     * Get domainUsers
     *
     * @return string
     */
    public function getDomainUsers()
    {
        return $this->domainUsers;
    }

    /**
     * Set nif
     *
     * @param string $nif
     *
     * @return Company
     */
    protected function setNif($nif)
    {
        Assertion::notNull($nif);
        Assertion::maxLength($nif, 25);

        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set externalMaxCalls
     *
     * @param integer $externalMaxCalls
     *
     * @return Company
     */
    protected function setExternalMaxCalls($externalMaxCalls)
    {
        Assertion::notNull($externalMaxCalls);
        Assertion::integerish($externalMaxCalls);
        Assertion::greaterOrEqualThan($externalMaxCalls, 0);

        $this->externalMaxCalls = $externalMaxCalls;

        return $this;
    }

    /**
     * Get externalMaxCalls
     *
     * @return integer
     */
    public function getExternalMaxCalls()
    {
        return $this->externalMaxCalls;
    }

    /**
     * Set postalAddress
     *
     * @param string $postalAddress
     *
     * @return Company
     */
    protected function setPostalAddress($postalAddress)
    {
        Assertion::notNull($postalAddress);
        Assertion::maxLength($postalAddress, 255);

        $this->postalAddress = $postalAddress;

        return $this;
    }

    /**
     * Get postalAddress
     *
     * @return string
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Company
     */
    protected function setPostalCode($postalCode)
    {
        Assertion::notNull($postalCode);
        Assertion::maxLength($postalCode, 10);

        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set town
     *
     * @param string $town
     *
     * @return Company
     */
    protected function setTown($town)
    {
        Assertion::notNull($town);
        Assertion::maxLength($town, 255);

        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Company
     */
    protected function setProvince($province)
    {
        Assertion::notNull($province);
        Assertion::maxLength($province, 255);

        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Company
     */
    protected function setCountry($country)
    {
        Assertion::notNull($country);
        Assertion::maxLength($country, 255);

        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set outboundPrefix
     *
     * @param string $outboundPrefix
     *
     * @return Company
     */
    protected function setOutboundPrefix($outboundPrefix = null)
    {
        if (!is_null($outboundPrefix)) {
            Assertion::maxLength($outboundPrefix, 255);
        }

        $this->outboundPrefix = $outboundPrefix;

        return $this;
    }

    /**
     * Get outboundPrefix
     *
     * @return string
     */
    public function getOutboundPrefix()
    {
        return $this->outboundPrefix;
    }

    /**
     * Set ipfilter
     *
     * @param boolean $ipfilter
     *
     * @return Company
     */
    protected function setIpfilter($ipfilter = null)
    {
        if (!is_null($ipfilter)) {
            Assertion::between(intval($ipfilter), 0, 1);
        }

        $this->ipfilter = $ipfilter;

        return $this;
    }

    /**
     * Get ipfilter
     *
     * @return boolean
     */
    public function getIpfilter()
    {
        return $this->ipfilter;
    }

    /**
     * Set onDemandRecord
     *
     * @param boolean $onDemandRecord
     *
     * @return Company
     */
    protected function setOnDemandRecord($onDemandRecord = null)
    {
        if (!is_null($onDemandRecord)) {
            Assertion::between(intval($onDemandRecord), 0, 1);
        }

        $this->onDemandRecord = $onDemandRecord;

        return $this;
    }

    /**
     * Get onDemandRecord
     *
     * @return boolean
     */
    public function getOnDemandRecord()
    {
        return $this->onDemandRecord;
    }

    /**
     * Set onDemandRecordCode
     *
     * @param string $onDemandRecordCode
     *
     * @return Company
     */
    protected function setOnDemandRecordCode($onDemandRecordCode = null)
    {
        if (!is_null($onDemandRecordCode)) {
            Assertion::maxLength($onDemandRecordCode, 3);
        }

        $this->onDemandRecordCode = $onDemandRecordCode;

        return $this;
    }

    /**
     * Get onDemandRecordCode
     *
     * @return string
     */
    public function getOnDemandRecordCode()
    {
        return $this->onDemandRecordCode;
    }

    /**
     * Set areaCode
     *
     * @param string $areaCode
     *
     * @return Company
     */
    protected function setAreaCode($areaCode = null)
    {
        if (!is_null($areaCode)) {
            Assertion::maxLength($areaCode, 10);
        }

        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * Get areaCode
     *
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * Set externallyExtraOpts
     *
     * @param string $externallyExtraOpts
     *
     * @return Company
     */
    protected function setExternallyExtraOpts($externallyExtraOpts = null)
    {
        if (!is_null($externallyExtraOpts)) {
            Assertion::maxLength($externallyExtraOpts, 255);
        }

        $this->externallyExtraOpts = $externallyExtraOpts;

        return $this;
    }

    /**
     * Get externallyExtraOpts
     *
     * @return string
     */
    public function getExternallyExtraOpts()
    {
        return $this->externallyExtraOpts;
    }

    /**
     * Set recordingsLimitMB
     *
     * @param integer $recordingsLimitMB
     *
     * @return Company
     */
    protected function setRecordingsLimitMB($recordingsLimitMB = null)
    {
        if (!is_null($recordingsLimitMB)) {
            if (!is_null($recordingsLimitMB)) {
                Assertion::integerish($recordingsLimitMB);
            }
        }

        $this->recordingsLimitMB = $recordingsLimitMB;

        return $this;
    }

    /**
     * Get recordingsLimitMB
     *
     * @return integer
     */
    public function getRecordingsLimitMB()
    {
        return $this->recordingsLimitMB;
    }

    /**
     * Set recordingsLimitEmail
     *
     * @param string $recordingsLimitEmail
     *
     * @return Company
     */
    protected function setRecordingsLimitEmail($recordingsLimitEmail = null)
    {
        if (!is_null($recordingsLimitEmail)) {
            Assertion::maxLength($recordingsLimitEmail, 250);
        }

        $this->recordingsLimitEmail = $recordingsLimitEmail;

        return $this;
    }

    /**
     * Get recordingsLimitEmail
     *
     * @return string
     */
    public function getRecordingsLimitEmail()
    {
        return $this->recordingsLimitEmail;
    }

    /**
     * Set brand
     *
     * @param \Core\Model\Brand\BrandInterfaceInterface $brand
     *
     * @return Company
     */
    protected function setBrand(\Core\Model\Brand\BrandInterfaceInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterfaceInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set language
     *
     * @param \Core\Model\Language\Language $language
     *
     * @return Company
     */
    protected function setLanguage(\Core\Model\Language\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Core\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set mediaRelaySets
     *
     * @param \Core\Model\MediaRelaySet\MediaRelaySet $mediaRelaySets
     *
     * @return Company
     */
    protected function setMediaRelaySets(\Core\Model\MediaRelaySet\MediaRelaySet $mediaRelaySets = null)
    {
        $this->mediaRelaySets = $mediaRelaySets;

        return $this;
    }

    /**
     * Get mediaRelaySets
     *
     * @return \Core\Model\MediaRelaySet\MediaRelaySet
     */
    public function getMediaRelaySets()
    {
        return $this->mediaRelaySets;
    }

    /**
     * Set defaultTimezone
     *
     * @param \Core\Model\Timezone\Timezone $defaultTimezone
     *
     * @return Company
     */
    protected function setDefaultTimezone(\Core\Model\Timezone\Timezone $defaultTimezone = null)
    {
        $this->defaultTimezone = $defaultTimezone;

        return $this;
    }

    /**
     * Get defaultTimezone
     *
     * @return \Core\Model\Timezone\Timezone
     */
    public function getDefaultTimezone()
    {
        return $this->defaultTimezone;
    }

    /**
     * Set applicationServer
     *
     * @param \Core\Model\ApplicationServer\ApplicationServer $applicationServer
     *
     * @return Company
     */
    protected function setApplicationServer(\Core\Model\ApplicationServer\ApplicationServer $applicationServer = null)
    {
        $this->applicationServer = $applicationServer;

        return $this;
    }

    /**
     * Get applicationServer
     *
     * @return \Core\Model\ApplicationServer\ApplicationServer
     */
    public function getApplicationServer()
    {
        return $this->applicationServer;
    }

    /**
     * Set countryCode
     *
     * @param \Core\Model\Country\Country $countryCode
     *
     * @return Company
     */
    protected function setCountryCode(\Core\Model\Country\Country $countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return \Core\Model\Country\Country
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set outgoingDDI
     *
     * @param \Core\Model\DDI\DDI $outgoingDDI
     *
     * @return Company
     */
    protected function setOutgoingDDI(\Core\Model\DDI\DDI $outgoingDDI = null)
    {
        $this->outgoingDDI = $outgoingDDI;

        return $this;
    }

    /**
     * Get outgoingDDI
     *
     * @return \Core\Model\DDI\DDI
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }



    // @codeCoverageIgnoreEnd
}

