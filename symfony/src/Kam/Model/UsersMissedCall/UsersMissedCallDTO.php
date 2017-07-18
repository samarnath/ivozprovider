<?php

namespace Kam\Model\UsersMissedCall;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersMissedCallDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $method = '';

    /**
     * @column from_tag
     * @var string
     */
    public $fromTag = '';

    /**
     * @column to_tag
     * @var string
     */
    public $toTag = '';

    /**
     * @var string
     */
    public $callid = '';

    /**
     * @column sip_code
     * @var string
     */
    public $sipCode = '';

    /**
     * @column sip_reason
     * @var string
     */
    public $sipReason = '';

    /**
     * @column src_ip
     * @var string
     */
    public $srcIp;

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
     * @column ruri_user
     * @var string
     */
    public $ruriUser;

    /**
     * @column ruri_domain
     * @var string
     */
    public $ruriDomain;

    /**
     * @var integer
     */
    public $cseq;

    /**
     * @var \DateTime
     */
    public $localtime;

    /**
     * @var string
     */
    public $utctime;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'method' => $this->getMethod(),
            'fromTag' => $this->getFromTag(),
            'toTag' => $this->getToTag(),
            'callid' => $this->getCallid(),
            'sipCode' => $this->getSipCode(),
            'sipReason' => $this->getSipReason(),
            'srcIp' => $this->getSrcIp(),
            'fromUser' => $this->getFromUser(),
            'fromDomain' => $this->getFromDomain(),
            'ruriUser' => $this->getRuriUser(),
            'ruriDomain' => $this->getRuriDomain(),
            'cseq' => $this->getCseq(),
            'localtime' => $this->getLocaltime(),
            'utctime' => $this->getUtctime()
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
            ->setMethod(isset($data['method']) ? $data['method'] : null)
            ->setFromTag(isset($data['fromTag']) ? $data['fromTag'] : null)
            ->setToTag(isset($data['toTag']) ? $data['toTag'] : null)
            ->setCallid(isset($data['callid']) ? $data['callid'] : null)
            ->setSipCode(isset($data['sipCode']) ? $data['sipCode'] : null)
            ->setSipReason(isset($data['sipReason']) ? $data['sipReason'] : null)
            ->setSrcIp(isset($data['srcIp']) ? $data['srcIp'] : null)
            ->setFromUser(isset($data['fromUser']) ? $data['fromUser'] : null)
            ->setFromDomain(isset($data['fromDomain']) ? $data['fromDomain'] : null)
            ->setRuriUser(isset($data['ruriUser']) ? $data['ruriUser'] : null)
            ->setRuriDomain(isset($data['ruriDomain']) ? $data['ruriDomain'] : null)
            ->setCseq(isset($data['cseq']) ? $data['cseq'] : null)
            ->setLocaltime(isset($data['localtime']) ? $data['localtime'] : null)
            ->setUtctime(isset($data['utctime']) ? $data['utctime'] : null);
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
     * @return UsersMissedCallDTO
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
     * @param string $method
     *
     * @return UsersMissedCallDTO
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $fromTag
     *
     * @return UsersMissedCallDTO
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
     * @param string $toTag
     *
     * @return UsersMissedCallDTO
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
     * @param string $callid
     *
     * @return UsersMissedCallDTO
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
     * @param string $sipCode
     *
     * @return UsersMissedCallDTO
     */
    public function setSipCode($sipCode)
    {
        $this->sipCode = $sipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSipCode()
    {
        return $this->sipCode;
    }

    /**
     * @param string $sipReason
     *
     * @return UsersMissedCallDTO
     */
    public function setSipReason($sipReason)
    {
        $this->sipReason = $sipReason;

        return $this;
    }

    /**
     * @return string
     */
    public function getSipReason()
    {
        return $this->sipReason;
    }

    /**
     * @param string $srcIp
     *
     * @return UsersMissedCallDTO
     */
    public function setSrcIp($srcIp = null)
    {
        $this->srcIp = $srcIp;

        return $this;
    }

    /**
     * @return string
     */
    public function getSrcIp()
    {
        return $this->srcIp;
    }

    /**
     * @param string $fromUser
     *
     * @return UsersMissedCallDTO
     */
    public function setFromUser($fromUser = null)
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
     * @return UsersMissedCallDTO
     */
    public function setFromDomain($fromDomain = null)
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
     * @param string $ruriUser
     *
     * @return UsersMissedCallDTO
     */
    public function setRuriUser($ruriUser = null)
    {
        $this->ruriUser = $ruriUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuriUser()
    {
        return $this->ruriUser;
    }

    /**
     * @param string $ruriDomain
     *
     * @return UsersMissedCallDTO
     */
    public function setRuriDomain($ruriDomain = null)
    {
        $this->ruriDomain = $ruriDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuriDomain()
    {
        return $this->ruriDomain;
    }

    /**
     * @param integer $cseq
     *
     * @return UsersMissedCallDTO
     */
    public function setCseq($cseq = null)
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
     * @param \DateTime $localtime
     *
     * @return UsersMissedCallDTO
     */
    public function setLocaltime($localtime)
    {
        $this->localtime = $localtime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLocaltime()
    {
        return $this->localtime;
    }

    /**
     * @param string $utctime
     *
     * @return UsersMissedCallDTO
     */
    public function setUtctime($utctime = null)
    {
        $this->utctime = $utctime;

        return $this;
    }

    /**
     * @return string
     */
    public function getUtctime()
    {
        return $this->utctime;
    }
}

