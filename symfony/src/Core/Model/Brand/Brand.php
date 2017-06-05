<?php

namespace Core\Model\Brand;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Brand
 */
class Brand implements EntityInterface, BrandInterface
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
     * @var string
     */
    protected $nif;

    /**
     * @column domain_trunks
     * @var string
     */
    protected $domainTrunks;

    /**
     * @comment FSO
     * @var integer
     */
    protected $logoFileSize;

    /**
     * @var string
     */
    protected $logoMimeType;

    /**
     * @var string
     */
    protected $logoBaseName;

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
     * @var string
     */
    protected $registryData;

    /**
     * @var string
     */
    protected $fromName;

    /**
     * @var string
     */
    protected $fromAddress;

    /**
     * @var integer
     */
    protected $recordingsLimitMB;

    /**
     * @var string
     */
    protected $recordingslimitemail;

    /**
     * @var ArrayCollection
     */
    protected $operators;

    /**
     * @var ArrayCollection
     */
    protected $services;

    /**
     * @var ArrayCollection
     */
    protected $urls;

    /**
     * @var ArrayCollection
     */
    protected $relFeatures;

    /**
     * @var ArrayCollection
     */
    protected $domains;

    /**
     * @var \Core\Model\Language\LanguageInterface
     */
    protected $language;

    /**
     * @var \Core\Model\Timezone\TimezoneInterface
     */
    protected $defaultTimezone;


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
        $nif,
        $postalAddress,
        $postalCode,
        $town,
        $province,
        $country
    ) {
        $this->setName($name);
        $this->setNif($nif);
        $this->setPostalAddress($postalAddress);
        $this->setPostalCode($postalCode);
        $this->setTown($town);
        $this->setProvince($province);
        $this->setCountry($country);

        $this->operators = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->urls = new ArrayCollection();
        $this->relFeatures = new ArrayCollection();
        $this->domains = new ArrayCollection();
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return BrandDTO
     */
    public static function createDTO()
    {
        return new BrandDTO();
    }

    /**
     * Factory method
     * @param BrandDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, BrandDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getNif(),
            $dto->getPostalAddress(),
            $dto->getPostalCode(),
            $dto->getTown(),
            $dto->getProvince(),
            $dto->getCountry()
        );

        return $self
            ->setDomainTrunks($dto->getDomainTrunks())
            ->setLogoFileSize($dto->getLogoFileSize())
            ->setLogoMimeType($dto->getLogoMimeType())
            ->setLogoBaseName($dto->getLogoBaseName())
            ->setRegistryData($dto->getRegistryData())
            ->setFromName($dto->getFromName())
            ->setFromAddress($dto->getFromAddress())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingslimitemail($dto->getRecordingslimitemail())
            ->replaceOperators($dto->getOperators())
            ->replaceServices($dto->getServices())
            ->replaceUrls($dto->getUrls())
            ->replaceRelFeatures($dto->getRelFeatures())
            ->replaceDomains($dto->getDomains())
            ->setLanguage($dto->getLanguage())
            ->setDefaultTimezone($dto->getDefaultTimezone());
    }

    /**
     * @param BrandDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, BrandDTO::class);

        $this
            ->setName($dto->getName())
            ->setNif($dto->getNif())
            ->setDomainTrunks($dto->getDomainTrunks())
            ->setLogoFileSize($dto->getLogoFileSize())
            ->setLogoMimeType($dto->getLogoMimeType())
            ->setLogoBaseName($dto->getLogoBaseName())
            ->setPostalAddress($dto->getPostalAddress())
            ->setPostalCode($dto->getPostalCode())
            ->setTown($dto->getTown())
            ->setProvince($dto->getProvince())
            ->setCountry($dto->getCountry())
            ->setRegistryData($dto->getRegistryData())
            ->setFromName($dto->getFromName())
            ->setFromAddress($dto->getFromAddress())
            ->setRecordingsLimitMB($dto->getRecordingsLimitMB())
            ->setRecordingslimitemail($dto->getRecordingslimitemail())
            ->replaceOperators($dto->getOperators())
            ->replaceServices($dto->getServices())
            ->replaceUrls($dto->getUrls())
            ->replaceRelFeatures($dto->getRelFeatures())
            ->replaceDomains($dto->getDomains())
            ->setLanguage($dto->getLanguage())
            ->setDefaultTimezone($dto->getDefaultTimezone());


        return $this;
    }

    /**
     * @return BrandDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setNif($this->getNif())
            ->setDomainTrunks($this->getDomainTrunks())
            ->setLogoFileSize($this->getLogoFileSize())
            ->setLogoMimeType($this->getLogoMimeType())
            ->setLogoBaseName($this->getLogoBaseName())
            ->setPostalAddress($this->getPostalAddress())
            ->setPostalCode($this->getPostalCode())
            ->setTown($this->getTown())
            ->setProvince($this->getProvince())
            ->setCountry($this->getCountry())
            ->setRegistryData($this->getRegistryData())
            ->setFromName($this->getFromName())
            ->setFromAddress($this->getFromAddress())
            ->setRecordingsLimitMB($this->getRecordingsLimitMB())
            ->setRecordingslimitemail($this->getRecordingslimitemail())
            ->setOperators($this->getOperators())
            ->setServices($this->getServices())
            ->setUrls($this->getUrls())
            ->setRelFeatures($this->getRelFeatures())
            ->setDomains($this->getDomains())
            ->setLanguageId($this->getLanguage() ? $this->getLanguage()->getId() : null)
            ->setDefaultTimezoneId($this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'nif' => $this->getNif(),
            'domainTrunks' => $this->getDomainTrunks(),
            'logoFileSize' => $this->getLogoFileSize(),
            'logoMimeType' => $this->getLogoMimeType(),
            'logoBaseName' => $this->getLogoBaseName(),
            'postalAddress' => $this->getPostalAddress(),
            'postalCode' => $this->getPostalCode(),
            'town' => $this->getTown(),
            'province' => $this->getProvince(),
            'country' => $this->getCountry(),
            'registryData' => $this->getRegistryData(),
            'fromName' => $this->getFromName(),
            'fromAddress' => $this->getFromAddress(),
            'recordingsLimitMB' => $this->getRecordingsLimitMB(),
            'recordingslimitemail' => $this->getRecordingslimitemail(),
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'defaultTimezoneId' => $this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null
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
     * @return Brand
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 75);

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
     * Set nif
     *
     * @param string $nif
     *
     * @return Brand
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
     * Set domainTrunks
     *
     * @param string $domainTrunks
     *
     * @return Brand
     */
    protected function setDomainTrunks($domainTrunks = null)
    {
        if (!is_null($domainTrunks)) {
            Assertion::maxLength($domainTrunks, 255);
        }

        $this->domainTrunks = $domainTrunks;

        return $this;
    }

    /**
     * Get domainTrunks
     *
     * @return string
     */
    public function getDomainTrunks()
    {
        return $this->domainTrunks;
    }

    /**
     * Set logoFileSize
     *
     * @param integer $logoFileSize
     *
     * @return Brand
     */
    protected function setLogoFileSize($logoFileSize = null)
    {
        if (!is_null($logoFileSize)) {
            if (!is_null($logoFileSize)) {
                Assertion::integerish($logoFileSize);
                Assertion::greaterOrEqualThan($logoFileSize, 0);
            }
        }

        $this->logoFileSize = $logoFileSize;

        return $this;
    }

    /**
     * Get logoFileSize
     *
     * @return integer
     */
    public function getLogoFileSize()
    {
        return $this->logoFileSize;
    }

    /**
     * Set logoMimeType
     *
     * @param string $logoMimeType
     *
     * @return Brand
     */
    protected function setLogoMimeType($logoMimeType = null)
    {
        if (!is_null($logoMimeType)) {
            Assertion::maxLength($logoMimeType, 80);
        }

        $this->logoMimeType = $logoMimeType;

        return $this;
    }

    /**
     * Get logoMimeType
     *
     * @return string
     */
    public function getLogoMimeType()
    {
        return $this->logoMimeType;
    }

    /**
     * Set logoBaseName
     *
     * @param string $logoBaseName
     *
     * @return Brand
     */
    protected function setLogoBaseName($logoBaseName = null)
    {
        if (!is_null($logoBaseName)) {
            Assertion::maxLength($logoBaseName, 255);
        }

        $this->logoBaseName = $logoBaseName;

        return $this;
    }

    /**
     * Get logoBaseName
     *
     * @return string
     */
    public function getLogoBaseName()
    {
        return $this->logoBaseName;
    }

    /**
     * Set postalAddress
     *
     * @param string $postalAddress
     *
     * @return Brand
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
     * @return Brand
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
     * @return Brand
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
     * @return Brand
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
     * @return Brand
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
     * Set registryData
     *
     * @param string $registryData
     *
     * @return Brand
     */
    protected function setRegistryData($registryData = null)
    {
        if (!is_null($registryData)) {
            Assertion::maxLength($registryData, 1024);
        }

        $this->registryData = $registryData;

        return $this;
    }

    /**
     * Get registryData
     *
     * @return string
     */
    public function getRegistryData()
    {
        return $this->registryData;
    }

    /**
     * Set fromName
     *
     * @param string $fromName
     *
     * @return Brand
     */
    protected function setFromName($fromName = null)
    {
        if (!is_null($fromName)) {
            Assertion::maxLength($fromName, 255);
        }

        $this->fromName = $fromName;

        return $this;
    }

    /**
     * Get fromName
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Set fromAddress
     *
     * @param string $fromAddress
     *
     * @return Brand
     */
    protected function setFromAddress($fromAddress = null)
    {
        if (!is_null($fromAddress)) {
            Assertion::maxLength($fromAddress, 255);
        }

        $this->fromAddress = $fromAddress;

        return $this;
    }

    /**
     * Get fromAddress
     *
     * @return string
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * Set recordingsLimitMB
     *
     * @param integer $recordingsLimitMB
     *
     * @return Brand
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
     * Set recordingslimitemail
     *
     * @param string $recordingslimitemail
     *
     * @return Brand
     */
    protected function setRecordingslimitemail($recordingslimitemail = null)
    {
        if (!is_null($recordingslimitemail)) {
            Assertion::maxLength($recordingslimitemail, 250);
        }

        $this->recordingslimitemail = $recordingslimitemail;

        return $this;
    }

    /**
     * Get recordingslimitemail
     *
     * @return string
     */
    public function getRecordingslimitemail()
    {
        return $this->recordingslimitemail;
    }

    /**
     * Add operator
     *
     * @param \Core\Model\BrandOperator\BrandOperatorInterface $operator
     *
     * @return Brand
     */
    protected function addOperator(\Core\Model\BrandOperator\BrandOperatorInterface $operator)
    {
        $this->operators[] = $operator;

        return $this;
    }

    /**
     * Remove operator
     *
     * @param \Core\Model\BrandOperator\BrandOperatorInterface $operator
     */
    protected function removeOperator(\Core\Model\BrandOperator\BrandOperatorInterface $operator)
    {
        $this->operators->removeElement($operator);
    }

    /**
     * Replace operators
     *
     * @param \IteratorAggregate $operators
     * @return Brand
     */
    protected function replaceOperators(\IteratorAggregate $operators)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($operators as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setBrand($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->operators as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->operators->remove($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->operators->add($entity);
        }

        return $this;
    }

    /**
     * Get operators
     *
     * @return ArrayCollection
     */
    public function getOperators(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->operators->matching($criteria);
        }

        return $this->operators;
    }

    /**
     * Add service
     *
     * @param \Core\Model\BrandService\BrandServiceInterface $service
     *
     * @return Brand
     */
    protected function addService(\Core\Model\BrandService\BrandServiceInterface $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \Core\Model\BrandService\BrandServiceInterface $service
     */
    protected function removeService(\Core\Model\BrandService\BrandServiceInterface $service)
    {
        $this->services->removeElement($service);
    }

    /**
     * Replace services
     *
     * @param \IteratorAggregate $services
     * @return Brand
     */
    protected function replaceServices(\IteratorAggregate $services)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($services as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setBrand($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->services as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->services->remove($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->services->add($entity);
        }

        return $this;
    }

    /**
     * Get services
     *
     * @return ArrayCollection
     */
    public function getServices(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->services->matching($criteria);
        }

        return $this->services;
    }

    /**
     * Add url
     *
     * @param \Core\Model\BrandURL\BrandURLInterface $url
     *
     * @return Brand
     */
    protected function addUrl(\Core\Model\BrandURL\BrandURLInterface $url)
    {
        $this->urls[] = $url;

        return $this;
    }

    /**
     * Remove url
     *
     * @param \Core\Model\BrandURL\BrandURLInterface $url
     */
    protected function removeUrl(\Core\Model\BrandURL\BrandURLInterface $url)
    {
        $this->urls->removeElement($url);
    }

    /**
     * Replace urls
     *
     * @param \IteratorAggregate $urls
     * @return Brand
     */
    protected function replaceUrls(\IteratorAggregate $urls)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($urls as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setBrand($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->urls as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->urls->remove($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->urls->add($entity);
        }

        return $this;
    }

    /**
     * Get urls
     *
     * @return ArrayCollection
     */
    public function getUrls(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->urls->matching($criteria);
        }

        return $this->urls;
    }

    /**
     * Add relFeature
     *
     * @param \Core\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature
     *
     * @return Brand
     */
    protected function addRelFeature(\Core\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature)
    {
        $this->relFeatures[] = $relFeature;

        return $this;
    }

    /**
     * Remove relFeature
     *
     * @param \Core\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature
     */
    protected function removeRelFeature(\Core\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature)
    {
        $this->relFeatures->removeElement($relFeature);
    }

    /**
     * Replace relFeatures
     *
     * @param \IteratorAggregate $relFeatures
     * @return Brand
     */
    protected function replaceRelFeatures(\IteratorAggregate $relFeatures)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($relFeatures as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setBrand($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->relFeatures as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->relFeatures->remove($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->relFeatures->add($entity);
        }

        return $this;
    }

    /**
     * Get relFeatures
     *
     * @return ArrayCollection
     */
    public function getRelFeatures(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->relFeatures->matching($criteria);
        }

        return $this->relFeatures;
    }

    /**
     * Add domain
     *
     * @param \Core\Model\Domain\DomainInterface $domain
     *
     * @return Brand
     */
    protected function addDomain(\Core\Model\Domain\DomainInterface $domain)
    {
        $this->domains[] = $domain;

        return $this;
    }

    /**
     * Remove domain
     *
     * @param \Core\Model\Domain\DomainInterface $domain
     */
    protected function removeDomain(\Core\Model\Domain\DomainInterface $domain)
    {
        $this->domains->removeElement($domain);
    }

    /**
     * Replace domains
     *
     * @param \IteratorAggregate $domains
     * @return Brand
     */
    protected function replaceDomains(\IteratorAggregate $domains)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($domains as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setBrand($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->domains as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPatterns[$key] = $updatedEntities[$identity];
            } else {
                $this->domains->remove($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->domains->add($entity);
        }

        return $this;
    }

    /**
     * Get domains
     *
     * @return ArrayCollection
     */
    public function getDomains(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->domains->matching($criteria);
        }

        return $this->domains;
    }

    /**
     * Set language
     *
     * @param \Core\Model\Language\LanguageInterface $language
     *
     * @return Brand
     */
    protected function setLanguage(\Core\Model\Language\LanguageInterface $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Core\Model\Language\LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set defaultTimezone
     *
     * @param \Core\Model\Timezone\TimezoneInterface $defaultTimezone
     *
     * @return Brand
     */
    protected function setDefaultTimezone(\Core\Model\Timezone\TimezoneInterface $defaultTimezone = null)
    {
        $this->defaultTimezone = $defaultTimezone;

        return $this;
    }

    /**
     * Get defaultTimezone
     *
     * @return \Core\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone()
    {
        return $this->defaultTimezone;
    }



    // @codeCoverageIgnoreEnd
}

