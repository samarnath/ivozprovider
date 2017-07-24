<?php

namespace Ivoz\Domain\Model\Company;

use Core\Application\DataTransferObjectInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Company
 */
class Company extends CompanyAbstract implements CompanyInterface
{
    use CompanyTrait;

    const EMPTY_DOMAIN_EXCEPTION = 2001;

    /**
     * Available Company Types
     */
    const VPBX      = 'vpbx';
    const RETAIL    = "retail";

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var ArrayCollection
     */
    protected $relPricingPlans;

    /**
     * @var ArrayCollection
     */
    protected $extensions;

    /**
     * @var ArrayCollection
     */
    protected $ddis;

    /**
     * @var ArrayCollection
     */
    protected $friends;

    /**
     * @var ArrayCollection
     */
    protected $companyServices;

    /**
     * @var ArrayCollection
     */
    protected $terminals;

    /**
     * @var ArrayCollection
     */
    protected $musicsOnHold;

    /**
     * @var ArrayCollection
     */
    protected $countries;

    /**
     * @var ArrayCollection
     */
    protected $recordings;

    /**
     * @var ArrayCollection
     */
    protected $relFeatures;


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
        $this->relPricingPlans = new ArrayCollection();
        $this->extensions = new ArrayCollection();
        $this->ddis = new ArrayCollection();
        $this->friends = new ArrayCollection();
        $this->companyServices = new ArrayCollection();
        $this->terminals = new ArrayCollection();
        $this->musicsOnHold = new ArrayCollection();
        $this->countries = new ArrayCollection();
        $this->recordings = new ArrayCollection();
        $this->relFeatures = new ArrayCollection();
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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CompanyDTO
         */
        $self = parent::fromDTO($dto);

        return $self
            ->replaceRelPricingPlans($dto->getRelPricingPlans())
            ->replaceExtensions($dto->getExtensions())
            ->replaceDdis($dto->getDdis())
            ->replaceFriends($dto->getFriends())
            ->replaceCompanyServices($dto->getCompanyServices())
            ->replaceTerminals($dto->getTerminals())
            ->replaceMusicsOnHold($dto->getMusicsOnHold())
            ->replaceCountries($dto->getCountries())
            ->replaceRecordings($dto->getRecordings())
            ->replaceRelFeatures($dto->getRelFeatures())
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
        parent::updateFromDTO($dto);

        $this
            ->replaceRelPricingPlans($dto->getRelPricingPlans())
            ->replaceExtensions($dto->getExtensions())
            ->replaceDdis($dto->getDdis())
            ->replaceFriends($dto->getFriends())
            ->replaceCompanyServices($dto->getCompanyServices())
            ->replaceTerminals($dto->getTerminals())
            ->replaceMusicsOnHold($dto->getMusicsOnHold())
            ->replaceCountries($dto->getCountries())
            ->replaceRecordings($dto->getRecordings())
            ->replaceRelFeatures($dto->getRelFeatures());


