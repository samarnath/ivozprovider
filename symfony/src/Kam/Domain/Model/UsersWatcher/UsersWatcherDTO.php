<?php

namespace Kam\Domain\Model\UsersWatcher;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersWatcherDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column presentity_uri
     * @var string
     */
    public $presentityUri;

    /**
     * @column watcher_username
     * @var string
     */
    public $watcherUsername;

    /**
     * @column watcher_domain
     * @var string
     */
    public $watcherDomain;

    /**
     * @var string
     */
    public $event = 'presence';

    /**
     * @var integer
     */
    public $status;

    /**
     * @var string
     */
    public $reason;

    /**
     * @column inserted_time
     * @var integer
     */
    public $insertedTime;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'presentityUri' => $this->getPresentityUri(),
            'watcherUsername' => $this->getWatcherUsername(),
            'watcherDomain' => $this->getWatcherDomain(),
            'event' => $this->getEvent(),
            'status' => $this->getStatus(),
            'reason' => $this->getReason(),
            'insertedTime' => $this->getInsertedTime()
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
            ->setPresentityUri(isset($data['presentityUri']) ? $data['presentityUri'] : null)
            ->setWatcherUsername(isset($data['watcherUsername']) ? $data['watcherUsername'] : null)
            ->setWatcherDomain(isset($data['watcherDomain']) ? $data['watcherDomain'] : null)
            ->setEvent(isset($data['event']) ? $data['event'] : null)
            ->setStatus(isset($data['status']) ? $data['status'] : null)
            ->setReason(isset($data['reason']) ? $data['reason'] : null)
            ->setInsertedTime(isset($data['insertedTime']) ? $data['insertedTime'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return UsersWatcherDTO
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
     * @param string $presentityUri
     *
     * @return UsersWatcherDTO
     */
    public function setPresentityUri($presentityUri)
    {
        $this->presentityUri = $presentityUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getPresentityUri()
    {
        return $this->presentityUri;
    }

    /**
     * @param string $watcherUsername
     *
     * @return UsersWatcherDTO
     */
    public function setWatcherUsername($watcherUsername)
    {
        $this->watcherUsername = $watcherUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getWatcherUsername()
    {
        return $this->watcherUsername;
    }

    /**
     * @param string $watcherDomain
     *
     * @return UsersWatcherDTO
     */
    public function setWatcherDomain($watcherDomain)
    {
        $this->watcherDomain = $watcherDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getWatcherDomain()
    {
        return $this->watcherDomain;
    }

    /**
     * @param string $event
     *
     * @return UsersWatcherDTO
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param integer $status
     *
     * @return UsersWatcherDTO
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $reason
     *
     * @return UsersWatcherDTO
     */
    public function setReason($reason = null)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param integer $insertedTime
     *
     * @return UsersWatcherDTO
     */
    public function setInsertedTime($insertedTime)
    {
        $this->insertedTime = $insertedTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInsertedTime()
    {
        return $this->insertedTime;
    }
}

