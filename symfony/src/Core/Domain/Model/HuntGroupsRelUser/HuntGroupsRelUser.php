<?php

namespace Core\Domain\Model\HuntGroupsRelUser;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * HuntGroupsRelUser
 */
class HuntGroupsRelUser implements EntityInterface, HuntGroupsRelUserInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $timeoutTime;

    /**
     * @var integer
     */
    protected $priority;

    /**
     * @var \Core\Domain\Model\HuntGroup\HuntGroupInterface
     */
    protected $huntGroup;

    /**
     * @var \Core\Domain\Model\User\UserInterface
     */
    protected $user;


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

    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return HuntGroupsRelUserDTO
     */
    public static function createDTO()
    {
        return new HuntGroupsRelUserDTO();
    }

    /**
     * Factory method
     * @param HuntGroupsRelUserDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, HuntGroupsRelUserDTO::class);

        $self = new self();

        return $self
            ->setTimeoutTime($dto->getTimeoutTime())
            ->setPriority($dto->getPriority())
            ->setHuntGroup($dto->getHuntGroup())
            ->setUser($dto->getUser());
    }

    /**
     * @param HuntGroupsRelUserDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, HuntGroupsRelUserDTO::class);

        $this
            ->setTimeoutTime($dto->getTimeoutTime())
            ->setPriority($dto->getPriority())
            ->setHuntGroup($dto->getHuntGroup())
            ->setUser($dto->getUser());


        return $this;
    }

    /**
     * @return HuntGroupsRelUserDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setTimeoutTime($this->getTimeoutTime())
            ->setPriority($this->getPriority())
            ->setHuntGroupId($this->getHuntGroup() ? $this->getHuntGroup()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'timeoutTime' => $this->getTimeoutTime(),
            'priority' => $this->getPriority(),
            'huntGroupId' => $this->getHuntGroup() ? $this->getHuntGroup()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
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
     * Set timeoutTime
     *
     * @param integer $timeoutTime
     *
     * @return HuntGroupsRelUser
     */
    protected function setTimeoutTime($timeoutTime = null)
    {
        if (!is_null($timeoutTime)) {
            if (!is_null($timeoutTime)) {
                Assertion::integerish($timeoutTime);
            }
        }

        $this->timeoutTime = $timeoutTime;

        return $this;
    }

    /**
     * Get timeoutTime
     *
     * @return integer
     */
    public function getTimeoutTime()
    {
        return $this->timeoutTime;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return HuntGroupsRelUser
     */
    protected function setPriority($priority = null)
    {
        if (!is_null($priority)) {
            if (!is_null($priority)) {
                Assertion::integerish($priority);
            }
        }

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set huntGroup
     *
     * @param \Core\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return HuntGroupsRelUser
     */
    protected function setHuntGroup(\Core\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup)
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
     * Set user
     *
     * @param \Core\Domain\Model\User\UserInterface $user
     *
     * @return HuntGroupsRelUser
     */
    protected function setUser(\Core\Domain\Model\User\UserInterface $user)
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



    // @codeCoverageIgnoreEnd
}