        return $this;
    }

    /**
     * @return CompanyDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId())
            ->setRelPricingPlans($this->getRelPricingPlans())
            ->setExtensions($this->getExtensions())
            ->setDdis($this->getDdis())
            ->setFriends($this->getFriends())
            ->setCompanyServices($this->getCompanyServices())
            ->setTerminals($this->getTerminals())
            ->setMusicsOnHold($this->getMusicsOnHold())
            ->setCountries($this->getCountries())
            ->setRecordings($this->getRecordings())
            ->setRelFeatures($this->getRelFeatures());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId()
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
     * Add relPricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterfaceInterface $relPricingPlan
     *
     * @return Company
     */
    protected function addRelPricingPlan(\Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterfaceInterface $relPricingPlan)
    {
        $this->relPricingPlans[] = $relPricingPlan;

        return $this;
    }

    /**
     * Remove relPricingPlan
     *
     * @param \Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterfaceInterface $relPricingPlan
     */
    protected function removeRelPricingPlan(\Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterfaceInterface $relPricingPlan)
    {
        $this->relPricingPlans->removeElement($relPricingPlan);
    }

    /**
     * Replace relPricingPlans
     *
     * @param \Ivoz\Domain\Model\PricingPlansRelCompany\PricingPlansRelCompanyInterfaceInterface[] $relPricingPlans
     * @return self
     */
    protected function replaceRelPricingPlans(array $relPricingPlans)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($relPricingPlans as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->relPricingPlans as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->relPricingPlans[$key] = $updatedEntities[$identity];
            } else {
                $this->removeRelPricingPlan($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addRelPricingPlan($entity);
        }

        return $this;
    }

    /**
     * Get relPricingPlans
     *
     * @return array
     */
    public function getRelPricingPlans(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->relPricingPlans->matching($criteria)->toArray();
        }

        return $this->relPricingPlans->toArray();
    }

    /**
     * Add extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return Company
     */
    protected function addExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension)
    {
        $this->extensions[] = $extension;

        return $this;
    }

    /**
     * Remove extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     */
    protected function removeExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension)
    {
        $this->extensions->removeElement($extension);
    }

    /**
     * Replace extensions
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface[] $extensions
     * @return self
     */
    protected function replaceExtensions(array $extensions)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($extensions as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->extensions as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->extensions[$key] = $updatedEntities[$identity];
            } else {
                $this->removeExtension($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addExtension($entity);
        }

        return $this;
    }

    /**
     * Get extensions
     *
     * @return array
     */
    public function getExtensions(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->extensions->matching($criteria)->toArray();
        }

        return $this->extensions->toArray();
    }

    /**
     * Add ddi
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $ddi
     *
     * @return Company
     */
    protected function addDdi(\Ivoz\Domain\Model\DDI\DDIInterface $ddi)
    {
        $this->ddis[] = $ddi;

        return $this;
    }

    /**
     * Remove ddi
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface $ddi
     */
    protected function removeDdi(\Ivoz\Domain\Model\DDI\DDIInterface $ddi)
    {
        $this->ddis->removeElement($ddi);
    }

    /**
     * Replace ddis
     *
     * @param \Ivoz\Domain\Model\DDI\DDIInterface[] $ddis
     * @return self
     */
    protected function replaceDdis(array $ddis)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($ddis as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->ddis as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->ddis[$key] = $updatedEntities[$identity];
            } else {
                $this->removeDdi($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addDdi($entity);
        }

        return $this;
    }

    /**
     * Get ddis
     *
     * @return array
     */
    public function getDdis(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->ddis->matching($criteria)->toArray();
        }

        return $this->ddis->toArray();
    }

    /**
     * Add friend
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface $friend
     *
     * @return Company
     */
    protected function addFriend(\Ivoz\Domain\Model\Friend\FriendInterface $friend)
    {
        $this->friends[] = $friend;

        return $this;
    }

    /**
     * Remove friend
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface $friend
     */
    protected function removeFriend(\Ivoz\Domain\Model\Friend\FriendInterface $friend)
    {
        $this->friends->removeElement($friend);
    }

    /**
     * Replace friends
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface[] $friends
     * @return self
     */
    protected function replaceFriends(array $friends)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($friends as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->friends as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->friends[$key] = $updatedEntities[$identity];
            } else {
                $this->removeFriend($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addFriend($entity);
        }

        return $this;
    }

    /**
     * Get friends
     *
     * @return array
     */
    public function getFriends(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->friends->matching($criteria)->toArray();
        }

        return $this->friends->toArray();
    }

    /**
     * Add companyService
     *
     * @param \Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService
     *
     * @return Company
     */
    protected function addCompanyService(\Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService)
    {
        $this->companyServices[] = $companyService;

        return $this;
    }

    /**
     * Remove companyService
     *
     * @param \Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService
     */
    protected function removeCompanyService(\Ivoz\Domain\Model\CompanyService\CompanyServiceInterface $companyService)
    {
        $this->companyServices->removeElement($companyService);
    }

    /**
     * Replace companyServices
     *
     * @param \Ivoz\Domain\Model\CompanyService\CompanyServiceInterface[] $companyServices
     * @return self
     */
    protected function replaceCompanyServices(array $companyServices)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($companyServices as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->companyServices as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->companyServices[$key] = $updatedEntities[$identity];
            } else {
                $this->removeCompanyService($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addCompanyService($entity);
        }

        return $this;
    }

    /**
     * Get companyServices
     *
     * @return array
     */
    public function getCompanyServices(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->companyServices->matching($criteria)->toArray();
        }

        return $this->companyServices->toArray();
    }

    /**
     * Add terminal
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface $terminal
     *
     * @return Company
     */
    protected function addTerminal(\Ivoz\Domain\Model\Terminal\TerminalInterface $terminal)
    {
        $this->terminals[] = $terminal;

        return $this;
    }

    /**
     * Remove terminal
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface $terminal
     */
    protected function removeTerminal(\Ivoz\Domain\Model\Terminal\TerminalInterface $terminal)
    {
        $this->terminals->removeElement($terminal);
    }

    /**
     * Replace terminals
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface[] $terminals
     * @return self
     */
    protected function replaceTerminals(array $terminals)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($terminals as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->terminals as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->terminals[$key] = $updatedEntities[$identity];
            } else {
                $this->removeTerminal($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addTerminal($entity);
        }

        return $this;
    }

    /**
     * Get terminals
     *
     * @return array
     */
    public function getTerminals(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->terminals->matching($criteria)->toArray();
        }

        return $this->terminals->toArray();
    }

    /**
     * Add musicsOnHold
     *
     * @param \Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold
     *
     * @return Company
     */
    protected function addMusicsOnHold(\Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold)
    {
        $this->musicsOnHold[] = $musicsOnHold;

        return $this;
    }

    /**
     * Remove musicsOnHold
     *
     * @param \Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold
     */
    protected function removeMusicsOnHold(\Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface $musicsOnHold)
    {
        $this->musicsOnHold->removeElement($musicsOnHold);
    }

    /**
     * Replace musicsOnHold
     *
     * @param \Ivoz\Domain\Model\MusicOnHold\MusicOnHoldInterface[] $musicsOnHold
     * @return self
     */
    protected function replaceMusicsOnHold(array $musicsOnHold)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($musicsOnHold as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->musicsOnHold as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->musicsOnHold[$key] = $updatedEntities[$identity];
            } else {
                $this->removeMusicsOnHold($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addMusicsOnHold($entity);
        }

        return $this;
    }

    /**
     * Get musicsOnHold
     *
     * @return array
     */
    public function getMusicsOnHold(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->musicsOnHold->matching($criteria)->toArray();
        }

        return $this->musicsOnHold->toArray();
    }

    /**
     * Add country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return Company
     */
    protected function addCountry(\Ivoz\Domain\Model\Country\CountryInterface $country)
    {
        $this->countries[] = $country;

        return $this;
    }

    /**
     * Remove country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     */
    protected function removeCountry(\Ivoz\Domain\Model\Country\CountryInterface $country)
    {
        $this->countries->removeElement($country);
    }

    /**
     * Replace countries
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface[] $countries
     * @return self
     */
    protected function replaceCountries(array $countries)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($countries as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->countries as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->countries[$key] = $updatedEntities[$identity];
            } else {
                $this->removeCountry($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addCountry($entity);
        }

        return $this;
    }

    /**
     * Get countries
     *
     * @return array
     */
    public function getCountries(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->countries->matching($criteria)->toArray();
        }

        return $this->countries->toArray();
    }

    /**
     * Add recording
     *
     * @param \Ivoz\Domain\Model\Recording\RecordingInterface $recording
     *
     * @return Company
     */
    protected function addRecording(\Ivoz\Domain\Model\Recording\RecordingInterface $recording)
    {
        $this->recordings[] = $recording;

        return $this;
    }

    /**
     * Remove recording
     *
     * @param \Ivoz\Domain\Model\Recording\RecordingInterface $recording
     */
    protected function removeRecording(\Ivoz\Domain\Model\Recording\RecordingInterface $recording)
    {
        $this->recordings->removeElement($recording);
    }

    /**
     * Replace recordings
     *
     * @param \Ivoz\Domain\Model\Recording\RecordingInterface[] $recordings
     * @return self
     */
    protected function replaceRecordings(array $recordings)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($recordings as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
        }
        $updatedEntityKeys = array_keys($updatedEntities);

        foreach ($this->recordings as $key => $entity) {
            $identity = $entity->getId();
            if (in_array($identity, $updatedEntityKeys)) {
                $this->recordings[$key] = $updatedEntities[$identity];
            } else {
                $this->removeRecording($key);
            }
            unset($updatedEntities[$identity]);
        }

        foreach ($updatedEntities as $entity) {
            $this->addRecording($entity);
        }

        return $this;
    }

    /**
     * Get recordings
     *
     * @return array
     */
    public function getRecordings(Criteria $criteria = null)
    {
        if (!is_null($criteria)) {
            return $this->recordings->matching($criteria)->toArray();
        }

        return $this->recordings->toArray();
    }

    /**
     * Add relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature
     *
     * @return Company
     */
    protected function addRelFeature(\Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature)
    {
        $this->relFeatures[] = $relFeature;

        return $this;
    }

    /**
     * Remove relFeature
     *
     * @param \Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature
     */
    protected function removeRelFeature(\Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface $relFeature)
    {
        $this->relFeatures->removeElement($relFeature);
    }

    /**
     * Replace relFeatures
     *
     * @param \Ivoz\Domain\Model\FeaturesRelCompany\FeaturesRelCompanyInterface[] $relFeatures
     * @return self
     */
    protected function replaceRelFeatures(array $relFeatures)
    {
        $updatedEntities = [];
        $fallBackId = -1;
        foreach ($relFeatures as $entity) {
            $index = $entity->getId() ? $entity->getId() : $fallBackId--;
            $updatedEntities[$index] = $entity;
            $entity->setCompany($this);
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


}
