<?php

namespace Kam\Domain\Model\UsersAcc;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersAccDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $method = '';

    /**
     * @column from_tag
     * @var string
     */
    private $fromTag = '';

    /**
     * @column to_tag
     * @var string
     */
    private $toTag = '';

    /**
     * @var string
     */
    private $callid = '';

    /**
     * @column sip_code
     * @var string
     */
    private $sipCode = '';

    /**
     * @column sip_reason
     * @var string
     */
    private $sipReason = '';

    /**
     * @column src_ip
     * @var string
     */
    private $srcIp;

    /**
     * @column from_user
     * @var string
     */
    private $fromUser;

    /**
     * @column from_domain
     * @var string
     */
    private $fromDomain;

    /**
     * @column ruri_user
     * @var string
     */
    private $ruriUser;

    /**
     * @column ruri_domain
     * @var string
     */
    private $ruriDomain;

    /**
     * @var integer
     */
    private $cseq;

    /**
     * @var \DateTime
     */
    private $localtime;

    /**
     * @var string
     */
    private $utctime;

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
     * @deprecated
     *
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
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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
     * @return UsersAccDTO
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

