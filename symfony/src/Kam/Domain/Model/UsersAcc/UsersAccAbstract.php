<?php

namespace Kam\Domain\Model\UsersAcc;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersAccAbstract
 */
abstract class UsersAccAbstract
{
    /**
     * @var string
     */
    protected $method = '';

    /**
     * @column from_tag
     * @var string
     */
    protected $fromTag = '';

    /**
     * @column to_tag
     * @var string
     */
    protected $toTag = '';

    /**
     * @var string
     */
    protected $callid = '';

    /**
     * @column sip_code
     * @var string
     */
    protected $sipCode = '';

    /**
     * @column sip_reason
     * @var string
     */
    protected $sipReason = '';

    /**
     * @column src_ip
     * @var string
     */
    protected $srcIp;

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
     * @column ruri_user
     * @var string
     */
    protected $ruriUser;

    /**
     * @column ruri_domain
     * @var string
     */
    protected $ruriDomain;

    /**
     * @var integer
     */
    protected $cseq;

    /**
     * @var \DateTime
     */
    protected $localtime;

    /**
     * @var string
     */
    protected $utctime;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set method
     *
     * @param string $method
     *
     * @return self
     */
    protected function setMethod($method)
    {
        Assertion::notNull($method);
        Assertion::maxLength($method, 16);

        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
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
     * Set callid
     *
     * @param string $callid
     *
     * @return self
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
     * Set sipCode
     *
     * @param string $sipCode
     *
     * @return self
     */
    protected function setSipCode($sipCode)
    {
        Assertion::notNull($sipCode);
        Assertion::maxLength($sipCode, 3);

        $this->sipCode = $sipCode;

        return $this;
    }

    /**
     * Get sipCode
     *
     * @return string
     */
    public function getSipCode()
    {
        return $this->sipCode;
    }

    /**
     * Set sipReason
     *
     * @param string $sipReason
     *
     * @return self
     */
    protected function setSipReason($sipReason)
    {
        Assertion::notNull($sipReason);
        Assertion::maxLength($sipReason, 128);

        $this->sipReason = $sipReason;

        return $this;
    }

    /**
     * Get sipReason
     *
     * @return string
     */
    public function getSipReason()
    {
        return $this->sipReason;
    }

    /**
     * Set srcIp
     *
     * @param string $srcIp
     *
     * @return self
     */
    protected function setSrcIp($srcIp = null)
    {
        if (!is_null($srcIp)) {
            Assertion::maxLength($srcIp, 64);
        }

        $this->srcIp = $srcIp;

        return $this;
    }

    /**
     * Get srcIp
     *
     * @return string
     */
    public function getSrcIp()
    {
        return $this->srcIp;
    }

    /**
     * Set fromUser
     *
     * @param string $fromUser
     *
     * @return self
     */
    protected function setFromUser($fromUser = null)
    {
        if (!is_null($fromUser)) {
            Assertion::maxLength($fromUser, 64);
        }

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
     * @return self
     */
    protected function setFromDomain($fromDomain = null)
    {
        if (!is_null($fromDomain)) {
            Assertion::maxLength($fromDomain, 190);
        }

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
     * Set ruriUser
     *
     * @param string $ruriUser
     *
     * @return self
     */
    protected function setRuriUser($ruriUser = null)
    {
        if (!is_null($ruriUser)) {
            Assertion::maxLength($ruriUser, 64);
        }

        $this->ruriUser = $ruriUser;

        return $this;
    }

    /**
     * Get ruriUser
     *
     * @return string
     */
    public function getRuriUser()
    {
        return $this->ruriUser;
    }

    /**
     * Set ruriDomain
     *
     * @param string $ruriDomain
     *
     * @return self
     */
    protected function setRuriDomain($ruriDomain = null)
    {
        if (!is_null($ruriDomain)) {
            Assertion::maxLength($ruriDomain, 190);
        }

        $this->ruriDomain = $ruriDomain;

        return $this;
    }

    /**
     * Get ruriDomain
     *
     * @return string
     */
    public function getRuriDomain()
    {
        return $this->ruriDomain;
    }

    /**
     * Set cseq
     *
     * @param integer $cseq
     *
     * @return self
     */
    protected function setCseq($cseq = null)
    {
        if (!is_null($cseq)) {
            if (!is_null($cseq)) {
                Assertion::integerish($cseq);
                Assertion::greaterOrEqualThan($cseq, 0);
            }
        }

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
     * Set localtime
     *
     * @param \DateTime $localtime
     *
     * @return self
     */
    protected function setLocaltime($localtime)
    {
        Assertion::notNull($localtime);

        $this->localtime = $localtime;

        return $this;
    }

    /**
     * Get localtime
     *
     * @return \DateTime
     */
    public function getLocaltime()
    {
        return $this->localtime;
    }

    /**
     * Set utctime
     *
     * @param string $utctime
     *
     * @return self
     */
    protected function setUtctime($utctime = null)
    {
        if (!is_null($utctime)) {
            Assertion::maxLength($utctime, 128);
        }

        $this->utctime = $utctime;

        return $this;
    }

    /**
     * Get utctime
     *
     * @return string
     */
    public function getUtctime()
    {
        return $this->utctime;
    }



    // @codeCoverageIgnoreEnd
}

