<?php

namespace Core\Domain\Model\Extension;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ExtensionDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $routeType;

    /**
     * @var string
     */
    public $numberValue;

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
    public $conferenceRoomId;

    /**
     * @var mixed
     */
    public $userId;

    /**
     * @var mixed
     */
    public $queueId;

    /**
     * @var mixed
     */
    public $company;

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
    public $conferenceRoom;

    /**
     * @var mixed
     */
    public $user;

    /**
     * @var mixed
     */
    public $queue;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'friendValue' => $this->getFriendValue(),
            'companyId' => $this->getCompanyId(),
            'iVRCommonId' => $this->getIVRCommonId(),
            'iVRCustomId' => $this->getIVRCustomId(),
            'huntGroupId' => $this->getHuntGroupId(),
            'conferenceRoomId' => $this->getConferenceRoomId(),
            'userId' => $this->getUserId(),
            'queueId' => $this->getQueueId()
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
            ->setNumber(isset($data['number']) ? $data['number'] : null)
            ->setRouteType(isset($data['routeType']) ? $data['routeType'] : null)
            ->setNumberValue(isset($data['numberValue']) ? $data['numberValue'] : null)
            ->setFriendValue(isset($data['friendValue']) ? $data['friendValue'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setIVRCommonId(isset($data['IVRCommonId']) ? $data['IVRCommonId'] : null)
            ->setIVRCustomId(isset($data['IVRCustomId']) ? $data['IVRCustomId'] : null)
            ->setHuntGroupId(isset($data['huntGroupId']) ? $data['huntGroupId'] : null)
            ->setConferenceRoomId(isset($data['conferenceRoomId']) ? $data['conferenceRoomId'] : null)
            ->setUserId(isset($data['userId']) ? $data['userId'] : null)
            ->setQueueId(isset($data['queueId']) ? $data['queueId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->iVRCommon = $transformer->transform('Core\\Model\\IVRCommon\\IVRCommon', $this->getIVRCommonId());
        $this->iVRCustom = $transformer->transform('Core\\Model\\IVRCustom\\IVRCustom', $this->getIVRCustomId());
        $this->huntGroup = $transformer->transform('Core\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->conferenceRoom = $transformer->transform('Core\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->user = $transformer->transform('Core\\Model\\User\\User', $this->getUserId());
        $this->queue = $transformer->transform('Core\\Model\\Queue\\Queue', $this->getQueueId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ExtensionDTO
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
     * @param string $number
     *
     * @return ExtensionDTO
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $routeType
     *
     * @return ExtensionDTO
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
     * @param string $numberValue
     *
     * @return ExtensionDTO
     */
    public function setNumberValue($numberValue = null)
    {
        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * @param string $friendValue
     *
     * @return ExtensionDTO
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
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $iVRCommonId
     *
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\IVRCommon\IVRCommon
     */
    public function getIVRCommon()
    {
        return $this->IVRCommon;
    }

    /**
     * @param integer $iVRCustomId
     *
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\IVRCustom\IVRCustom
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * @param integer $huntGroupId
     *
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\HuntGroup\HuntGroup
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * @param integer $conferenceRoomId
     *
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\ConferenceRoom\ConferenceRoom
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * @param integer $userId
     *
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param integer $queueId
     *
     * @return ExtensionDTO
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
     * @return \Core\Domain\Model\Queue\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }
}

