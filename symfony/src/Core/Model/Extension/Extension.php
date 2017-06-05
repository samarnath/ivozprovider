<?php

namespace Core\Model\Extension;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Extension
 */
class Extension implements EntityInterface, ExtensionInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $number;

    /**
     * @comment enum:user|number|IVRCommon|IVRCustom|huntGroup|conferenceRoom|friend|queue
     * @var string
     */
    protected $routeType;

    /**
     * @var string
     */
    protected $numberValue;

    /**
     * @var string
     */
    protected $friendValue;

    /**
     * @var \Core\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Core\Model\IVRCommon\IVRCommonInterface
     */
    protected $IVRCommon;

    /**
     * @var \Core\Model\IVRCustom\IVRCustomInterface
     */
    protected $IVRCustom;

    /**
     * @var \Core\Model\HuntGroup\HuntGroupInterface
     */
    protected $huntGroup;

    /**
     * @var \Core\Model\ConferenceRoom\ConferenceRoomInterface
     */
    protected $conferenceRoom;

    /**
     * @var \Core\Model\User\UserInterface
     */
    protected $user;

    /**
     * @var \Core\Model\Queue\QueueInterface
     */
    protected $queue;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($number)
    {
        $this->setNumber($number);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return ExtensionDTO
     */
    public static function createDTO()
    {
        return new ExtensionDTO();
    }

    /**
     * Factory method
     * @param ExtensionDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExtensionDTO::class);

        $self = new self(
            $dto->getNumber()
        );

        return $self
            ->setRouteType($dto->getRouteType())
            ->setNumberValue($dto->getNumberValue())
            ->setFriendValue($dto->getFriendValue())
            ->setCompany($dto->getCompany())
            ->setIVRCommon($dto->getIVRCommon())
            ->setIVRCustom($dto->getIVRCustom())
            ->setHuntGroup($dto->getHuntGroup())
            ->setConferenceRoom($dto->getConferenceRoom())
            ->setUser($dto->getUser())
            ->setQueue($dto->getQueue());
    }

    /**
     * @param ExtensionDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExtensionDTO::class);

        $this
            ->setNumber($dto->getNumber())
            ->setRouteType($dto->getRouteType())
            ->setNumberValue($dto->getNumberValue())
            ->setFriendValue($dto->getFriendValue())
            ->setCompany($dto->getCompany())
            ->setIVRCommon($dto->getIVRCommon())
            ->setIVRCustom($dto->getIVRCustom())
            ->setHuntGroup($dto->getHuntGroup())
            ->setConferenceRoom($dto->getConferenceRoom())
            ->setUser($dto->getUser())
            ->setQueue($dto->getQueue());


        return $this;
    }

    /**
     * @return ExtensionDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setNumber($this->getNumber())
            ->setRouteType($this->getRouteType())
            ->setNumberValue($this->getNumberValue())
            ->setFriendValue($this->getFriendValue())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setIVRCommonId($this->getIVRCommon() ? $this->getIVRCommon()->getId() : null)
            ->setIVRCustomId($this->getIVRCustom() ? $this->getIVRCustom()->getId() : null)
            ->setHuntGroupId($this->getHuntGroup() ? $this->getHuntGroup()->getId() : null)
            ->setConferenceRoomId($this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null)
            ->setQueueId($this->getQueue() ? $this->getQueue()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'number' => $this->getNumber(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'friendValue' => $this->getFriendValue(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'iVRCommonId' => $this->getIVRCommon() ? $this->getIVRCommon()->getId() : null,
            'iVRCustomId' => $this->getIVRCustom() ? $this->getIVRCustom()->getId() : null,
            'huntGroupId' => $this->getHuntGroup() ? $this->getHuntGroup()->getId() : null,
            'conferenceRoomId' => $this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null,
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null
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
     * Set number
     *
     * @param string $number
     *
     * @return Extension
     */
    protected function setNumber($number)
    {
        Assertion::notNull($number);
        Assertion::maxLength($number, 10);

        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set routeType
     *
     * @param string $routeType
     *
     * @return Extension
     */
    protected function setRouteType($routeType = null)
    {
        if (!is_null($routeType)) {
            Assertion::maxLength($routeType, 25);
        Assertion::choice($routeType, array (
          0 => '    user',
          1 => '    number',
          2 => '    IVRCommon',
          3 => '    IVRCustom',
          4 => '    huntGroup',
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
     * Set numberValue
     *
     * @param string $numberValue
     *
     * @return Extension
     */
    protected function setNumberValue($numberValue = null)
    {
        if (!is_null($numberValue)) {
            Assertion::maxLength($numberValue, 25);
        }

        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * Set friendValue
     *
     * @param string $friendValue
     *
     * @return Extension
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
     * @param \Core\Model\Company\CompanyInterface $company
     *
     * @return Extension
     */
    protected function setCompany(\Core\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set iVRCommon
     *
     * @param \Core\Model\IVRCommon\IVRCommonInterface $iVRCommon
     *
     * @return Extension
     */
    protected function setIVRCommon(\Core\Model\IVRCommon\IVRCommonInterface $iVRCommon = null)
    {
        $this->IVRCommon = $iVRCommon;

        return $this;
    }

    /**
     * Get iVRCommon
     *
     * @return \Core\Model\IVRCommon\IVRCommonInterface
     */
    public function getIVRCommon()
    {
        return $this->IVRCommon;
    }

    /**
     * Set iVRCustom
     *
     * @param \Core\Model\IVRCustom\IVRCustomInterface $iVRCustom
     *
     * @return Extension
     */
    protected function setIVRCustom(\Core\Model\IVRCustom\IVRCustomInterface $iVRCustom = null)
    {
        $this->IVRCustom = $iVRCustom;

        return $this;
    }

    /**
     * Get iVRCustom
     *
     * @return \Core\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * Set huntGroup
     *
     * @param \Core\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return Extension
     */
    protected function setHuntGroup(\Core\Model\HuntGroup\HuntGroupInterface $huntGroup = null)
    {
        $this->huntGroup = $huntGroup;

        return $this;
    }

    /**
     * Get huntGroup
     *
     * @return \Core\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * Set conferenceRoom
     *
     * @param \Core\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom
     *
     * @return Extension
     */
    protected function setConferenceRoom(\Core\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom = null)
    {
        $this->conferenceRoom = $conferenceRoom;

        return $this;
    }

    /**
     * Get conferenceRoom
     *
     * @return \Core\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * Set user
     *
     * @param \Core\Model\User\UserInterface $user
     *
     * @return Extension
     */
    protected function setUser(\Core\Model\User\UserInterface $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set queue
     *
     * @param \Core\Model\Queue\QueueInterface $queue
     *
     * @return Extension
     */
    protected function setQueue(\Core\Model\Queue\QueueInterface $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Core\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }



    // @codeCoverageIgnoreEnd
}

