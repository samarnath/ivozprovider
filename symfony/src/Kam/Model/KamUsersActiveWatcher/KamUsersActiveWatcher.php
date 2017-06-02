<?php

namespace Kam\Model\KamUsersActiveWatcher;

use Assert\Assertion;
use Kam\Application\DTO\KamUsersActiveWatcherDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * KamUsersActiveWatcher
 */
class KamUsersActiveWatcher implements EntityInterface
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
     * @column to_user
     * @var string
     */
    protected $toUser;

    /**
     * @column to_domain
     * @var string
     */
    protected $toDomain;

    /**
     * @var string
     */
    protected $event = 'presence';

    /**
     * @column event_id
     * @var string
     */
    protected $eventId;

    /**
     * @column to_tag
     * @var string
     */
    protected $toTag;

    /**
     * @column from_tag
     * @var string
     */
    protected $fromTag;

    /**
     * @var string
     */
    protected $callid;

    /**
     * @column local_cseq
     * @var integer
     */
    protected $localCseq;

    /**
     * @column remote_cseq
     * @var integer
     */
    protected $remoteCseq;

    /**
     * @var string
     */
    protected $contact;

    /**
     * @column record_route
     * @var string
     */
    protected $recordRoute;

    /**
     * @var integer
     */
    protected $expires;

    /**
     * @var integer
     */
    protected $status = '2';

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var integer
     */
    protected $version = '0';

    /**
     * @column socket_info
     * @var string
     */
    protected $socketInfo;

    /**
     * @column local_contact
     * @var string
     */
    protected $localContact;

    /**
     * @column from_user
     * @var string
     */
    protected $fromUser;

    /**
     * @column from_domain
     * @var string
     */
    protected $fromDomain;

    /**
     * @var integer
     */
    protected $updated;

    /**
     * @column updated_winfo
     * @var integer
     */
    protected $updatedWinfo;

    /**
     * @var integer
     */
    protected $flags = '0';

    /**
     * @column user_agent
     * @var string
     */
    protected $userAgent = '';


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
        $toUser,
        $toDomain,
        $event,
        $toTag,
        $fromTag,
        $callid,
        $localCseq,
        $remoteCseq,
        $contact,
        $expires,
        $status,
        $reason,
        $version,
        $socketInfo,
        $localContact,
        $fromUser,
        $fromDomain,
        $updated,
        $updatedWinfo,
        $flags,
        $userAgent
    ) {
        $this->setPresentityUri($presentityUri);
        $this->setWatcherUsername($watcherUsername);
        $this->setWatcherDomain($watcherDomain);
        $this->setToUser($toUser);
        $this->setToDomain($toDomain);
        $this->setEvent($event);
        $this->setToTag($toTag);
        $this->setFromTag($fromTag);
        $this->setCallid($callid);
        $this->setLocalCseq($localCseq);
        $this->setRemoteCseq($remoteCseq);
        $this->setContact($contact);
        $this->setExpires($expires);
        $this->setStatus($status);
        $this->setReason($reason);
        $this->setVersion($version);
        $this->setSocketInfo($socketInfo);
        $this->setLocalContact($localContact);
        $this->setFromUser($fromUser);
        $this->setFromDomain($fromDomain);
        $this->setUpdated($updated);
        $this->setUpdatedWinfo($updatedWinfo);
        $this->setFlags($flags);
        $this->setUserAgent($userAgent);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return KamUsersActiveWatcherDTO
     */
    public static function createDTO()
    {
        return new KamUsersActiveWatcherDTO();
    }

    /**
     * Factory method
     * @param KamUsersActiveWatcherDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamUsersActiveWatcherDTO::class);

        $self = new self(
            $dto->getPresentityUri(),
            $dto->getWatcherUsername(),
            $dto->getWatcherDomain(),
            $dto->getToUser(),
            $dto->getToDomain(),
            $dto->getEvent(),
            $dto->getToTag(),
            $dto->getFromTag(),
            $dto->getCallid(),
            $dto->getLocalCseq(),
            $dto->getRemoteCseq(),
            $dto->getContact(),
            $dto->getExpires(),
            $dto->getStatus(),
            $dto->getReason(),
            $dto->getVersion(),
            $dto->getSocketInfo(),
            $dto->getLocalContact(),
            $dto->getFromUser(),
            $dto->getFromDomain(),
            $dto->getUpdated(),
            $dto->getUpdatedWinfo(),
            $dto->getFlags(),
            $dto->getUserAgent()
        );

        return $self
            ->setEventId($dto->getEventId())
            ->setRecordRoute($dto->getRecordRoute());
    }

    /**
     * @param KamUsersActiveWatcherDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamUsersActiveWatcherDTO::class);

        $this
            ->setPresentityUri($dto->getPresentityUri())
            ->setWatcherUsername($dto->getWatcherUsername())
            ->setWatcherDomain($dto->getWatcherDomain())
            ->setToUser($dto->getToUser())
            ->setToDomain($dto->getToDomain())
            ->setEvent($dto->getEvent())
            ->setEventId($dto->getEventId())
            ->setToTag($dto->getToTag())
            ->setFromTag($dto->getFromTag())
            ->setCallid($dto->getCallid())
            ->setLocalCseq($dto->getLocalCseq())
            ->setRemoteCseq($dto->getRemoteCseq())
            ->setContact($dto->getContact())
            ->setRecordRoute($dto->getRecordRoute())
            ->setExpires($dto->getExpires())
            ->setStatus($dto->getStatus())
            ->setReason($dto->getReason())
            ->setVersion($dto->getVersion())
            ->setSocketInfo($dto->getSocketInfo())
            ->setLocalContact($dto->getLocalContact())
            ->setFromUser($dto->getFromUser())
            ->setFromDomain($dto->getFromDomain())
            ->setUpdated($dto->getUpdated())
            ->setUpdatedWinfo($dto->getUpdatedWinfo())
            ->setFlags($dto->getFlags())
            ->setUserAgent($dto->getUserAgent());


        return $this;
    }

    /**
     * @return KamUsersActiveWatcherDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setPresentityUri($this->getPresentityUri())
            ->setWatcherUsername($this->getWatcherUsername())
            ->setWatcherDomain($this->getWatcherDomain())
            ->setToUser($this->getToUser())
            ->setToDomain($this->getToDomain())
            ->setEvent($this->getEvent())
            ->setEventId($this->getEventId())
            ->setToTag($this->getToTag())
            ->setFromTag($this->getFromTag())
            ->setCallid($this->getCallid())
            ->setLocalCseq($this->getLocalCseq())
            ->setRemoteCseq($this->getRemoteCseq())
            ->setContact($this->getContact())
            ->setRecordRoute($this->getRecordRoute())
            ->setExpires($this->getExpires())
            ->setStatus($this->getStatus())
            ->setReason($this->getReason())
            ->setVersion($this->getVersion())
            ->setSocketInfo($this->getSocketInfo())
            ->setLocalContact($this->getLocalContact())
            ->setFromUser($this->getFromUser())
            ->setFromDomain($this->getFromDomain())
            ->setUpdated($this->getUpdated())
            ->setUpdatedWinfo($this->getUpdatedWinfo())
            ->setFlags($this->getFlags())
            ->setUserAgent($this->getUserAgent());
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
            'toUser' => $this->getToUser(),
            'toDomain' => $this->getToDomain(),
            'event' => $this->getEvent(),
            'eventId' => $this->getEventId(),
            'toTag' => $this->getToTag(),
            'fromTag' => $this->getFromTag(),
            'callid' => $this->getCallid(),
            'localCseq' => $this->getLocalCseq(),
            'remoteCseq' => $this->getRemoteCseq(),
            'contact' => $this->getContact(),
            'recordRoute' => $this->getRecordRoute(),
            'expires' => $this->getExpires(),
            'status' => $this->getStatus(),
            'reason' => $this->getReason(),
            'version' => $this->getVersion(),
            'socketInfo' => $this->getSocketInfo(),
            'localContact' => $this->getLocalContact(),
            'fromUser' => $this->getFromUser(),
            'fromDomain' => $this->getFromDomain(),
            'updated' => $this->getUpdated(),
            'updatedWinfo' => $this->getUpdatedWinfo(),
            'flags' => $this->getFlags(),
            'userAgent' => $this->getUserAgent()
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
     * @return KamUsersActiveWatcher
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
     * @return KamUsersActiveWatcher
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
     * @return KamUsersActiveWatcher
     */
    protected function setWatcherDomain($watcherDomain)
    {
        Assertion::notNull($watcherDomain);
        Assertion::maxLength($watcherDomain, 64);

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
     * Set toUser
     *
     * @param string $toUser
     *
     * @return KamUsersActiveWatcher
     */
    protected function setToUser($toUser)
    {
        Assertion::notNull($toUser);
        Assertion::maxLength($toUser, 64);

        $this->toUser = $toUser;

        return $this;
    }

    /**
     * Get toUser
     *
     * @return string
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * Set toDomain
     *
     * @param string $toDomain
     *
     * @return KamUsersActiveWatcher
     */
    protected function setToDomain($toDomain)
    {
        Assertion::notNull($toDomain);
        Assertion::maxLength($toDomain, 190);

        $this->toDomain = $toDomain;

        return $this;
    }

    /**
     * Get toDomain
     *
     * @return string
     */
    public function getToDomain()
    {
        return $this->toDomain;
    }

    /**
     * Set event
     *
     * @param string $event
     *
     * @return KamUsersActiveWatcher
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
     * Set eventId
     *
     * @param string $eventId
     *
     * @return KamUsersActiveWatcher
     */
    protected function setEventId($eventId = null)
    {
        if (!is_null($eventId)) {
            Assertion::maxLength($eventId, 64);
        }

        $this->eventId = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return string
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set toTag
     *
     * @param string $toTag
     *
     * @return KamUsersActiveWatcher
     */
    protected function setToTag($toTag)
    {
        Assertion::notNull($toTag);
        Assertion::maxLength($toTag, 64);

        $this->toTag = $toTag;

        return $this;
    }

    /**
     * Get toTag
     *
     * @return string
     */
    public function getToTag()
    {
        return $this->toTag;
    }

    /**
     * Set fromTag
     *
     * @param string $fromTag
     *
     * @return KamUsersActiveWatcher
     */
    protected function setFromTag($fromTag)
    {
        Assertion::notNull($fromTag);
        Assertion::maxLength($fromTag, 64);

        $this->fromTag = $fromTag;

        return $this;
    }

    /**
     * Get fromTag
     *
     * @return string
     */
    public function getFromTag()
    {
        return $this->fromTag;
    }

    /**
     * Set callid
     *
     * @param string $callid
     *
     * @return KamUsersActiveWatcher
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
     * Set localCseq
     *
     * @param integer $localCseq
     *
     * @return KamUsersActiveWatcher
     */
    protected function setLocalCseq($localCseq)
    {
        Assertion::notNull($localCseq);
        Assertion::integerish($localCseq);

        $this->localCseq = $localCseq;

        return $this;
    }

    /**
     * Get localCseq
     *
     * @return integer
     */
    public function getLocalCseq()
    {
        return $this->localCseq;
    }

    /**
     * Set remoteCseq
     *
     * @param integer $remoteCseq
     *
     * @return KamUsersActiveWatcher
     */
    protected function setRemoteCseq($remoteCseq)
    {
        Assertion::notNull($remoteCseq);
        Assertion::integerish($remoteCseq);

        $this->remoteCseq = $remoteCseq;

        return $this;
    }

    /**
     * Get remoteCseq
     *
     * @return integer
     */
    public function getRemoteCseq()
    {
        return $this->remoteCseq;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return KamUsersActiveWatcher
     */
    protected function setContact($contact)
    {
        Assertion::notNull($contact);
        Assertion::maxLength($contact, 128);

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
     * Set recordRoute
     *
     * @param string $recordRoute
     *
     * @return KamUsersActiveWatcher
     */
    protected function setRecordRoute($recordRoute = null)
    {
        if (!is_null($recordRoute)) {
            Assertion::maxLength($recordRoute, 65535);
        }

        $this->recordRoute = $recordRoute;

        return $this;
    }

    /**
     * Get recordRoute
     *
     * @return string
     */
    public function getRecordRoute()
    {
        return $this->recordRoute;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return KamUsersActiveWatcher
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
     * Set status
     *
     * @param integer $status
     *
     * @return KamUsersActiveWatcher
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
     * @return KamUsersActiveWatcher
     */
    protected function setReason($reason)
    {
        Assertion::notNull($reason);
        Assertion::maxLength($reason, 64);

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
     * Set version
     *
     * @param integer $version
     *
     * @return KamUsersActiveWatcher
     */
    protected function setVersion($version)
    {
        Assertion::notNull($version);
        Assertion::integerish($version);

        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set socketInfo
     *
     * @param string $socketInfo
     *
     * @return KamUsersActiveWatcher
     */
    protected function setSocketInfo($socketInfo)
    {
        Assertion::notNull($socketInfo);
        Assertion::maxLength($socketInfo, 64);

        $this->socketInfo = $socketInfo;

        return $this;
    }

    /**
     * Get socketInfo
     *
     * @return string
     */
    public function getSocketInfo()
    {
        return $this->socketInfo;
    }

    /**
     * Set localContact
     *
     * @param string $localContact
     *
     * @return KamUsersActiveWatcher
     */
    protected function setLocalContact($localContact)
    {
        Assertion::notNull($localContact);
        Assertion::maxLength($localContact, 128);

        $this->localContact = $localContact;

        return $this;
    }

    /**
     * Get localContact
     *
     * @return string
     */
    public function getLocalContact()
    {
        return $this->localContact;
    }

    /**
     * Set fromUser
     *
     * @param string $fromUser
     *
     * @return KamUsersActiveWatcher
     */
    protected function setFromUser($fromUser)
    {
        Assertion::notNull($fromUser);
        Assertion::maxLength($fromUser, 64);

        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * Get fromUser
     *
     * @return string
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * Set fromDomain
     *
     * @param string $fromDomain
     *
     * @return KamUsersActiveWatcher
     */
    protected function setFromDomain($fromDomain)
    {
        Assertion::notNull($fromDomain);
        Assertion::maxLength($fromDomain, 190);

        $this->fromDomain = $fromDomain;

        return $this;
    }

    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * Set updated
     *
     * @param integer $updated
     *
     * @return KamUsersActiveWatcher
     */
    protected function setUpdated($updated)
    {
        Assertion::notNull($updated);
        Assertion::integerish($updated);

        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return integer
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set updatedWinfo
     *
     * @param integer $updatedWinfo
     *
     * @return KamUsersActiveWatcher
     */
    protected function setUpdatedWinfo($updatedWinfo)
    {
        Assertion::notNull($updatedWinfo);
        Assertion::integerish($updatedWinfo);

        $this->updatedWinfo = $updatedWinfo;

        return $this;
    }

    /**
     * Get updatedWinfo
     *
     * @return integer
     */
    public function getUpdatedWinfo()
    {
        return $this->updatedWinfo;
    }

    /**
     * Set flags
     *
     * @param integer $flags
     *
     * @return KamUsersActiveWatcher
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
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return KamUsersActiveWatcher
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



    // @codeCoverageIgnoreEnd
}

