<?php

namespace Ivoz\Domain\Model\DDI;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * DDIAbstract
 */
abstract class DDIAbstract
{
    /**
     * @var string
     */
    protected $ddi;

    /**
     * @var string
     */
    protected $ddie164;

    /**
     * @comment enum:none|all|inbound|outbound
     * @var string
     */
    protected $recordCalls = 'none';

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @comment enum:user|IVRCommon|IVRCustom|huntGroup|fax|conferenceRoom|friend|queue|retailAccount
     * @var string
     */
    protected $routeType;

    /**
     * @var boolean
     */
    protected $billInboundCalls = '0';

    /**
     * @var string
     */
    protected $friendValue;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    protected $conferenceRoom;

    /**
     * @var \Ivoz\Domain\Model\Language\LanguageInterface
     */
    protected $language;

    /**
     * @var \Ivoz\Domain\Model\Queue\QueueInterface
     */
    protected $queue;

    /**
     * @var \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    protected $externalCallFilter;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $user;

    /**
     * @var \Ivoz\Domain\Model\IVRCommon\IVRCommonInterface
     */
    protected $IVRCommon;

    /**
     * @var \Ivoz\Domain\Model\IVRCustom\IVRCustomInterface
     */
    protected $IVRCustom;

    /**
     * @var \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    protected $huntGroup;

    /**
     * @var \Ivoz\Domain\Model\Fax\FaxInterface
     */
    protected $fax;

    /**
     * @var \Ivoz\Domain\Model\PeeringContract\PeeringContractInterface
     */
    protected $peeringContract;

    /**
     * @var \Ivoz\Domain\Model\Country\CountryInterface
     */
    protected $country;

    /**
     * @var \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface
     */
    protected $retailAccount;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($ddi, $recordCalls, $billInboundCalls)
    {
        $this->setDdi($ddi);
        $this->setRecordCalls($recordCalls);
        $this->setBillInboundCalls($billInboundCalls);
    }

    abstract public function __wakeup();

    /**
     * @return DDIDTO
     */
    public static function createDTO()
    {
        return new DDIDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto DDIDTO
         */
        Assertion::isInstanceOf($dto, DDIDTO::class);

        $self = new static(
            $dto->getDdi(),
            $dto->getRecordCalls(),
            $dto->getBillInboundCalls());

        return $self
            ->setDdie164($dto->getDdie164())
            ->setDisplayName($dto->getDisplayName())
            ->setRouteType($dto->getRouteType())
            ->setFriendValue($dto->getFriendValue())
            ->setCompany($dto->getCompany())
            ->setBrand($dto->getBrand())
            ->setConferenceRoom($dto->getConferenceRoom())
            ->setLanguage($dto->getLanguage())
            ->setQueue($dto->getQueue())
            ->setExternalCallFilter($dto->getExternalCallFilter())
            ->setUser($dto->getUser())
            ->setIVRCommon($dto->getIVRCommon())
            ->setIVRCustom($dto->getIVRCustom())
            ->setHuntGroup($dto->getHuntGroup())
            ->setFax($dto->getFax())
            ->setPeeringContract($dto->getPeeringContract())
            ->setCountry($dto->getCountry())
            ->setRetailAccount($dto->getRetailAccount())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto DDIDTO
         */
        Assertion::isInstanceOf($dto, DDIDTO::class);

        $this
            ->setDdi($dto->getDdi())
            ->setDdie164($dto->getDdie164())
            ->setRecordCalls($dto->getRecordCalls())
            ->setDisplayName($dto->getDisplayName())
            ->setRouteType($dto->getRouteType())
            ->setBillInboundCalls($dto->getBillInboundCalls())
            ->setFriendValue($dto->getFriendValue())
            ->setCompany($dto->getCompany())
            ->setBrand($dto->getBrand())
            ->setConferenceRoom($dto->getConferenceRoom())
            ->setLanguage($dto->getLanguage())
            ->setQueue($dto->getQueue())
            ->setExternalCallFilter($dto->getExternalCallFilter())
            ->setUser($dto->getUser())
            ->setIVRCommon($dto->getIVRCommon())
            ->setIVRCustom($dto->getIVRCustom())
            ->setHuntGroup($dto->getHuntGroup())
            ->setFax($dto->getFax())
            ->setPeeringContract($dto->getPeeringContract())
            ->setCountry($dto->getCountry())
            ->setRetailAccount($dto->getRetailAccount());


        return $this;
    }

