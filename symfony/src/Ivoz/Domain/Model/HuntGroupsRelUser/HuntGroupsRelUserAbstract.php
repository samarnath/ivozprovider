<?php

namespace Ivoz\Domain\Model\HuntGroupsRelUser;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * HuntGroupsRelUserAbstract
 */
abstract class HuntGroupsRelUserAbstract
{
    /**
     * @var integer
     */
    protected $timeoutTime;

    /**
     * @var integer
     */
    protected $priority;

    /**
     * @var \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface
     */
    protected $huntGroup;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
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

    abstract public function __wakeup();

    /**
     * @return HuntGroupsRelUserDTO
     */
    public static function createDTO()
    {
        return new HuntGroupsRelUserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HuntGroupsRelUserDTO
         */
        Assertion::isInstanceOf($dto, HuntGroupsRelUserDTO::class);

        $self = new static();

        return $self
            ->setTimeoutTime($dto->getTimeoutTime())
            ->setPriority($dto->getPriority())
            ->setHuntGroup($dto->getHuntGroup())
            ->setUser($dto->getUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HuntGroupsRelUserDTO
         */
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
            'timeoutTime' => $this->getTimeoutTime(),
            'priority' => $this->getPriority(),
            'huntGroupId' => $this->getHuntGroup() ? $this->getHuntGroup()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set timeoutTime
     *
     * @param integer $timeoutTime
     *
     * @return self
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
     * @return self
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
     * @param \Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return self
     */
    protected function setHuntGroup(\Ivoz\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup)
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
     * Set user
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    protected function setUser(\Ivoz\Domain\Model\User\UserInterface $user)
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



    // @codeCoverageIgnoreEnd
}

