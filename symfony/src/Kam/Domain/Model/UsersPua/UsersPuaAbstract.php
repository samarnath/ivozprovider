<?php

namespace Kam\Domain\Model\UsersPua;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersPuaAbstract
 */
abstract class UsersPuaAbstract
{
    /**
     * @column pres_uri
     * @var string
     */
    protected $presUri;

    /**
     * @column pres_id
     * @var string
     */
    protected $presId;

    /**
     * @var integer
     */
    protected $event;

    /**
     * @var integer
     */
    protected $expires;

    /**
     * @column desired_expires
     * @var integer
     */
    protected $desiredExpires;

    /**
     * @var integer
     */
    protected $flag;

    /**
     * @var string
     */
    protected $etag;

    /**
     * @column tuple_id
     * @var string
     */
    protected $tupleId;

    /**
     * @column watcher_uri
     * @var string
     */
    protected $watcherUri;

    /**
     * @column call_id
     * @var string
     */
    protected $callId;

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
     * @var integer
     */
    protected $cseq;

    /**
     * @column record_route
     * @var string
     */
    protected $recordRoute;

    /**
     * @var string
     */
    protected $contact;

    /**
     * @column remote_contact
     * @var string
     */
    protected $remoteContact;

    /**
     * @var integer
     */
    protected $version;

    /**
     * @column extra_headers
     * @var string
     */
    protected $extraHeaders;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set presUri
     *
     * @param string $presUri
     *
     * @return self
     */
    protected function setPresUri($presUri)
    {
        Assertion::notNull($presUri);
        Assertion::maxLength($presUri, 128);

        $this->presUri = $presUri;

        return $this;
    }

    /**
     * Get presUri
     *
     * @return string
     */
    public function getPresUri()
    {
        return $this->presUri;
    }

    /**
     * Set presId
     *
     * @param string $presId
     *
     * @return self
     */
    protected function setPresId($presId)
    {
        Assertion::notNull($presId);
        Assertion::maxLength($presId, 255);

        $this->presId = $presId;

        return $this;
    }

    /**
     * Get presId
     *
     * @return string
     */
    public function getPresId()
    {
        return $this->presId;
    }

    /**
     * Set event
     *
     * @param integer $event
     *
     * @return self
     */
    protected function setEvent($event)
    {
        Assertion::notNull($event);
        Assertion::integerish($event);

        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return integer
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return self
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
     * Set desiredExpires
     *
     * @param integer $desiredExpires
     *
     * @return self
     */
    protected function setDesiredExpires($desiredExpires)
    {
        Assertion::notNull($desiredExpires);
        Assertion::integerish($desiredExpires);

        $this->desiredExpires = $desiredExpires;

        return $this;
    }

    /**
     * Get desiredExpires
     *
     * @return integer
     */
    public function getDesiredExpires()
    {
        return $this->desiredExpires;
    }

    /**
     * Set flag
     *
     * @param integer $flag
     *
     * @return self
     */
    protected function setFlag($flag)
    {
        Assertion::notNull($flag);
        Assertion::integerish($flag);

        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return integer
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set etag
     *
     * @param string $etag
     *
     * @return self
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
     * Set tupleId
     *
     * @param string $tupleId
     *
     * @return self
     */
    protected function setTupleId($tupleId = null)
    {
        if (!is_null($tupleId)) {
            Assertion::maxLength($tupleId, 64);
        }

        $this->tupleId = $tupleId;

        return $this;
    }

    /**
     * Get tupleId
     *
     * @return string
     */
    public function getTupleId()
    {
        return $this->tupleId;
    }

    /**
     * Set watcherUri
     *
     * @param string $watcherUri
     *
     * @return self
     */
    protected function setWatcherUri($watcherUri)
    {
        Assertion::notNull($watcherUri);
        Assertion::maxLength($watcherUri, 128);

        $this->watcherUri = $watcherUri;

        return $this;
    }

    /**
     * Get watcherUri
     *
     * @return string
     */
    public function getWatcherUri()
    {
        return $this->watcherUri;
    }

    /**
     * Set callId
     *
     * @param string $callId
     *
     * @return self
     */
    protected function setCallId($callId)
    {
        Assertion::notNull($callId);
        Assertion::maxLength($callId, 255);

        $this->callId = $callId;

        return $this;
    }

    /**
     * Get callId
     *
     * @return string
     */
    public function getCallId()
    {
        return $this->callId;
    }

    /**
     * Set toTag
     *
     * @param string $toTag
     *
     * @return self
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
     * @return self
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
     * Set cseq
     *
     * @param integer $cseq
     *
     * @return self
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
     * Set recordRoute
     *
     * @param string $recordRoute
     *
     * @return self
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
     * Set contact
     *
     * @param string $contact
     *
     * @return self
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
     * Set remoteContact
     *
     * @param string $remoteContact
     *
     * @return self
     */
    protected function setRemoteContact($remoteContact)
    {
        Assertion::notNull($remoteContact);
        Assertion::maxLength($remoteContact, 128);

        $this->remoteContact = $remoteContact;

        return $this;
    }

    /**
     * Get remoteContact
     *
     * @return string
     */
    public function getRemoteContact()
    {
        return $this->remoteContact;
    }

    /**
     * Set version
     *
     * @param integer $version
     *
     * @return self
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
     * Set extraHeaders
     *
     * @param string $extraHeaders
     *
     * @return self
     */
    protected function setExtraHeaders($extraHeaders)
    {
        Assertion::notNull($extraHeaders);
        Assertion::maxLength($extraHeaders, 65535);

        $this->extraHeaders = $extraHeaders;

        return $this;
    }

    /**
     * Get extraHeaders
     *
     * @return string
     */
    public function getExtraHeaders()
    {
        return $this->extraHeaders;
    }



    // @codeCoverageIgnoreEnd
}