    /**
     * @return DDIDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setDdi($this->getDdi())
            ->setDdie164($this->getDdie164())
            ->setRecordCalls($this->getRecordCalls())
            ->setDisplayName($this->getDisplayName())
            ->setRouteType($this->getRouteType())
            ->setBillInboundCalls($this->getBillInboundCalls())
            ->setFriendValue($this->getFriendValue())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null)
            ->setConferenceRoomId($this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null)
            ->setLanguageId($this->getLanguage() ? $this->getLanguage()->getId() : null)
            ->setQueueId($this->getQueue() ? $this->getQueue()->getId() : null)
            ->setExternalCallFilterId($this->getExternalCallFilter() ? $this->getExternalCallFilter()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null)
            ->setIVRCommonId($this->getIVRCommon() ? $this->getIVRCommon()->getId() : null)
            ->setIVRCustomId($this->getIVRCustom() ? $this->getIVRCustom()->getId() : null)
            ->setHuntGroupId($this->getHuntGroup() ? $this->getHuntGroup()->getId() : null)
            ->setFaxId($this->getFax() ? $this->getFax()->getId() : null)
            ->setPeeringContractId($this->getPeeringContract() ? $this->getPeeringContract()->getId() : null)
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null)
            ->setRetailAccountId($this->getRetailAccount() ? $this->getRetailAccount()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'ddi' => $this->getDdi(),
            'ddie164' => $this->getDdie164(),
            'recordCalls' => $this->getRecordCalls(),
            'displayName' => $this->getDisplayName(),
            'routeType' => $this->getRouteType(),
            'billInboundCalls' => $this->getBillInboundCalls(),
            'friendValue' => $this->getFriendValue(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'conferenceRoomId' => $this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null,
            'externalCallFilterId' => $this->getExternalCallFilter() ? $this->getExternalCallFilter()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null,
            'iVRCommonId' => $this->getIVRCommon() ? $this->getIVRCommon()->getId() : null,
            'iVRCustomId' => $this->getIVRCustom() ? $this->getIVRCustom()->getId() : null,
            'huntGroupId' => $this->getHuntGroup() ? $this->getHuntGroup()->getId() : null,
            'faxId' => $this->getFax() ? $this->getFax()->getId() : null,
            'peeringContractId' => $this->getPeeringContract() ? $this->getPeeringContract()->getId() : null,
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null,
            'retailAccountId' => $this->getRetailAccount() ? $this->getRetailAccount()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set ddi
     *
     * @param string $ddi
     *
     * @return self
     */
    protected function setDdi($ddi)
    {
        Assertion::notNull($ddi);
        Assertion::maxLength($ddi, 25);

        $this->ddi = $ddi;

        return $this;
    }

    /**
     * Get ddi
     *
     * @return string
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * Set ddie164
     *
     * @param string $ddie164
     *
     * @return self
     */
    protected function setDdie164($ddie164 = null)
    {
        if (!is_null($ddie164)) {
            Assertion::maxLength($ddie164, 25);
        }

        $this->ddie164 = $ddie164;

        return $this;
    }

    /**
     * Get ddie164
     *
     * @return string
     */
    public function getDdie164()
    {
        return $this->ddie164;
    }

    /**
     * Set recordCalls
     *
     * @param string $recordCalls
     *
     * @return self
     */
    protected function setRecordCalls($recordCalls)
    {
        Assertion::notNull($recordCalls);
        Assertion::maxLength($recordCalls, 25);
        Assertion::choice($recordCalls, array (
          0 => 'none',
          1 => 'all',
          2 => 'inbound',
          3 => 'outbound',
        ));

        $this->recordCalls = $recordCalls;

        return $this;
    }

