<?php

namespace Ivoz\Domain\Model\Brand;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Brand
 */
class Brand extends BrandAbstract implements BrandInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(...func_get_args());
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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceOperators($dto->getOperators())
            ->replaceServices($dto->getServices())
            ->replaceUrls($dto->getUrls())
            ->replaceRelFeatures($dto->getRelFeatures())
            ->replaceDomains($dto->getDomains())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandDTO
         */
        parent::updateFromDTO($dto);

        $this
            ->replaceOperators($dto->getOperators())
            ->replaceServices($dto->getServices())
            ->replaceUrls($dto->getUrls())
            ->replaceRelFeatures($dto->getRelFeatures())
            ->replaceDomains($dto->getDomains());


        return $this;
    }

    /**
     * @return BrandDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setOperators($this->getOperators())
            ->setServices($this->getServices())
            ->setUrls($this->getUrls())
            ->setRelFeatures($this->getRelFeatures())
            ->setDomains($this->getDomains());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId(),
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'defaultTimezoneId' => $this->getDefaultTimezone() ? $this->getDefaultTimezone()->getId() : null
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
     * Add operator
     *
     * @param \Ivoz\Domain\Model\BrandOperator\BrandOperatorInterface $operator
     *
     * @return Brand
     */
    protected function addOperator(\Ivoz\Domain\Model\BrandOperator\BrandOperatorInterface $operator)
    {
        $this->operators[] = $operator;

        return $this;
    }

    /**
     * Remove operator
     *
     * @param \Ivoz\Domain\Model\BrandOperator\BrandOperatorInterface $operator
     */
    protected function removeOperator(\Ivoz\Domain\Model\BrandOperator\BrandOperatorInterface $operator)
    {
        $this->operators->removeElement($operator);
    }

    /**
     * Replace operators
     *
     * @param \Ivoz\Domain\Model\BrandOperator\BrandOperatorInterface[] $operators
     * @return self
     */
    protected function replaceOperators(array $operators)
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
                $this->operators[$key] = $updatedEntities[$identity];
            } else {
                $this->removeOperator($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addOperator($entity);
        }

        return $this;
    }

    /**
     * Get operators
     *
     * @return array
     */
    public function getOperators(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->operators->matching($criteria)->toArray();
        }

        return $this->operators->toArray();
    }

    /**
     * Add service
     *
     * @param \Ivoz\Domain\Model\BrandService\BrandServiceInterface $service
     *
     * @return Brand
     */
    protected function addService(\Ivoz\Domain\Model\BrandService\BrandServiceInterface $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \Ivoz\Domain\Model\BrandService\BrandServiceInterface $service
     */
    protected function removeService(\Ivoz\Domain\Model\BrandService\BrandServiceInterface $service)
    {
        $this->services->removeElement($service);
    }

    /**
     * Replace services
     *
     * @param \Ivoz\Domain\Model\BrandService\BrandServiceInterface[] $services
     * @return self
     */
    protected function replaceServices(array $services)
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
                $this->services[$key] = $updatedEntities[$identity];
            } else {
                $this->removeService($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addService($entity);
        }

        return $this;
    }

    /**
     * Get services
     *
     * @return array
     */
    public function getServices(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->services->matching($criteria)->toArray();
        }

        return $this->services->toArray();
    }

    /**
     * Add url
     *
     * @param \Ivoz\Domain\Model\BrandURL\BrandURLInterface $url
     *
     * @return Brand
     */
    protected function addUrl(\Ivoz\Domain\Model\BrandURL\BrandURLInterface $url)
    {
        $this->urls[] = $url;

        return $this;
    }

    /**
     * Remove url
     *
     * @param \Ivoz\Domain\Model\BrandURL\BrandURLInterface $url
     */
    protected function removeUrl(\Ivoz\Domain\Model\BrandURL\BrandURLInterface $url)
    {
        $this->urls->removeElement($url);
    }

    /**
     * Replace urls
     *
     * @param \Ivoz\Domain\Model\BrandURL\BrandURLInterface[] $urls
     * @return self
     */
    protected function replaceUrls(array $urls)
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
                $this->urls[$key] = $updatedEntities[$identity];
            } else {
                $this->removeUrl($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addUrl($entity);
        }

        return $this;
    }

    /**
     * Get urls
     *
     * @return array
     */
    public function getUrls(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->urls->matching($criteria)->toArray();
        }

        return $this->urls->toArray();
    }

    /**
     * Add relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature
     *
     * @return Brand
     */
    protected function addRelFeature(\Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature)
    {
        $this->relFeatures[] = $relFeature;

        return $this;
    }

    /**
     * Remove relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature
     */
    protected function removeRelFeature(\Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrandInterface $relFeature)
    {
        $this->relFeatures->removeElement($relFeature);
    }

    /**
     * Replace relFeatures
     *
     * @param \Ivoz\Domain\Model\FeaturesRelBrand\FeaturesRelBrandInterface[] $relFeatures
     * @return self
     */
    protected function replaceRelFeatures(array $relFeatures)
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
                $this->relFeatures[$key] = $updatedEntities[$identity];
            } else {
                $this->removeRelFeature($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addRelFeature($entity);
        }

        return $this;
    }

    /**
     * Get relFeatures
     *
     * @return array
     */
    public function getRelFeatures(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->relFeatures->matching($criteria)->toArray();
        }

        return $this->relFeatures->toArray();
    }

    /**
     * Add domain
     *
     * @param \Ivoz\Domain\Model\Domain\DomainInterface $domain
     *
     * @return Brand
     */
    protected function addDomain(\Ivoz\Domain\Model\Domain\DomainInterface $domain)
    {
        $this->domains[] = $domain;

        return $this;
    }

    /**
     * Remove domain
     *
     * @param \Ivoz\Domain\Model\Domain\DomainInterface $domain
     */
    protected function removeDomain(\Ivoz\Domain\Model\Domain\DomainInterface $domain)
    {
        $this->domains->removeElement($domain);
    }

    /**
     * Replace domains
     *
     * @param \Ivoz\Domain\Model\Domain\DomainInterface[] $domains
     * @return self
     */
    protected function replaceDomains(array $domains)
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
                $this->domains[$key] = $updatedEntities[$identity];
            } else {
                $this->removeDomain($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addDomain($entity);
        }

        return $this;
    }

    /**
     * Get domains
     *
     * @return array
     */
    public function getDomains(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->domains->matching($criteria)->toArray();
        }

        return $this->domains->toArray();
    }


}

