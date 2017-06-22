<?php

namespace Core\Domain\Model\DDI;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class DDIDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ddi;

    /**
     * @var string
     */
    private $ddie164;

    /**
     * @var string
     */
    private $recordCalls = 'none';

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var string
     */
    private $routeType;

    /**
     * @var boolean
     */
    private $billInboundCalls = '0';

    /**
     * @var string
     */
    private $friendValue;

    /**
     * @var mixed
     */
    private $retailAccountId;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $conferenceRoomId;

    /**
     * @var mixed
     */
    private $languageId;

    /**
     * @var mixed
     */
    private $queueId;

    /**
     * @var mixed
     */
    private $externalCallFilterId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $IVRCommonId;

    /**
     * @var mixed
     */
    private $IVRCustomId;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $faxId;

    /**
     * @var mixed
     */
    private $peeringContractId;

    /**
     * @var mixed
     */
    private $countryId;

    /**
     * @var mixed
     */
    private $retailAccount;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $conferenceRoom;

    /**
     * @var mixed
     */
    private $language;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @var mixed
     */
    private $externalCallFilter;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @var mixed
     */
    private $IVRCommon;

    /**
     * @var mixed
     */
    private $IVRCustom;

    /**
     * @var mixed
     */
    private $huntGroup;

    /**
     * @var mixed
     */
    private $fax;

    /**
     * @var mixed
     */
    private $peeringContract;

    /**
     * @var mixed
     */
    private $country;

    /**
     * @return array
     */
    public function __toArray()
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
            'retailAccountId' => $this->getRetailAccountId(),
            'companyId' => $this->getCompanyId(),
            'brandId' => $this->getBrandId(),
            'conferenceRoomId' => $this->getConferenceRoomId(),
            'languageId' => $this->getLanguageId(),
            'queueId' => $this->getQueueId(),
            'externalCallFilterId' => $this->getExternalCallFilterId(),
            'userId' => $this->getUserId(),
            'iVRCommonId' => $this->getIVRCommonId(),
            'iVRCustomId' => $this->getIVRCustomId(),
            'huntGroupId' => $this->getHuntGroupId(),
            'faxId' => $this->getFaxId(),
            'peeringContractId' => $this->getPeeringContractId(),
            'countryId' => $this->getCountryId()
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
            ->setDdi(isset($data['ddi']) ? $data['ddi'] : null)
            ->setDdie164(isset($data['ddie164']) ? $data['ddie164'] : null)
            ->setRecordCalls(isset($data['recordCalls']) ? $data['recordCalls'] : null)
            ->setDisplayName(isset($data['displayName']) ? $data['displayName'] : null)
            ->setRouteType(isset($data['routeType']) ? $data['routeType'] : null)
            ->setBillInboundCalls(isset($data['billInboundCalls']) ? $data['billInboundCalls'] : null)
            ->setFriendValue(isset($data['friendValue']) ? $data['friendValue'] : null)
            ->setRetailAccountId(isset($data['retailAccountId']) ? $data['retailAccountId'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null)
            ->setConferenceRoomId(isset($data['conferenceRoomId']) ? $data['conferenceRoomId'] : null)
            ->setLanguageId(isset($data['languageId']) ? $data['languageId'] : null)
            ->setQueueId(isset($data['queueId']) ? $data['queueId'] : null)
            ->setExternalCallFilterId(isset($data['externalCallFilterId']) ? $data['externalCallFilterId'] : null)
            ->setUserId(isset($data['userId']) ? $data['userId'] : null)
            ->setIVRCommonId(isset($data['IVRCommonId']) ? $data['IVRCommonId'] : null)
            ->setIVRCustomId(isset($data['IVRCustomId']) ? $data['IVRCustomId'] : null)
            ->setHuntGroupId(isset($data['huntGroupId']) ? $data['huntGroupId'] : null)
            ->setFaxId(isset($data['faxId']) ? $data['faxId'] : null)
            ->setPeeringContractId(isset($data['peeringContractId']) ? $data['peeringContractId'] : null)
            ->setCountryId(isset($data['countryId']) ? $data['countryId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->retailAccount = $transformer->transform('Core\\Domain\\Model\\RetailAccount\\RetailAccountInterfaceInterface', $this->getRetailAccountId());
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\BrandInterface', $this->getBrandId());
        $this->conferenceRoom = $transformer->transform('Core\\Domain\\Model\\ConferenceRoom\\ConferenceRoomInterface', $this->getConferenceRoomId());
        $this->language = $transformer->transform('Core\\Domain\\Model\\Language\\LanguageInterface', $this->getLanguageId());
        $this->queue = $transformer->transform('Core\\Domain\\Model\\Queue\\QueueInterface', $this->getQueueId());
        $this->externalCallFilter = $transformer->transform('Core\\Domain\\Model\\ExternalCallFilter\\ExternalCallFilterInterface', $this->getExternalCallFilterId());
        $this->user = $transformer->transform('Core\\Domain\\Model\\User\\UserInterface', $this->getUserId());
        $this->iVRCommon = $transformer->transform('Core\\Domain\\Model\\IVRCommon\\IVRCommonInterface', $this->getIVRCommonId());
        $this->iVRCustom = $transformer->transform('Core\\Domain\\Model\\IVRCustom\\IVRCustomInterface', $this->getIVRCustomId());
        $this->huntGroup = $transformer->transform('Core\\Domain\\Model\\HuntGroup\\HuntGroupInterface', $this->getHuntGroupId());
        $this->fax = $transformer->transform('Core\\Domain\\Model\\Fax\\FaxInterface', $this->getFaxId());
        $this->peeringContract = $transformer->transform('Core\\Domain\\Model\\PeeringContract\\PeeringContractInterface', $this->getPeeringContractId());
        $this->country = $transformer->transform('Core\\Domain\\Model\\Country\\CountryInterface', $this->getCountryId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return DDIDTO
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
     * @param string $ddi
     *
     * @return DDIDTO
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;

        return $this;
    }

    /**
     * @return string
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * @param string $ddie164
     *
     * @return DDIDTO
     */
    public function setDdie164($ddie164 = null)
    {
        $this->ddie164 = $ddie164;

        return $this;
    }

    /**
     * @return string
     */
    public function getDdie164()
    {
        return $this->ddie164;
    }

    /**
     * @param string $recordCalls
     *
     * @return DDIDTO
     */
    public function setRecordCalls($recordCalls)
    {
        $this->recordCalls = $recordCalls;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordCalls()
    {
        return $this->recordCalls;
    }

    /**
     * @param string $displayName
     *
     * @return DDIDTO
     */
    public function setDisplayName($displayName = null)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $routeType
     *
     * @return DDIDTO
     */
    public function setRouteType($routeType = null)
    {
        $this->routeType = $routeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * @param boolean $billInboundCalls
     *
     * @return DDIDTO
     */
    public function setBillInboundCalls($billInboundCalls)
    {
        $this->billInboundCalls = $billInboundCalls;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getBillInboundCalls()
    {
        return $this->billInboundCalls;
    }

    /**
     * @param string $friendValue
     *
     * @return DDIDTO
     */
    public function setFriendValue($friendValue = null)
    {
        $this->friendValue = $friendValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendValue()
    {
        return $this->friendValue;
    }

    /**
     * @param integer $retailAccountId
     *
     * @return DDIDTO
     */
    public function setRetailAccountId($retailAccountId)
    {
        $this->retailAccountId = $retailAccountId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRetailAccountId()
    {
        return $this->retailAccountId;
    }

    /**
     * @return \Core\Domain\Model\RetailAccount\RetailAccountInterfaceInterface
     */
    public function getRetailAccount()
    {
        return $this->retailAccount;
    }

    /**
     * @param integer $companyId
     *
     * @return DDIDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $brandId
     *
     * @return DDIDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $conferenceRoomId
     *
     * @return DDIDTO
     */
    public function setConferenceRoomId($conferenceRoomId)
    {
        $this->conferenceRoomId = $conferenceRoomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConferenceRoomId()
    {
        return $this->conferenceRoomId;
    }

    /**
     * @return \Core\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * @param integer $languageId
     *
     * @return DDIDTO
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
     * @param integer $queueId
     *
     * @return DDIDTO
     */
    public function setQueueId($queueId)
    {
        $this->queueId = $queueId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * @return \Core\Domain\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param integer $externalCallFilterId
     *
     * @return DDIDTO
     */
    public function setExternalCallFilterId($externalCallFilterId)
    {
        $this->externalCallFilterId = $externalCallFilterId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExternalCallFilterId()
    {
        return $this->externalCallFilterId;
    }

    /**
     * @return \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getExternalCallFilter()
    {
        return $this->externalCallFilter;
    }

    /**
     * @param integer $userId
     *
     * @return DDIDTO
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param integer $iVRCommonId
     *
     * @return DDIDTO
     */
    public function setIVRCommonId($iVRCommonId)
    {
        $this->IVRCommonId = $iVRCommonId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIVRCommonId()
    {
        return $this->IVRCommonId;
    }

    /**
     * @return \Core\Domain\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon()
    {
        return $this->IVRCommon;
    }

    /**
     * @param integer $iVRCustomId
     *
     * @return DDIDTO
     */
    public function setIVRCustomId($iVRCustomId)
    {
        $this->IVRCustomId = $iVRCustomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIVRCustomId()
    {
        return $this->IVRCustomId;
    }

    /**
     * @return \Core\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * @param integer $huntGroupId
     *
     * @return DDIDTO
     */
    public function setHuntGroupId($huntGroupId)
    {
        $this->huntGroupId = $huntGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHuntGroupId()
    {
        return $this->huntGroupId;
    }

    /**
     * @return \Core\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * @param integer $faxId
     *
     * @return DDIDTO
     */
    public function setFaxId($faxId)
    {
        $this->faxId = $faxId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFaxId()
    {
        return $this->faxId;
    }

    /**
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return DDIDTO
     */
    public function setPeeringContractId($peeringContractId)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @return \Core\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }

    /**
     * @param integer $countryId
     *
     * @return DDIDTO
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @return \Core\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }
}

