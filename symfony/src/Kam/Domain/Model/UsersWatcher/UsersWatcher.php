<?php

namespace Kam\Domain\Model\UsersWatcher;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersWatcher
 */
class UsersWatcher
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @column presentity_uri
     * @var string
     */
    protected $presentityUri;

    /**
     * @column watcher_username
     * @var string
     */
    protected $watcherUsername;

    /**
     * @column watcher_domain
     * @var string
     */
    protected $watcherDomain;

    /**
     * @var string
     */
    protected $event = 'presence';

    /**
     * @var integer
     */
    protected $status;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @column inserted_time
     * @var integer
     */
    protected $insertedTime;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $presentityUri,
        $watcherUsername,
        $watcherDomain,
        $event,
        $status,
        $insertedTime
    ) {
        $this->setPresentityUri($presentityUri);
        $this->setWatcherUsername($watcherUsername);
        $this->setWatcherDomain($watcherDomain);
        $this->setEvent($event);
        $this->setStatus($status);
        $this->setInsertedTime($insertedTime);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return UsersWatcherDTO
     */
    public static function createDTO()
    {
        return new UsersWatcherDTO();
    }

    /**
     * Factory method
     * @param UsersWatcherDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersWatcherDTO::class);

        $self = new self(
            $dto->getPresentityUri(),
            $dto->getWatcherUsername(),
            $dto->getWatcherDomain(),
            $dto->getEvent(),
            $dto->getStatus(),
            $dto->getInsertedTime()
        );

        return $self
            ->setReason($dto->getReason());
    }

    /**
     * @param UsersWatcherDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersWatcherDTO::class);

        $this
            ->setPresentityUri($dto->getPresentityUri())
            ->setWatcherUsername($dto->getWatcherUsername())
            ->setWatcherDomain($dto->getWatcherDomain())
            ->setEvent($dto->getEvent())
            ->setStatus($dto->getStatus())
            ->setReason($dto->getReason())
            ->setInsertedTime($dto->getInsertedTime());


        return $this;
    }

    /**
     * @return UsersWatcherDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setPresentityUri($this->getPresentityUri())
            ->setWatcherUsername($this->getWatcherUsername())
            ->setWatcherDomain($this->getWatcherDomain())
            ->setEvent($this->getEvent())
            ->setStatus($this->getStatus())
            ->setReason($this->getReason())
            ->setInsertedTime($this->getInsertedTime());
    }

    /**
     * @return array
     */
    protected function __toArray()
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
     * Set presentityUri
     *
     * @param string $presentityUri
     *
     * @return UsersWatcher
     */
    protected function setPresentityUri($presentityUri)
    {
        Assertion::notNull($presentityUri);
        Assertion::maxLength($presentityUri, 128);

        $this->presentityUri = $presentityUri;

        return $this;
    }

    /**
     * Get presentityUri
     *
     * @return string
     */
    public function getPresentityUri()
    {
        return $this->presentityUri;
    }

    /**
     * Set watcherUsername
     *
     * @param string $watcherUsername
     *
     * @return UsersWatcher
     */
    protected function setWatcherUsername($watcherUsername)
    {
        Assertion::notNull($watcherUsername);
        Assertion::maxLength($watcherUsername, 64);

        $this->watcherUsername = $watcherUsername;

        return $this;
    }

    /**
     * Get watcherUsername
     *
     * @return string
     */
    public function getWatcherUsername()
    {
        return $this->watcherUsername;
    }

    /**
     * Set watcherDomain
     *
     * @param string $watcherDomain
     *
     * @return UsersWatcher
     */
    protected function setWatcherDomain($watcherDomain)
    {
        Assertion::notNull($watcherDomain);
        Assertion::maxLength($watcherDomain, 190);

        $this->watcherDomain = $watcherDomain;

        return $this;
    }

    /**
     * Get watcherDomain
     *
     * @return string
     */
    public function getWatcherDomain()
    {
        return $this->watcherDomain;
    }

    /**
     * Set event
     *
     * @param string $event
     *
     * @return UsersWatcher
     */
    protected function setEvent($event)
    {
        Assertion::notNull($event);
        Assertion::maxLength($event, 64);

        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return UsersWatcher
     */
    protected function setStatus($status)
    {
        Assertion::notNull($status);
        Assertion::integerish($status);

        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return UsersWatcher
     */
    protected function setReason($reason = null)
    {
        if (!is_null($reason)) {
            Assertion::maxLength($reason, 64);
        }

        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set insertedTime
     *
     * @param integer $insertedTime
     *
     * @return UsersWatcher
     */
    protected function setInsertedTime($insertedTime)
    {
        Assertion::notNull($insertedTime);
        Assertion::integerish($insertedTime);

        $this->insertedTime = $insertedTime;

        return $this;
    }

    /**
     * Get insertedTime
     *
     * @return integer
     */
    public function getInsertedTime()
    {
        return $this->insertedTime;
    }



    // @codeCoverageIgnoreEnd
}

