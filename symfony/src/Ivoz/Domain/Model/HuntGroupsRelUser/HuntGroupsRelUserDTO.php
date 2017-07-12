<?php

namespace Ivoz\Domain\Model\HuntGroupsRelUser;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class HuntGroupsRelUserDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $timeoutTime;

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $huntGroup;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'timeoutTime' => $this->getTimeoutTime(),
            'priority' => $this->getPriority(),
            'id' => $this->getId(),
            'huntGroupId' => $this->getHuntGroupId(),
            'userId' => $this->getUserId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->huntGroup = $transformer->transform('Ivoz\\Domain\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->user = $transformer->transform('Ivoz\\Domain\\Model\\User\\User', $this->getUserId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $timeoutTime
     *
     * @return HuntGroupsRelUserDTO
     */
    public function setTimeoutTime($timeoutTime = null)
    {
        $this->timeoutTime = $timeoutTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutTime()
    {
        return $this->timeoutTime;
    }

    /**
     * @param integer $priority
     *
     * @return HuntGroupsRelUserDTO
     */
    public function setPriority($priority = null)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param integer $id
     *
     * @return HuntGroupsRelUserDTO
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
     * @param integer $huntGroupId
     *
     * @return HuntGroupsRelUserDTO
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
     * @return \Ivoz\Domain\Model\HuntGroup\HuntGroup
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * @param integer $userId
     *
     * @return HuntGroupsRelUserDTO
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
     * @return \Ivoz\Domain\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

