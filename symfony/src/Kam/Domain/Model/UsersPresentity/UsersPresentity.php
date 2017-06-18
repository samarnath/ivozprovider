<?php

namespace Kam\Domain\Model\UsersPresentity;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersPresentity
 */
class UsersPresentity
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $event;

    /**
     * @var string
     */
    protected $etag;

    /**
     * @var integer
     */
    protected $expires;

    /**
     * @column received_time
     * @var integer
     */
    protected $receivedTime;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var string
     */
    protected $sender;

    /**
     * @var integer
     */
    protected $priority = '0';


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $username,
        $domain,
        $event,
        $etag,
        $expires,
        $receivedTime,
        $body,
        $sender,
        $priority
    ) {
        $this->setUsername($username);
        $this->setDomain($domain);
        $this->setEvent($event);
        $this->setEtag($etag);
        $this->setExpires($expires);
        $this->setReceivedTime($receivedTime);
        $this->setBody($body);
        $this->setSender($sender);
        $this->setPriority($priority);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return UsersPresentityDTO
     */
    public static function createDTO()
    {
        return new UsersPresentityDTO();
    }

    /**
     * Factory method
     * @param UsersPresentityDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersPresentityDTO::class);

        $self = new self(
            $dto->getUsername(),
            $dto->getDomain(),
            $dto->getEvent(),
            $dto->getEtag(),
            $dto->getExpires(),
            $dto->getReceivedTime(),
            $dto->getBody(),
            $dto->getSender(),
            $dto->getPriority()
        );

        return $self;
    }

    /**
     * @param UsersPresentityDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersPresentityDTO::class);

        $this
            ->setUsername($dto->getUsername())
            ->setDomain($dto->getDomain())
            ->setEvent($dto->getEvent())
            ->setEtag($dto->getEtag())
            ->setExpires($dto->getExpires())
            ->setReceivedTime($dto->getReceivedTime())
            ->setBody($dto->getBody())
            ->setSender($dto->getSender())
            ->setPriority($dto->getPriority());


        return $this;
    }

    /**
     * @return UsersPresentityDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setUsername($this->getUsername())
            ->setDomain($this->getDomain())
            ->setEvent($this->getEvent())
            ->setEtag($this->getEtag())
            ->setExpires($this->getExpires())
            ->setReceivedTime($this->getReceivedTime())
            ->setBody($this->getBody())
            ->setSender($this->getSender())
            ->setPriority($this->getPriority());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'domain' => $this->getDomain(),
            'event' => $this->getEvent(),
            'etag' => $this->getEtag(),
            'expires' => $this->getExpires(),
            'receivedTime' => $this->getReceivedTime(),
            'body' => $this->getBody(),
            'sender' => $this->getSender(),
            'priority' => $this->getPriority()
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
     * Set username
     *
     * @param string $username
     *
     * @return UsersPresentity
     */
    protected function setUsername($username)
    {
        Assertion::notNull($username);
        Assertion::maxLength($username, 64);

        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return UsersPresentity
     */
    protected function setDomain($domain)
    {
        Assertion::notNull($domain);
        Assertion::maxLength($domain, 190);

        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set event
     *
     * @param string $event
     *
     * @return UsersPresentity
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
     * Set etag
     *
     * @param string $etag
     *
     * @return UsersPresentity
     */
    protected function setEtag($etag)
    {
        Assertion::notNull($etag);
        Assertion::maxLength($etag, 64);

        $this->etag = $etag;

        return $this;
    }

    /**
     * Get etag
     *
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return UsersPresentity
     */
    protected function setExpires($expires)
    {
        Assertion::notNull($expires);
        Assertion::integerish($expires);

        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set receivedTime
     *
     * @param integer $receivedTime
     *
     * @return UsersPresentity
     */
    protected function setReceivedTime($receivedTime)
    {
        Assertion::notNull($receivedTime);
        Assertion::integerish($receivedTime);

        $this->receivedTime = $receivedTime;

        return $this;
    }

    /**
     * Get receivedTime
     *
     * @return integer
     */
    public function getReceivedTime()
    {
        return $this->receivedTime;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return UsersPresentity
     */
    protected function setBody($body)
    {
        Assertion::notNull($body);

        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set sender
     *
     * @param string $sender
     *
     * @return UsersPresentity
     */
    protected function setSender($sender)
    {
        Assertion::notNull($sender);
        Assertion::maxLength($sender, 128);

        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return UsersPresentity
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

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



    // @codeCoverageIgnoreEnd
}

