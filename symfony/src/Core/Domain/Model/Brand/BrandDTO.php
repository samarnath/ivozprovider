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
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $nif;

    /**
     * @column domain_trunks
     * @var string
     */
    public $domainTrunks;

    /**
     * @var integer
     */
    public $logoFileSize;

    /**
     * @var string
     */
    public $logoMimeType;

    /**
     * @var string
     */
    public $logoBaseName;

    /**
     * @var string
     */
    public $postalAddress;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $town;

    /**
     * @var string
     */
    public $province;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $registryData;

    /**
     * @var string
     */
    public $fromName;

    /**
     * @var string
     */
    public $fromAddress;

    /**
     * @var integer
     */
    public $recordingsLimitMB;

    /**
     * @var string
     */
    public $recordingslimitemail;

    /**
     * @var mixed
     */
    public $languageId;

    /**
     * @var mixed
     */
    public $defaultTimezoneId;

    /**
     * @var array|null
     */
    public $operators = null;

    /**
     * @var array|null
     */
    public $services = null;

    /**
     * @var array|null
     */
    public $urls = null;

    /**
     * @var array|null
     */
    public $relFeatures = null;

    /**
     * @var array|null
     */
    public $domains = null;

    /**
     * @var mixed
     */
    public $language;

    /**
     * @var mixed
     */
    public $defaultTimezone;

    /**
     * @return array
     */
    public function __toArray()
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
            ->setDomainTrunks(isset($data['domainTrunks']) ? $data['domainTrunks'] : null)
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
                'Core\\Model\\BrandOperator\\BrandOperator',
                $item
            );
        }

        $items = $this->getServices();
        $this->services = [];
        foreach ($items as $item) {
            $this->services[] = $transformer->tranform(
                'Core\\Model\\BrandService\\BrandService',
                $item
            );
        }

        $items = $this->getUrls();
        $this->urls = [];
        foreach ($items as $item) {
            $this->urls[] = $transformer->tranform(
                'Core\\Model\\BrandURL\\BrandURL',
                $item
            );
        }

        $items = $this->getRelFeatures();
        $this->relFeatures = [];
        foreach ($items as $item) {
            $this->relFeatures[] = $transformer->tranform(
                'Core\\Model\\FeaturesRelBrand\\FeaturesRelBrand',
                $item
            );
        }

        $items = $this->getDomains();
        $this->domains = [];
        foreach ($items as $item) {
            $this->domains[] = $transformer->tranform(
                'Core\\Model\\Domain\\Domain',
                $item
            );
        }

        $this->language = $transformer->transform('Core\\Model\\Language\\Language', $this->getLanguageId());
        $this->defaultTimezone = $transformer->transform('Core\\Model\\Timezone\\Timezone', $this->getDefaultTimezoneId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->operators = $transformer->transform(
            'Core\\Model\\BrandOperator\\BrandOperator',
            $this->operators
        );
        $this->services = $transformer->transform(
            'Core\\Model\\BrandService\\BrandService',
            $this->services
        );
        $this->urls = $transformer->transform(
            'Core\\Model\\BrandURL\\BrandURL',
            $this->urls
        );
        $this->relFeatures = $transformer->transform(
            'Core\\Model\\FeaturesRelBrand\\FeaturesRelBrand',
            $this->relFeatures
        );
        $this->domains = $transformer->transform(
            'Core\\Model\\Domain\\Domain',
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
     * @param string $domainTrunks
     *
     * @return BrandDTO
     */
    public function setDomainTrunks($domainTrunks = null)
    {
        $this->domainTrunks = $domainTrunks;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomainTrunks()
    {
        return $this->domainTrunks;
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
     * @return \Core\Domain\Model\Language\Language
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
     * @return \Core\Domain\Model\Timezone\Timezone
     */
    public function getDefaultTimezone()
    {
        return $this->defaultTimezone;
    }
}

