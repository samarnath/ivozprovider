<?php

namespace Kam\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamUsersPresentityDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $event;

    /**
     * @var string
     */
    public $etag;

    /**
     * @var integer
     */
    public $expires;

    /**
     * @column received_time
     * @var integer
     */
    public $receivedTime;

    /**
     * @var string
     */
    public $body;

    /**
     * @var string
     */
    public $sender;

    /**
     * @var integer
     */
    public $priority = '0';

    /**
     * @return array
     */
    public function __toArray()
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

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setUsername(isset($data['username']) ? $data['username'] : null)
            ->setDomain(isset($data['domain']) ? $data['domain'] : null)
            ->setEvent(isset($data['event']) ? $data['event'] : null)
            ->setEtag(isset($data['etag']) ? $data['etag'] : null)
            ->setExpires(isset($data['expires']) ? $data['expires'] : null)
            ->setReceivedTime(isset($data['receivedTime']) ? $data['receivedTime'] : null)
            ->setBody(isset($data['body']) ? $data['body'] : null)
            ->setSender(isset($data['sender']) ? $data['sender'] : null)
            ->setPriority(isset($data['priority']) ? $data['priority'] : null);
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
     * @return KamUsersPresentityDTO
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
     * @param string $username
     *
     * @return KamUsersPresentityDTO
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $domain
     *
     * @return KamUsersPresentityDTO
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $event
     *
     * @return KamUsersPresentityDTO
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
     * @param string $etag
     *
     * @return KamUsersPresentityDTO
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;

        return $this;
    }

    /**
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param integer $expires
     *
     * @return KamUsersPresentityDTO
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param integer $receivedTime
     *
     * @return KamUsersPresentityDTO
     */
    public function setReceivedTime($receivedTime)
    {
        $this->receivedTime = $receivedTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getReceivedTime()
    {
        return $this->receivedTime;
    }

    /**
     * @param string $body
     *
     * @return KamUsersPresentityDTO
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $sender
     *
     * @return KamUsersPresentityDTO
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param integer $priority
     *
     * @return KamUsersPresentityDTO
     */
    public function setPriority($priority)
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
}

