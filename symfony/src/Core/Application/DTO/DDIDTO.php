<?php

namespace Core\Application\DTO;

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
    public $id;

    /**
     * @var string
     */
    public $ddi;

    /**
     * @var string
     */
    public $ddie164;

    /**
     * @var string
     */
    public $recordCalls = 'none';

    /**
     * @var string
     */
    public $displayName;

    /**
     * @var string
     */
    public $routeType;

    /**
     * @var boolean
     */
    public $billInboundCalls = '0';

    /**
     * @var string
     */
    public $friendValue;

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $brandId;

    /**
     * @var mixed
     */
    public $conferenceRoomId;

    /**
     * @var mixed
     */
    public $languageId;

    /**
     * @var mixed
     */
    public $queueId;

    /**
     * @var mixed
     */
    public $externalCallFilterId;

    /**
     * @var mixed
     */
    public $userId;

    /**
     * @var mixed
     */
    public $IVRCommonId;

    /**
     * @var mixed
     */
    public $IVRCustomId;

    /**
     * @var mixed
     */
    public $huntGroupId;

    /**
     * @var mixed
     */
    public $faxId;

    /**
     * @var mixed
     */
    public $peeringContractId;

    /**
     * @var mixed
     */
    public $countryId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $brand;

    /**
     * @var mixed
     */
    public $conferenceRoom;

    /**
     * @var mixed
     */
    public $language;

    /**
     * @var mixed
     */
    public $queue;

    /**
     * @var mixed
     */
    public $externalCallFilter;

    /**
     * @var mixed
     */
    public $user;

    /**
     * @var mixed
     */
    public $IVRCommon;

    /**
     * @var mixed
     */
    public $IVRCustom;

    /**
     * @var mixed
     */
    public $huntGroup;

    /**
     * @var mixed
     */
    public $fax;

    /**
     * @var mixed
     */
    public $peeringContract;

    /**
     * @var mixed
     */
    public $country;

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
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->brand = $transformer->transform('Core\\Model\\Brand\\Brand', $this->getBrandId());
        $this->conferenceRoom = $transformer->transform('Core\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->language = $transformer->transform('Core\\Model\\Language\\Language', $this->getLanguageId());
        $this->queue = $transformer->transform('Core\\Model\\Queue\\Queue', $this->getQueueId());
        $this->externalCallFilter = $transformer->transform('Core\\Model\\ExternalCallFilter\\ExternalCallFilter', $this->getExternalCallFilterId());
        $this->user = $transformer->transform('Core\\Model\\User\\User', $this->getUserId());
        $this->iVRCommon = $transformer->transform('Core\\Model\\IVRCommon\\IVRCommon', $this->getIVRCommonId());
        $this->iVRCustom = $transformer->transform('Core\\Model\\IVRCustom\\IVRCustom', $this->getIVRCustomId());
        $this->huntGroup = $transformer->transform('Core\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->fax = $transformer->transform('Core\\Model\\Fax\\Fax', $this->getFaxId());
        $this->peeringContract = $transformer->transform('Core\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
        $this->country = $transformer->transform('Core\\Model\\Country\\Country', $this->getCountryId());
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
     * @return \Core\Model\Company\Company
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
     * @return \Core\Model\Brand\Brand
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
     * @return \Core\Model\ConferenceRoom\ConferenceRoom
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
     * @return \Core\Model\Language\Language
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
     * @return \Core\Model\Queue\Queue
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
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilter
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
     * @return \Core\Model\User\User
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
     * @return \Core\Model\IVRCommon\IVRCommon
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
     * @return \Core\Model\IVRCustom\IVRCustom
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
     * @return \Core\Model\HuntGroup\HuntGroup
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
     * @return \Core\Model\Fax\Fax
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
     * @return \Core\Model\PeeringContract\PeeringContract
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
     * @return \Core\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}

