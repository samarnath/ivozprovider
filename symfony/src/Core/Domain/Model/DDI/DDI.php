<?php

namespace Core\Domain\Model\DDI;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * DDI
 */
class DDI implements EntityInterface, DDIInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @comment enum:user|IVRCommon|IVRCustom|huntGroup|fax|conferenceRoom|friend|queue
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
     * @var \Core\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Core\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    protected $conferenceRoom;

    /**
     * @var \Core\Domain\Model\Language\LanguageInterface
     */
    protected $language;

    /**
     * @var \Core\Domain\Model\Queue\QueueInterface
     */
    protected $queue;

    /**
     * @var \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    protected $externalCallFilter;

    /**
     * @var \Core\Domain\Model\User\UserInterface
     */
    protected $user;

    /**
     * @var \Core\Domain\Model\IVRCommon\IVRCommonInterface
     */
    protected $IVRCommon;

    /**
     * @var \Core\Domain\Model\IVRCustom\IVRCustomInterface
     */
    protected $IVRCustom;

    /**
     * @var \Core\Domain\Model\HuntGroup\HuntGroupInterface
     */
    protected $huntGroup;

    /**
     * @var \Core\Domain\Model\Fax\FaxInterface
     */
    protected $fax;

    /**
     * @var \Core\Domain\Model\PeeringContract\PeeringContractInterface
     */
    protected $peeringContract;

    /**
     * @var \Core\Domain\Model\Country\CountryInterface
     */
    protected $country;


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

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return DDIDTO
     */
    public static function createDTO()
    {
        return new DDIDTO();
    }

    /**
     * Factory method
     * @param DDIDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, DDIDTO::class);

        $self = new self(
            $dto->getDdi(),
            $dto->getRecordCalls(),
            $dto->getBillInboundCalls()
        );

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
            ->setCountry($dto->getCountry());
    }

    /**
     * @param DDIDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setCountry($dto->getCountry());


        return $this;
    }

    /**
     * @return DDIDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
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
            ->setCountryId($this->getCountry() ? $this->getCountry()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
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
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null
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
     * Set ddi
     *
     * @param string $ddi
     *
     * @return DDI
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
     * @return DDI
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
     * @return DDI
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
     * @return DDI
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
     * @return DDI
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
     * @return DDI
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
     * @return DDI
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
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return DDI
     */
    protected function setCompany(\Core\Domain\Model\Company\CompanyInterface $company)
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
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return DDI
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
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
     * Set conferenceRoom
     *
     * @param \Core\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom
     *
     * @return DDI
     */
    protected function setConferenceRoom(\Core\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom = null)
    {
        $this->conferenceRoom = $conferenceRoom;

        return $this;
    }

    /**
     * Get conferenceRoom
     *
     * @return \Core\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * Set language
     *
     * @param \Core\Domain\Model\Language\LanguageInterface $language
     *
     * @return DDI
     */
    protected function setLanguage(\Core\Domain\Model\Language\LanguageInterface $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Core\Domain\Model\Language\LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set queue
     *
     * @param \Core\Domain\Model\Queue\QueueInterface $queue
     *
     * @return DDI
     */
    protected function setQueue(\Core\Domain\Model\Queue\QueueInterface $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Core\Domain\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set externalCallFilter
     *
     * @param \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $externalCallFilter
     *
     * @return DDI
     */
    protected function setExternalCallFilter(\Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $externalCallFilter = null)
    {
        $this->externalCallFilter = $externalCallFilter;

        return $this;
    }

    /**
     * Get externalCallFilter
     *
     * @return \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getExternalCallFilter()
    {
        return $this->externalCallFilter;
    }

    /**
     * Set user
     *
     * @param \Core\Domain\Model\User\UserInterface $user
     *
     * @return DDI
     */
    protected function setUser(\Core\Domain\Model\User\UserInterface $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set iVRCommon
     *
     * @param \Core\Domain\Model\IVRCommon\IVRCommonInterface $iVRCommon
     *
     * @return DDI
     */
    protected function setIVRCommon(\Core\Domain\Model\IVRCommon\IVRCommonInterface $iVRCommon = null)
    {
        $this->IVRCommon = $iVRCommon;

        return $this;
    }

    /**
     * Get iVRCommon
     *
     * @return \Core\Domain\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon()
    {
        return $this->IVRCommon;
    }

    /**
     * Set iVRCustom
     *
     * @param \Core\Domain\Model\IVRCustom\IVRCustomInterface $iVRCustom
     *
     * @return DDI
     */
    protected function setIVRCustom(\Core\Domain\Model\IVRCustom\IVRCustomInterface $iVRCustom = null)
    {
        $this->IVRCustom = $iVRCustom;

        return $this;
    }

    /**
     * Get iVRCustom
     *
     * @return \Core\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * Set huntGroup
     *
     * @param \Core\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return DDI
     */
    protected function setHuntGroup(\Core\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup = null)
    {
        $this->huntGroup = $huntGroup;

        return $this;
    }

    /**
     * Get huntGroup
     *
     * @return \Core\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * Set fax
     *
     * @param \Core\Domain\Model\Fax\FaxInterface $fax
     *
     * @return DDI
     */
    protected function setFax(\Core\Domain\Model\Fax\FaxInterface $fax = null)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set peeringContract
     *
     * @param \Core\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract
     *
     * @return DDI
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

    /**
     * Set country
     *
     * @param \Core\Domain\Model\Country\CountryInterface $country
     *
     * @return DDI
     */
    protected function setCountry(\Core\Domain\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }



    // @codeCoverageIgnoreEnd
}