    /**
     * Get recordCalls
     *
     * @return string
     */
    public function getRecordCalls()
    {
        return $this->recordCalls;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return self
     */
    protected function setDisplayName($displayName = null)
    {
        if (!is_null($displayName)) {
            Assertion::maxLength($displayName, 50);
        }

        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set routeType
     *
     * @param string $routeType
     *
     * @return self
     */
    protected function setRouteType($routeType = null)
    {
        if (!is_null($routeType)) {
            Assertion::maxLength($routeType, 25);
        Assertion::choice($routeType, array (
          0 => '    user',
          1 => '    IVRCommon',
          2 => '    IVRCustom',
          3 => '    huntGroup',
          4 => '    fax',
          5 => '    conferenceRoom',
          6 => '    friend',
          7 => '    queue',
          8 => '    retailAccount',
        ));
        }

        $this->routeType = $routeType;

        return $this;
    }

    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * Set billInboundCalls
     *
     * @param boolean $billInboundCalls
     *
     * @return self
     */
    protected function setBillInboundCalls($billInboundCalls)
    {
        Assertion::notNull($billInboundCalls);
        Assertion::between(intval($billInboundCalls), 0, 1);

        $this->billInboundCalls = $billInboundCalls;

        return $this;
    }

    /**
     * Get billInboundCalls
     *
     * @return boolean
     */
    public function getBillInboundCalls()
    {
        return $this->billInboundCalls;
    }

    /**
     * Set friendValue
     *
     * @param string $friendValue
     *
     * @return self
     */
    protected function setFriendValue($friendValue = null)
    {
        if (!is_null($friendValue)) {
            Assertion::maxLength($friendValue, 25);
        }

        $this->friendValue = $friendValue;

        return $this;
    }

    /**
     * Get friendValue
     *
     * @return string
     */
    public function getFriendValue()
    {
        return $this->friendValue;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
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
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand)
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
     * Set conferenceRoom
     *
     * @param \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom
     *
     * @return self
     */
    protected function setConferenceRoom(\Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom = null)
    {
        $this->conferenceRoom = $conferenceRoom;

        return $this;
    }

    /**
     * Get conferenceRoom
     *
     * @return \Ivoz\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
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
     * Set queue
     *
     * @param \Ivoz\Domain\Model\Queue\QueueInterface $queue
     *
     * @return self
     */
    protected function setQueue(\Ivoz\Domain\Model\Queue\QueueInterface $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set externalCallFilter
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $externalCallFilter
     *
     * @return self
     */
    protected function setExternalCallFilter(\Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $externalCallFilter = null)
    {
        $this->externalCallFilter = $externalCallFilter;

        return $this;
    }

    /**
     * Get externalCallFilter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getExternalCallFilter()
    {
        return $this->externalCallFilter;
    }

    /**
     * Set user
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    protected function setUser(\Ivoz\Domain\Model\User\UserInterface $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set iVRCommon
     *
     * @param \Ivoz\Domain\Model\IVRCommon\IVRCommonInterface $iVRCommon
     *
     * @return self
     */
    protected function setIVRCommon(\Ivoz\Domain\Model\IVRCommon\IVRCommonInterface $iVRCommon = null)
    {
        $this->IVRCommon = $iVRCommon;

        return $this;
    }

    /**
     * Get iVRCommon
     *
     * @return \Ivoz\Domain\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon()
    {
        return $this->IVRCommon;
    }

    /**
     * Set iVRCustom
     *
     * @param \Ivoz\Domain\Model\IVRCustom\IVRCustomInterface $iVRCustom
     *
     * @return self
     */
    protected function setIVRCustom(\Ivoz\Domain\Model\IVRCustom\IVRCustomInterface $iVRCustom = null)
    {
        $this->IVRCustom = $iVRCustom;

        return $this;
    }

    /**
     * Get iVRCustom
     *
     * @return \Ivoz\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * Set huntGroup
     *
     * @param \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return self
     */
    protected function setHuntGroup(\Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup = null)
    {
        $this->huntGroup = $huntGroup;

        return $this;
    }

    /**
     * Get huntGroup
     *
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * Set fax
     *
     * @param \Ivoz\Domain\Model\Fax\FaxInterface $fax
     *
     * @return self
     */
    protected function setFax(\Ivoz\Domain\Model\Fax\FaxInterface $fax = null)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return \Ivoz\Domain\Model\Fax\FaxInterface
     */
    public function getFax()
    {
        return $this->fax;
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

    /**
     * Set country
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    protected function setCountry(\Ivoz\Domain\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set retailAccount
     *
     * @param \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount
     *
     * @return self
     */
    protected function setRetailAccount(\Ivoz\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount = null)
    {
        $this->retailAccount = $retailAccount;

        return $this;
    }

    /**
     * Get retailAccount
     *
     * @return \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface
     */
    public function getRetailAccount()
    {
        return $this->retailAccount;
    }



    // @codeCoverageIgnoreEnd
}

