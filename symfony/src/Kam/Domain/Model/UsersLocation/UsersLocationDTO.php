<?php

namespace Kam\Domain\Model\UsersLocation;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersLocationDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $ruid = '';

    /**
     * @var string
     */
    public $username = '';

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $contact = '';

    /**
     * @var string
     */
    public $received;

    /**
     * @var string
     */
    public $path;

    /**
     * @var \DateTime
     */
    public $expires = '2030-05-28 21:32:15';

    /**
     * @var float
     */
    public $q = '1.00';

    /**
     * @var string
     */
    public $callid = 'Default-Call-ID';

    /**
     * @var integer
     */
    public $cseq = '1';

    /**
     * @column last_modified
     * @var \DateTime
     */
    public $lastModified = '1900-01-01 00:00:01';

    /**
     * @var integer
     */
    public $flags = '0';

    /**
     * @var integer
     */
    public $cflags = '0';

    /**
     * @column user_agent
     * @var string
     */
    public $userAgent = '';

    /**
     * @var string
     */
    public $socket;

    /**
     * @var integer
     */
    public $methods;

    /**
     * @var string
     */
    public $instance;

    /**
     * @column reg_id
     * @var integer
     */
    public $regId = '0';

    /**
     * @column server_id
     * @var integer
     */
    public $serverId = '0';

    /**
     * @column connection_id
     * @var integer
     */
    public $connectionId = '0';

    /**
     * @var integer
     */
    public $keepalive = '0';

    /**
     * @var integer
     */
    public $partition = '0';

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'ruid' => $this->getRuid(),
            'username' => $this->getUsername(),
            'domain' => $this->getDomain(),
            'contact' => $this->getContact(),
            'received' => $this->getReceived(),
            'path' => $this->getPath(),
            'expires' => $this->getExpires(),
            'q' => $this->getQ(),
            'callid' => $this->getCallid(),
            'cseq' => $this->getCseq(),
            'lastModified' => $this->getLastModified(),
            'flags' => $this->getFlags(),
            'cflags' => $this->getCflags(),
            'userAgent' => $this->getUserAgent(),
            'socket' => $this->getSocket(),
            'methods' => $this->getMethods(),
            'instance' => $this->getInstance(),
            'regId' => $this->getRegId(),
            'serverId' => $this->getServerId(),
            'connectionId' => $this->getConnectionId(),
            'keepalive' => $this->getKeepalive(),
            'partition' => $this->getPartition()
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
            ->setRuid(isset($data['ruid']) ? $data['ruid'] : null)
            ->setUsername(isset($data['username']) ? $data['username'] : null)
            ->setDomain(isset($data['domain']) ? $data['domain'] : null)
            ->setContact(isset($data['contact']) ? $data['contact'] : null)
            ->setReceived(isset($data['received']) ? $data['received'] : null)
            ->setPath(isset($data['path']) ? $data['path'] : null)
            ->setExpires(isset($data['expires']) ? $data['expires'] : null)
            ->setQ(isset($data['q']) ? $data['q'] : null)
            ->setCallid(isset($data['callid']) ? $data['callid'] : null)
            ->setCseq(isset($data['cseq']) ? $data['cseq'] : null)
            ->setLastModified(isset($data['lastModified']) ? $data['lastModified'] : null)
            ->setFlags(isset($data['flags']) ? $data['flags'] : null)
            ->setCflags(isset($data['cflags']) ? $data['cflags'] : null)
            ->setUserAgent(isset($data['userAgent']) ? $data['userAgent'] : null)
            ->setSocket(isset($data['socket']) ? $data['socket'] : null)
            ->setMethods(isset($data['methods']) ? $data['methods'] : null)
            ->setInstance(isset($data['instance']) ? $data['instance'] : null)
            ->setRegId(isset($data['regId']) ? $data['regId'] : null)
            ->setServerId(isset($data['serverId']) ? $data['serverId'] : null)
            ->setConnectionId(isset($data['connectionId']) ? $data['connectionId'] : null)
            ->setKeepalive(isset($data['keepalive']) ? $data['keepalive'] : null)
            ->setPartition(isset($data['partition']) ? $data['partition'] : null);
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
     * @return UsersLocationDTO
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
     * @param string $ruid
     *
     * @return UsersLocationDTO
     */
    public function setRuid($ruid)
    {
        $this->ruid = $ruid;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuid()
    {
        return $this->ruid;
    }

    /**
     * @param string $username
     *
     * @return UsersLocationDTO
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
     * @return UsersLocationDTO
     */
    public function setDomain($domain = null)
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
     * @param string $contact
     *
     * @return UsersLocationDTO
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param string $received
     *
     * @return UsersLocationDTO
     */
    public function setReceived($received = null)
    {
        $this->received = $received;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * @param string $path
     *
     * @return UsersLocationDTO
     */
    public function setPath($path = null)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param \DateTime $expires
     *
     * @return UsersLocationDTO
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param float $q
     *
     * @return UsersLocationDTO
     */
    public function setQ($q)
    {
        $this->q = $q;

        return $this;
    }

    /**
     * @return float
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * @param string $callid
     *
     * @return UsersLocationDTO
     */
    public function setCallid($callid)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param integer $cseq
     *
     * @return UsersLocationDTO
     */
    public function setCseq($cseq)
    {
        $this->cseq = $cseq;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCseq()
    {
        return $this->cseq;
    }

    /**
     * @param \DateTime $lastModified
     *
     * @return UsersLocationDTO
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param integer $flags
     *
     * @return UsersLocationDTO
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $cflags
     *
     * @return UsersLocationDTO
     */
    public function setCflags($cflags)
    {
        $this->cflags = $cflags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCflags()
    {
        return $this->cflags;
    }

    /**
     * @param string $userAgent
     *
     * @return UsersLocationDTO
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $socket
     *
     * @return UsersLocationDTO
     */
    public function setSocket($socket = null)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * @return string
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * @param integer $methods
     *
     * @return UsersLocationDTO
     */
    public function setMethods($methods = null)
    {
        $this->methods = $methods;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @param string $instance
     *
     * @return UsersLocationDTO
     */
    public function setInstance($instance = null)
    {
        $this->instance = $instance;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @param integer $regId
     *
     * @return UsersLocationDTO
     */
    public function setRegId($regId)
    {
        $this->regId = $regId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRegId()
    {
        return $this->regId;
    }

    /**
     * @param integer $serverId
     *
     * @return UsersLocationDTO
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * @param integer $connectionId
     *
     * @return UsersLocationDTO
     */
    public function setConnectionId($connectionId)
    {
        $this->connectionId = $connectionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConnectionId()
    {
        return $this->connectionId;
    }

    /**
     * @param integer $keepalive
     *
     * @return UsersLocationDTO
     */
    public function setKeepalive($keepalive)
    {
        $this->keepalive = $keepalive;

        return $this;
    }

    /**
     * @return integer
     */
    public function getKeepalive()
    {
        return $this->keepalive;
    }

    /**
     * @param integer $partition
     *
     * @return UsersLocationDTO
     */
    public function setPartition($partition)
    {
        $this->partition = $partition;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPartition()
    {
        return $this->partition;
    }
}

