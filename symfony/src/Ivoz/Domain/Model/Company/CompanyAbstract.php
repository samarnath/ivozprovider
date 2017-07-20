<?php

namespace Ivoz\Domain\Model\Company;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CompanyAbstract
 */
abstract class CompanyAbstract
{
    /**
     * @comment enum:vpbx|retail
     * @var string
     */
    protected $type = 'vpbx';

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
    protected $externallyextraopts;

    /**
     * @var integer
     */
    protected $recordingsLimitMB;

    /**
     * @var string
     */
    protected $recordingsLimitEmail;

    /**
     * @var \Ivoz\Domain\Model\Language\LanguageInterface
     */
    protected $language;

    /**
     * @var \Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    protected $mediaRelaySets;

    /**
     * @var \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    protected $defaultTimezone;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface
     */
    protected $applicationServer;

    /**
     * @var \Ivoz\Domain\Model\Country\CountryInterface
     */
    protected $countryCode;

    /**
     * @var \Ivoz\Domain\Model\DDI\DDIInterface
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
        $type,
        $name,
        $nif,
        $externalMaxCalls,
        $postalAddress,
        $postalCode,
        $town,
        $province,
        $country
    ) {
        $this->setType($type);
        $this->setName($name);
        $this->setNif($nif);
        $this->setExternalMaxCalls($externalMaxCalls);
        $this->setPostalAddress($postalAddress);
        $this->setPostalCode($postalCode);
        $this->setTown($town);
        $this->setProvince($province);
        $this->setCountry($country);
    }

    abstract public function __wakeup();

    /**
     * @return CompanyDTO
     */
    public static function createDTO()
    {
        return new CompanyDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CompanyDTO
         */
        Assertion::isInstanceOf($dto, CompanyDTO::class);

        $self = new static(
            $dto->getType(),
            $dto->getName(),
            $dto->getNif(),
            $dto->getExternalMaxCalls(),
            $dto->getPostalAddress(),
            $dto->getPostalCode(),
            $dto->getTown(),
            $dto->getProvince(),
            $dto->getCountry());

        return $self
            ->setDomainUsers($dto->getDomainUsers())
            ->setOutboundPrefix($dto->getOutboundPrefix())
            ->setIpfilter($dto->getIpfilter())
            ->setOnDemandRecord($dto->getOnDemandRecord())
            ->setOnDemandRecordCode($dto->getOnDemandRecordCode())
            ->setAreaCode($dto->getAreaCode())
            ->setExternallyextraopts($dto->getExternallyextraopts())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($dto->getRecordingsLimitEmail())
            ->setLanguage($dto->getLanguage())
            ->setMediaRelaySets($dto->getMediaRelaySets())
            ->setDefaultTimezone($dto->getDefaultTimezone())
            ->setBrand($dto->getBrand())
            ->setApplicationServer($dto->getApplicationServer())
            ->setCountryCode($dto->getCountryCode())
            ->setOutgoingDDI($dto->getOutgoingDDI())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CompanyDTO
         */
        Assertion::isInstanceOf($dto, CompanyDTO::class);

        $this
            ->setType($dto->getType())
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
            ->setExternallyextraopts($dto->getExternallyextraopts())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($dto->getRecordingsLimitEmail())
            ->setLanguage($dto->getLanguage())
            ->setMediaRelaySets($dto->getMediaRelaySets())
            ->setDefaultTimezone($dto->getDefaultTimezone())
            ->setBrand($dto->getBrand())
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
            ->setType($this->getType())
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
            ->setExternallyextraopts($this->getExternallyextraopts())
            ->setRecordingsLimitMB($this->getRecordingsLimitMB())
            ->setRecordingsLimitEmail($this->getRecordingsLimitEmail())
            ->setLanguageId($this->getLanguage() ? $this->getLanguage()->getId() : null)
            ->setMediaRelaySetsId($this->getMediaRelaySets() ? $this->getMediaRelaySets()->getId() : null)
            ->setDefaultTimezoneId($this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
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
            'type' => $this->getType(),
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
            'externallyextraopts' => $this->getExternallyextraopts(),
            'recordingsLimitMB' => $this->getRecordingsLimitMB(),
            'recordingsLimitEmail' => $this->getRecordingsLimitEmail(),
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'mediaRelaySetsId' => $this->getMediaRelaySets() ? $this->getMediaRelaySets()->getId() : null,
            'defaultTimezoneId' => $this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'applicationServerId' => $this->getApplicationServer() ? $this->getApplicationServer()->getId() : null,
            'countryCodeId' => $this->getCountryCode() ? $this->getCountryCode()->getId() : null,
            'outgoingDDIId' => $this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    protected function setType($type)
    {
        Assertion::notNull($type);
        Assertion::maxLength($type, 25);
        Assertion::choice($type, array (
          0 => 'vpbx',
          1 => 'retail',
        ));

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
     * Set name
     *
     * @param string $name
     *
     * @return self
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
     * @return self
     */
    protected function setDomainUsers($domainUsers = null)
    {
        if (!is_null($domainUsers)) {
            Assertion::maxLength($domainUsers, 190);
        }

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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * Set externallyextraopts
     *
     * @param string $externallyextraopts
     *
     * @return self
     */
    protected function setExternallyextraopts($externallyextraopts = null)
    {
        if (!is_null($externallyextraopts)) {
            Assertion::maxLength($externallyextraopts, 65535);
        }

        $this->externallyextraopts = $externallyextraopts;

        return $this;
    }

    /**
     * Get externallyextraopts
     *
     * @return string
     */
    public function getExternallyextraopts()
    {
        return $this->externallyextraopts;
    }

    /**
     * Set recordingsLimitMB
     *
     * @param integer $recordingsLimitMB
     *
     * @return self
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
     * @return self
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
     * Set language
     *
     * @param \Ivoz\Domain\Model\Language\LanguageInterface $language
     *
     * @return self
     */
    protected function setLanguage(\Ivoz\Domain\Model\Language\LanguageInterface $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Ivoz\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set mediaRelaySets
     *
     * @param \Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySets
     *
     * @return self
     */
    protected function setMediaRelaySets(\Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySets = null)
    {
        $this->mediaRelaySets = $mediaRelaySets;

        return $this;
    }

    /**
     * Get mediaRelaySets
     *
     * @return \Ivoz\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    public function getMediaRelaySets()
    {
        return $this->mediaRelaySets;
    }

    /**
     * Set defaultTimezone
     *
     * @param \Ivoz\Domain\Model\Timezone\TimezoneInterface $defaultTimezone
     *
     * @return self
     */
    protected function setDefaultTimezone(\Ivoz\Domain\Model\Timezone\TimezoneInterface $defaultTimezone = null)
    {
        $this->defaultTimezone = $defaultTimezone;

        return $this;
    }

    /**
     * Get defaultTimezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone()
    {
        return $this->defaultTimezone;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null)
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
     * Set applicationServer
     *
     * @param \Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface $applicationServer
     *
     * @return self
     */
    protected function setApplicationServer(\Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface $applicationServer = null)
    {
        $this->applicationServer = $applicationServer;

        return $this;
    }

    /**
     * Get applicationServer
     *
     * @return \Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface
     */
    public function getApplicationServer()
    {
        return $this->applicationServer;
    }

    /**
     * Set countryCode
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $countryCode
     *
     * @return self
     */
    protected function setCountryCode(\Ivoz\Domain\Model\Country\CountryInterface $countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set outgoingDDI
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI
     *
     * @return self
     */
    protected function setOutgoingDDI(\Ivoz\Domain\Model\DDI\DDIInterface $outgoingDDI = null)
    {
        $this->outgoingDDI = $outgoingDDI;

        return $this;
    }

    /**
     * Get outgoingDDI
     *
     * @return \Ivoz\Domain\Model\DDI\DDIInterface
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }



    // @codeCoverageIgnoreEnd
}

