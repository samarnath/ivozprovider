<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamUsersActiveWatcherDTO implements DataTransferObjectInterface
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
     * @column to_user
     * @var string
     */
    public $toUser;

    /**
     * @column to_domain
     * @var string
     */
    public $toDomain;

    /**
     * @var string
     */
    public $event = 'presence';

    /**
     * @column event_id
     * @var string
     */
    public $eventId;

    /**
     * @column to_tag
     * @var string
     */
    public $toTag;

    /**
     * @column from_tag
     * @var string
     */
    public $fromTag;

    /**
     * @var string
     */
    public $callid;

    /**
     * @column local_cseq
     * @var integer
     */
    public $localCseq;

    /**
     * @column remote_cseq
     * @var integer
     */
    public $remoteCseq;

    /**
     * @var string
     */
    public $contact;

    /**
     * @column record_route
     * @var string
     */
    public $recordRoute;

    /**
     * @var integer
     */
    public $expires;

    /**
     * @var integer
     */
    public $status = '2';

    /**
     * @var string
     */
    public $reason;

    /**
     * @var integer
     */
    public $version = '0';

    /**
     * @column socket_info
     * @var string
     */
    public $socketInfo;

    /**
     * @column local_contact
     * @var string
     */
    public $localContact;

    /**
     * @column from_user
     * @var string
     */
    public $fromUser;

    /**
     * @column from_domain
     * @var string
     */
    public $fromDomain;

    /**
     * @var integer
     */
    public $updated;

    /**
     * @column updated_winfo
     * @var integer
     */
    public $updatedWinfo;

    /**
     * @var integer
     */
    public $flags = '0';

    /**
     * @column user_agent
     * @var string
     */
    public $userAgent = '';

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
            ->setToUser(isset($data['toUser']) ? $data['toUser'] : null)
            ->setToDomain(isset($data['toDomain']) ? $data['toDomain'] : null)
            ->setEvent(isset($data['event']) ? $data['event'] : null)
            ->setEventId(isset($data['eventId']) ? $data['eventId'] : null)
            ->setToTag(isset($data['toTag']) ? $data['toTag'] : null)
            ->setFromTag(isset($data['fromTag']) ? $data['fromTag'] : null)
            ->setCallid(isset($data['callid']) ? $data['callid'] : null)
            ->setLocalCseq(isset($data['localCseq']) ? $data['localCseq'] : null)
            ->setRemoteCseq(isset($data['remoteCseq']) ? $data['remoteCseq'] : null)
            ->setContact(isset($data['contact']) ? $data['contact'] : null)
            ->setRecordRoute(isset($data['recordRoute']) ? $data['recordRoute'] : null)
            ->setExpires(isset($data['expires']) ? $data['expires'] : null)
            ->setStatus(isset($data['status']) ? $data['status'] : null)
            ->setReason(isset($data['reason']) ? $data['reason'] : null)
            ->setVersion(isset($data['version']) ? $data['version'] : null)
            ->setSocketInfo(isset($data['socketInfo']) ? $data['socketInfo'] : null)
            ->setLocalContact(isset($data['localContact']) ? $data['localContact'] : null)
            ->setFromUser(isset($data['fromUser']) ? $data['fromUser'] : null)
            ->setFromDomain(isset($data['fromDomain']) ? $data['fromDomain'] : null)
            ->setUpdated(isset($data['updated']) ? $data['updated'] : null)
            ->setUpdatedWinfo(isset($data['updatedWinfo']) ? $data['updatedWinfo'] : null)
            ->setFlags(isset($data['flags']) ? $data['flags'] : null)
            ->setUserAgent(isset($data['userAgent']) ? $data['userAgent'] : null);
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
     * @return KamUsersActiveWatcherDTO
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
     * @return KamUsersActiveWatcherDTO
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
     * @return KamUsersActiveWatcherDTO
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
     * @return KamUsersActiveWatcherDTO
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
     * @param string $toUser
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * @param string $toDomain
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setToDomain($toDomain)
    {
        $this->toDomain = $toDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getToDomain()
    {
        return $this->toDomain;
    }

    /**
     * @param string $event
     *
     * @return KamUsersActiveWatcherDTO
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
     * @param string $eventId
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setEventId($eventId = null)
    {
        $this->eventId = $eventId;

        return $this;
    }

    /**
     * @return string
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param string $toTag
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setToTag($toTag)
    {
        $this->toTag = $toTag;

        return $this;
    }

    /**
     * @return string
     */
    public function getToTag()
    {
        return $this->toTag;
    }

    /**
     * @param string $fromTag
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setFromTag($fromTag)
    {
        $this->fromTag = $fromTag;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromTag()
    {
        return $this->fromTag;
    }

    /**
     * @param string $callid
     *
     * @return KamUsersActiveWatcherDTO
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
     * @param integer $localCseq
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setLocalCseq($localCseq)
    {
        $this->localCseq = $localCseq;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLocalCseq()
    {
        return $this->localCseq;
    }

    /**
     * @param integer $remoteCseq
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setRemoteCseq($remoteCseq)
    {
        $this->remoteCseq = $remoteCseq;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRemoteCseq()
    {
        return $this->remoteCseq;
    }

    /**
     * @param string $contact
     *
     * @return KamUsersActiveWatcherDTO
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
     * @param string $recordRoute
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setRecordRoute($recordRoute = null)
    {
        $this->recordRoute = $recordRoute;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordRoute()
    {
        return $this->recordRoute;
    }

    /**
     * @param integer $expires
     *
     * @return KamUsersActiveWatcherDTO
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
     * @param integer $status
     *
     * @return KamUsersActiveWatcherDTO
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
     * @return KamUsersActiveWatcherDTO
     */
    public function setReason($reason)
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
     * @param integer $version
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $socketInfo
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setSocketInfo($socketInfo)
    {
        $this->socketInfo = $socketInfo;

        return $this;
    }

    /**
     * @return string
     */
    public function getSocketInfo()
    {
        return $this->socketInfo;
    }

    /**
     * @param string $localContact
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setLocalContact($localContact)
    {
        $this->localContact = $localContact;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalContact()
    {
        return $this->localContact;
    }

    /**
     * @param string $fromUser
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setFromUser($fromUser)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * @param string $fromDomain
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setFromDomain($fromDomain)
    {
        $this->fromDomain = $fromDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * @param integer $updated
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param integer $updatedWinfo
     *
     * @return KamUsersActiveWatcherDTO
     */
    public function setUpdatedWinfo($updatedWinfo)
    {
        $this->updatedWinfo = $updatedWinfo;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUpdatedWinfo()
    {
        return $this->updatedWinfo;
    }

    /**
     * @param integer $flags
     *
     * @return KamUsersActiveWatcherDTO
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
     * @param string $userAgent
     *
     * @return KamUsersActiveWatcherDTO
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
}

