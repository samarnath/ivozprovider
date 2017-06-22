<?php

namespace Core\Domain\Model\Brand;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class BrandDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nif;

    /**
     * @column domain_users
     * @var string
     */
    private $domainUsers;

    /**
     * @var integer
     */
    private $logoFileSize;

    /**
     * @var string
     */
    private $logoMimeType;

    /**
     * @var string
     */
    private $logoBaseName;

    /**
     * @var string
     */
    private $postalAddress;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $town;

    /**
     * @var string
     */
    private $province;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $registryData;

    /**
     * @var string
     */
    private $fromName;

    /**
     * @var string
     */
    private $fromAddress;

    /**
     * @var integer
     */
    private $recordingsLimitMB;

    /**
     * @var string
     */
    private $recordingslimitemail;

    /**
     * @var mixed
     */
    private $languageId;

    /**
     * @var mixed
     */
    private $defaultTimezoneId;

    /**
     * @var array|null
     */
    private $operators = null;

    /**
     * @var array|null
     */
    private $services = null;

    /**
     * @var array|null
     */
    private $urls = null;

    /**
     * @var array|null
     */
    private $relFeatures = null;

    /**
     * @var array|null
     */
    private $domains = null;

    /**
     * @var mixed
     */
    private $language;

    /**
     * @var mixed
     */
    private $defaultTimezone;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'nif' => $this->getNif(),
            'domainUsers' => $this->getDomainUsers(),
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
            'operatorsId' => $this->getOperatorsId(),
            'servicesId' => $this->getServicesId(),
            'urlsId' => $this->getUrlsId(),
            'relFeaturesId' => $this->getRelFeaturesId(),
            'domainsId' => $this->getDomainsId(),
            'languageId' => $this->getLanguageId(),
            'defaultTimezoneId' => $this->getDefaultTimezoneId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setNif(isset($data['nif']) ? $data['nif'] : null)
            ->setDomainUsers(isset($data['domainUsers']) ? $data['domainUsers'] : null)
            ->setLogoFileSize(isset($data['logoFileSize']) ? $data['logoFileSize'] : null)
            ->setLogoMimeType(isset($data['logoMimeType']) ? $data['logoMimeType'] : null)
            ->setLogoBaseName(isset($data['logoBaseName']) ? $data['logoBaseName'] : null)
            ->setPostalAddress(isset($data['postalAddress']) ? $data['postalAddress'] : null)
            ->setPostalCode(isset($data['postalCode']) ? $data['postalCode'] : null)
            ->setTown(isset($data['town']) ? $data['town'] : null)
            ->setProvince(isset($data['province']) ? $data['province'] : null)
            ->setCountry(isset($data['country']) ? $data['country'] : null)
            ->setRegistryData(isset($data['registryData']) ? $data['registryData'] : null)
            ->setFromName(isset($data['fromName']) ? $data['fromName'] : null)
            ->setFromAddress(isset($data['fromAddress']) ? $data['fromAddress'] : null)
            ->setRecordingsLimitMB(isset($data['recordingsLimitMB']) ? $data['recordingsLimitMB'] : null)
            ->setRecordingslimitemail(isset($data['recordingslimitemail']) ? $data['recordingslimitemail'] : null)
            ->setOperators(isset($data['operators']) ? $data['operators'] : null)
            ->setServices(isset($data['services']) ? $data['services'] : null)
            ->setUrls(isset($data['urls']) ? $data['urls'] : null)
            ->setRelFeatures(isset($data['relFeatures']) ? $data['relFeatures'] : null)
            ->setDomains(isset($data['domains']) ? $data['domains'] : null)
            ->setLanguageId(isset($data['languageId']) ? $data['languageId'] : null)
            ->setDefaultTimezoneId(isset($data['defaultTimezoneId']) ? $data['defaultTimezoneId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $items = $this->getOperators();
        $this->operators = [];
        foreach ($items as $item) {
            $this->operators[] = $transformer->tranform(
                'Core\\Domain\\Model\\BrandOperator\\BrandOperatorInterface',
                $item
            );
        }

        $items = $this->getServices();
        $this->services = [];
        foreach ($items as $item) {
            $this->services[] = $transformer->tranform(
                'Core\\Domain\\Model\\BrandService\\BrandServiceInterface',
                $item
            );
        }

        $items = $this->getUrls();
        $this->urls = [];
        foreach ($items as $item) {
            $this->urls[] = $transformer->tranform(
                'Core\\Domain\\Model\\BrandURL\\BrandURLInterface',
                $item
            );
        }

        $items = $this->getRelFeatures();
        $this->relFeatures = [];
        foreach ($items as $item) {
            $this->relFeatures[] = $transformer->tranform(
                'Core\\Domain\\Model\\FeaturesRelBrand\\FeaturesRelBrandInterface',
                $item
            );
        }

        $items = $this->getDomains();
        $this->domains = [];
        foreach ($items as $item) {
            $this->domains[] = $transformer->tranform(
                'Core\\Domain\\Model\\Domain\\DomainInterface',
                $item
            );
        }

        $this->language = $transformer->transform('Core\\Domain\\Model\\Language\\LanguageInterface', $this->getLanguageId());
        $this->defaultTimezone = $transformer->transform('Core\\Domain\\Model\\Timezone\\TimezoneInterface', $this->getDefaultTimezoneId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->operators = $transformer->transform(
            'Core\\Domain\\Model\\BrandOperator\\BrandOperatorInterface',
            $this->operators
        );
        $this->services = $transformer->transform(
            'Core\\Domain\\Model\\BrandService\\BrandServiceInterface',
            $this->services
        );
        $this->urls = $transformer->transform(
            'Core\\Domain\\Model\\BrandURL\\BrandURLInterface',
            $this->urls
        );
        $this->relFeatures = $transformer->transform(
            'Core\\Domain\\Model\\FeaturesRelBrand\\FeaturesRelBrandInterface',
            $this->relFeatures
        );
        $this->domains = $transformer->transform(
            'Core\\Domain\\Model\\Domain\\DomainInterface',
            $this->domains
        );
    }

    /**
     * @param integer $id
     *
     * @return BrandDTO
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
     * @param string $name
     *
     * @return BrandDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $nif
     *
     * @return BrandDTO
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param string $domainUsers
     *
     * @return BrandDTO
     */
    public function setDomainUsers($domainUsers = null)
    {
        $this->domainUsers = $domainUsers;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomainUsers()
    {
        return $this->domainUsers;
    }

    /**
     * @param integer $logoFileSize
     *
     * @return BrandDTO
     */
    public function setLogoFileSize($logoFileSize = null)
    {
        $this->logoFileSize = $logoFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLogoFileSize()
    {
        return $this->logoFileSize;
    }

    /**
     * @param string $logoMimeType
     *
     * @return BrandDTO
     */
    public function setLogoMimeType($logoMimeType = null)
    {
        $this->logoMimeType = $logoMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoMimeType()
    {
        return $this->logoMimeType;
    }

    /**
     * @param string $logoBaseName
     *
     * @return BrandDTO
     */
    public function setLogoBaseName($logoBaseName = null)
    {
        $this->logoBaseName = $logoBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoBaseName()
    {
        return $this->logoBaseName;
    }

    /**
     * @param string $postalAddress
     *
     * @return BrandDTO
     */
    public function setPostalAddress($postalAddress)
    {
        $this->postalAddress = $postalAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * @param string $postalCode
     *
     * @return BrandDTO
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $town
     *
     * @return BrandDTO
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param string $province
     *
     * @return BrandDTO
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $country
     *
     * @return BrandDTO
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $registryData
     *
     * @return BrandDTO
     */
    public function setRegistryData($registryData = null)
    {
        $this->registryData = $registryData;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegistryData()
    {
        return $this->registryData;
    }

    /**
     * @param string $fromName
     *
     * @return BrandDTO
     */
    public function setFromName($fromName = null)
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param string $fromAddress
     *
     * @return BrandDTO
     */
    public function setFromAddress($fromAddress = null)
    {
        $this->fromAddress = $fromAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * @param integer $recordingsLimitMB
     *
     * @return BrandDTO
     */
    public function setRecordingsLimitMB($recordingsLimitMB = null)
    {
        $this->recordingsLimitMB = $recordingsLimitMB;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRecordingsLimitMB()
    {
        return $this->recordingsLimitMB;
    }

    /**
     * @param string $recordingslimitemail
     *
     * @return BrandDTO
     */
    public function setRecordingslimitemail($recordingslimitemail = null)
    {
        $this->recordingslimitemail = $recordingslimitemail;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordingslimitemail()
    {
        return $this->recordingslimitemail;
    }

    /**
     * @param array $operators
     *
     * @return BrandDTO
     */
    public function setOperators($operators)
    {
        $this->operators = $operators;

        return $this;
    }

    /**
     * @return array
     */
    public function getOperators()
    {
        return $this->operators;
    }

    /**
     * @param array $services
     *
     * @return BrandDTO
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param array $urls
     *
     * @return BrandDTO
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @param array $relFeatures
     *
     * @return BrandDTO
     */
    public function setRelFeatures($relFeatures)
    {
        $this->relFeatures = $relFeatures;

        return $this;
    }

    /**
     * @return array
     */
    public function getRelFeatures()
    {
        return $this->relFeatures;
    }

    /**
     * @param array $domains
     *
     * @return BrandDTO
     */
    public function setDomains($domains)
    {
        $this->domains = $domains;

        return $this;
    }

    /**
     * @return array
     */
    public function getDomains()
    {
        return $this->domains;
    }

    /**
     * @param integer $languageId
     *
     * @return BrandDTO
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param integer $defaultTimezoneId
     *
     * @return BrandDTO
     */
    public function setDefaultTimezoneId($defaultTimezoneId)
    {
        $this->defaultTimezoneId = $defaultTimezoneId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDefaultTimezoneId()
    {
        return $this->defaultTimezoneId;
    }

    /**
     * @return \Core\Domain\Model\Timezone\TimezoneInterface
     */
    public function getDefaultTimezone()
    {
        return $this->defaultTimezone;
    }
}

