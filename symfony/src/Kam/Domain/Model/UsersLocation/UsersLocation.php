<?php

namespace Kam\Domain\Model\UsersLocation;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersLocation
 */
class UsersLocation
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $ruid = '';

    /**
     * @var string
     */
    protected $username = '';

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $contact = '';

    /**
     * @var string
     */
    protected $received;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var \DateTime
     */
    protected $expires = '2030-05-28 21:32:15';

    /**
     * @var float
     */
    protected $q = '1.00';

    /**
     * @var string
     */
    protected $callid = 'Default-Call-ID';

    /**
     * @var integer
     */
    protected $cseq = '1';

    /**
     * @column last_modified
     * @var \DateTime
     */
    protected $lastModified = '1900-01-01 00:00:01';

    /**
     * @var integer
     */
    protected $flags = '0';

    /**
     * @var integer
     */
    protected $cflags = '0';

    /**
     * @column user_agent
     * @var string
     */
    protected $userAgent = '';

    /**
     * @var string
     */
    protected $socket;

    /**
     * @var integer
     */
    protected $methods;

    /**
     * @var string
     */
    protected $instance;

    /**
     * @column reg_id
     * @var integer
     */
    protected $regId = '0';

    /**
     * @column server_id
     * @var integer
     */
    protected $serverId = '0';

    /**
     * @column connection_id
     * @var integer
     */
    protected $connectionId = '0';

    /**
     * @var integer
     */
    protected $keepalive = '0';

    /**
     * @var integer
     */
    protected $partition = '0';


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $ruid,
        $username,
        $contact,
        $expires,
        $q,
        $callid,
        $cseq,
        $lastModified,
        $flags,
        $cflags,
        $userAgent,
        $regId,
        $serverId,
        $connectionId,
        $keepalive,
        $partition
    ) {
        $this->setRuid($ruid);
        $this->setUsername($username);
        $this->setContact($contact);
        $this->setExpires($expires);
        $this->setQ($q);
        $this->setCallid($callid);
        $this->setCseq($cseq);
        $this->setLastModified($lastModified);
        $this->setFlags($flags);
        $this->setCflags($cflags);
        $this->setUserAgent($userAgent);
        $this->setRegId($regId);
        $this->setServerId($serverId);
        $this->setConnectionId($connectionId);
        $this->setKeepalive($keepalive);
        $this->setPartition($partition);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return UsersLocationDTO
     */
    public static function createDTO()
    {
        return new UsersLocationDTO();
    }

    /**
     * Factory method
     * @param UsersLocationDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersLocationDTO::class);

        $self = new self(
            $dto->getRuid(),
            $dto->getUsername(),
            $dto->getContact(),
            $dto->getExpires(),
            $dto->getQ(),
            $dto->getCallid(),
            $dto->getCseq(),
            $dto->getLastModified(),
            $dto->getFlags(),
            $dto->getCflags(),
            $dto->getUserAgent(),
            $dto->getRegId(),
            $dto->getServerId(),
            $dto->getConnectionId(),
            $dto->getKeepalive(),
            $dto->getPartition()
        );

        return $self
            ->setDomain($dto->getDomain())
            ->setReceived($dto->getReceived())
            ->setPath($dto->getPath())
            ->setSocket($dto->getSocket())
            ->setMethods($dto->getMethods())
            ->setInstance($dto->getInstance());
    }

    /**
     * @param UsersLocationDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersLocationDTO::class);

        $this
            ->setRuid($dto->getRuid())
            ->setUsername($dto->getUsername())
            ->setDomain($dto->getDomain())
            ->setContact($dto->getContact())
            ->setReceived($dto->getReceived())
            ->setPath($dto->getPath())
            ->setExpires($dto->getExpires())
            ->setQ($dto->getQ())
            ->setCallid($dto->getCallid())
            ->setCseq($dto->getCseq())
            ->setLastModified($dto->getLastModified())
            ->setFlags($dto->getFlags())
            ->setCflags($dto->getCflags())
            ->setUserAgent($dto->getUserAgent())
            ->setSocket($dto->getSocket())
            ->setMethods($dto->getMethods())
            ->setInstance($dto->getInstance())
            ->setRegId($dto->getRegId())
            ->setServerId($dto->getServerId())
            ->setConnectionId($dto->getConnectionId())
            ->setKeepalive($dto->getKeepalive())
            ->setPartition($dto->getPartition());


        return $this;
    }

    /**
     * @return UsersLocationDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setRuid($this->getRuid())
            ->setUsername($this->getUsername())
            ->setDomain($this->getDomain())
            ->setContact($this->getContact())
            ->setReceived($this->getReceived())
            ->setPath($this->getPath())
            ->setExpires($this->getExpires())
            ->setQ($this->getQ())
            ->setCallid($this->getCallid())
            ->setCseq($this->getCseq())
            ->setLastModified($this->getLastModified())
            ->setFlags($this->getFlags())
            ->setCflags($this->getCflags())
            ->setUserAgent($this->getUserAgent())
            ->setSocket($this->getSocket())
            ->setMethods($this->getMethods())
            ->setInstance($this->getInstance())
            ->setRegId($this->getRegId())
            ->setServerId($this->getServerId())
            ->setConnectionId($this->getConnectionId())
            ->setKeepalive($this->getKeepalive())
            ->setPartition($this->getPartition());
    }

    /**
     * @return array
     */
    protected function __toArray()
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
     * Set ruid
     *
     * @param string $ruid
     *
     * @return UsersLocation
     */
    protected function setRuid($ruid)
    {
        Assertion::notNull($ruid);
        Assertion::maxLength($ruid, 64);

        $this->ruid = $ruid;

        return $this;
    }

    /**
     * Get ruid
     *
     * @return string
     */
    public function getRuid()
    {
        return $this->ruid;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return UsersLocation
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
     * @return UsersLocation
     */
    protected function setDomain($domain = null)
    {
        if (!is_null($domain)) {
            Assertion::maxLength($domain, 190);
        }

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
     * Set contact
     *
     * @param string $contact
     *
     * @return UsersLocation
     */
    protected function setContact($contact)
    {
        Assertion::notNull($contact);
        Assertion::maxLength($contact, 255);

        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set received
     *
     * @param string $received
     *
     * @return UsersLocation
     */
    protected function setReceived($received = null)
    {
        if (!is_null($received)) {
            Assertion::maxLength($received, 128);
        }

        $this->received = $received;

        return $this;
    }

    /**
     * Get received
     *
     * @return string
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return UsersLocation
     */
    protected function setPath($path = null)
    {
        if (!is_null($path)) {
            Assertion::maxLength($path, 512);
        }

        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set expires
     *
     * @param \DateTime $expires
     *
     * @return UsersLocation
     */
    protected function setExpires($expires)
    {
        Assertion::notNull($expires);

        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set q
     *
     * @param float $q
     *
     * @return UsersLocation
     */
    protected function setQ($q)
    {
        Assertion::notNull($q);
        //Assertion::float($q);

        $this->q = $q;

        return $this;
    }

    /**
     * Get q
     *
     * @return float
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * Set callid
     *
     * @param string $callid
     *
     * @return UsersLocation
     */
    protected function setCallid($callid)
    {
        Assertion::notNull($callid);
        Assertion::maxLength($callid, 255);

        $this->callid = $callid;

        return $this;
    }

    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * Set cseq
     *
     * @param integer $cseq
     *
     * @return UsersLocation
     */
    protected function setCseq($cseq)
    {
        Assertion::notNull($cseq);
        Assertion::integerish($cseq);

        $this->cseq = $cseq;

        return $this;
    }

    /**
     * Get cseq
     *
     * @return integer
     */
    public function getCseq()
    {
        return $this->cseq;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     *
     * @return UsersLocation
     */
    protected function setLastModified($lastModified)
    {
        Assertion::notNull($lastModified);

        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set flags
     *
     * @param integer $flags
     *
     * @return UsersLocation
     */
    protected function setFlags($flags)
    {
        Assertion::notNull($flags);
        Assertion::integerish($flags);

        $this->flags = $flags;

        return $this;
    }

    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set cflags
     *
     * @param integer $cflags
     *
     * @return UsersLocation
     */
    protected function setCflags($cflags)
    {
        Assertion::notNull($cflags);
        Assertion::integerish($cflags);

        $this->cflags = $cflags;

        return $this;
    }

    /**
     * Get cflags
     *
     * @return integer
     */
    public function getCflags()
    {
        return $this->cflags;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return UsersLocation
     */
    protected function setUserAgent($userAgent)
    {
        Assertion::notNull($userAgent);
        Assertion::maxLength($userAgent, 255);

        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set socket
     *
     * @param string $socket
     *
     * @return UsersLocation
     */
    protected function setSocket($socket = null)
    {
        if (!is_null($socket)) {
            Assertion::maxLength($socket, 64);
        }

        $this->socket = $socket;

        return $this;
    }

    /**
     * Get socket
     *
     * @return string
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Set methods
     *
     * @param integer $methods
     *
     * @return UsersLocation
     */
    protected function setMethods($methods = null)
    {
        if (!is_null($methods)) {
            if (!is_null($methods)) {
                Assertion::integerish($methods);
            }
        }

        $this->methods = $methods;

        return $this;
    }

    /**
     * Get methods
     *
     * @return integer
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * Set instance
     *
     * @param string $instance
     *
     * @return UsersLocation
     */
    protected function setInstance($instance = null)
    {
        if (!is_null($instance)) {
            Assertion::maxLength($instance, 255);
        }

        $this->instance = $instance;

        return $this;
    }

    /**
     * Get instance
     *
     * @return string
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * Set regId
     *
     * @param integer $regId
     *
     * @return UsersLocation
     */
    protected function setRegId($regId)
    {
        Assertion::notNull($regId);
        Assertion::integerish($regId);

        $this->regId = $regId;

        return $this;
    }

    /**
     * Get regId
     *
     * @return integer
     */
    public function getRegId()
    {
        return $this->regId;
    }

    /**
     * Set serverId
     *
     * @param integer $serverId
     *
     * @return UsersLocation
     */
    protected function setServerId($serverId)
    {
        Assertion::notNull($serverId);
        Assertion::integerish($serverId);

        $this->serverId = $serverId;

        return $this;
    }

    /**
     * Get serverId
     *
     * @return integer
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * Set connectionId
     *
     * @param integer $connectionId
     *
     * @return UsersLocation
     */
    protected function setConnectionId($connectionId)
    {
        Assertion::notNull($connectionId);
        Assertion::integerish($connectionId);

        $this->connectionId = $connectionId;

        return $this;
    }

    /**
     * Get connectionId
     *
     * @return integer
     */
    public function getConnectionId()
    {
        return $this->connectionId;
    }

    /**
     * Set keepalive
     *
     * @param integer $keepalive
     *
     * @return UsersLocation
     */
    protected function setKeepalive($keepalive)
    {
        Assertion::notNull($keepalive);
        Assertion::integerish($keepalive);

        $this->keepalive = $keepalive;

        return $this;
    }

    /**
     * Get keepalive
     *
     * @return integer
     */
    public function getKeepalive()
    {
        return $this->keepalive;
    }

    /**
     * Set partition
     *
     * @param integer $partition
     *
     * @return UsersLocation
     */
    protected function setPartition($partition)
    {
        Assertion::notNull($partition);
        Assertion::integerish($partition);

        $this->partition = $partition;

        return $this;
    }

    /**
     * Get partition
     *
     * @return integer
     */
    public function getPartition()
    {
        return $this->partition;
    }



    // @codeCoverageIgnoreEnd
}

