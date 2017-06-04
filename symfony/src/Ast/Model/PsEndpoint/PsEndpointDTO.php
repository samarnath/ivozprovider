<?php

namespace Ast\Model\PsEndpoint;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PsEndpointDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column sorcery_id
     * @var string
     */
    public $sorceryId;

    /**
     * @column from_domain
     * @var string
     */
    public $fromDomain;

    /**
     * @var string
     */
    public $aors;

    /**
     * @var string
     */
    public $callerid;

    /**
     * @var string
     */
    public $context = 'users';

    /**
     * @var string
     */
    public $disallow = 'all';

    /**
     * @var string
     */
    public $allow = 'all';

    /**
     * @column direct_media
     * @var string
     */
    public $directMedia = 'yes';

    /**
     * @column direct_media_method
     * @var string
     */
    public $directMediaMethod = 'update';

    /**
     * @var string
     */
    public $mailboxes;

    /**
     * @column pickup_group
     * @var string
     */
    public $pickupGroup;

    /**
     * @column send_diversion
     * @var string
     */
    public $sendDiversion = 'yes';

    /**
     * @column send_pai
     * @var string
     */
    public $sendPai = 'yes';

    /**
     * @var string
     */
    public $subscribecontext = 'default';

    /**
     * @column 100rel
     * @var string
     */
    public $oneHundredRel = 'no';

    /**
     * @column outbound_proxy
     * @var string
     */
    public $outboundProxy;

    /**
     * @column trust_id_inbound
     * @var string
     */
    public $trustIdInbound;

    /**
     * @var mixed
     */
    public $terminalId;

    /**
     * @var mixed
     */
    public $friendId;

    /**
     * @var mixed
     */
    public $terminal;

    /**
     * @var mixed
     */
    public $friend;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'sorceryId' => $this->getSorceryId(),
            'fromDomain' => $this->getFromDomain(),
            'aors' => $this->getAors(),
            'callerid' => $this->getCallerid(),
            'context' => $this->getContext(),
            'disallow' => $this->getDisallow(),
            'allow' => $this->getAllow(),
            'directMedia' => $this->getDirectMedia(),
            'directMediaMethod' => $this->getDirectMediaMethod(),
            'mailboxes' => $this->getMailboxes(),
            'pickupGroup' => $this->getPickupGroup(),
            'sendDiversion' => $this->getSendDiversion(),
            'sendPai' => $this->getSendPai(),
            'subscribecontext' => $this->getSubscribecontext(),
            'oneHundredRel' => $this->getOneHundredRel(),
            'outboundProxy' => $this->getOutboundProxy(),
            'trustIdInbound' => $this->getTrustIdInbound(),
            'terminalId' => $this->getTerminalId(),
            'friendId' => $this->getFriendId()
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
            ->setSorceryId(isset($data['sorceryId']) ? $data['sorceryId'] : null)
            ->setFromDomain(isset($data['fromDomain']) ? $data['fromDomain'] : null)
            ->setAors(isset($data['aors']) ? $data['aors'] : null)
            ->setCallerid(isset($data['callerid']) ? $data['callerid'] : null)
            ->setContext(isset($data['context']) ? $data['context'] : null)
            ->setDisallow(isset($data['disallow']) ? $data['disallow'] : null)
            ->setAllow(isset($data['allow']) ? $data['allow'] : null)
            ->setDirectMedia(isset($data['directMedia']) ? $data['directMedia'] : null)
            ->setDirectMediaMethod(isset($data['directMediaMethod']) ? $data['directMediaMethod'] : null)
            ->setMailboxes(isset($data['mailboxes']) ? $data['mailboxes'] : null)
            ->setPickupGroup(isset($data['pickupGroup']) ? $data['pickupGroup'] : null)
            ->setSendDiversion(isset($data['sendDiversion']) ? $data['sendDiversion'] : null)
            ->setSendPai(isset($data['sendPai']) ? $data['sendPai'] : null)
            ->setSubscribecontext(isset($data['subscribecontext']) ? $data['subscribecontext'] : null)
            ->setOneHundredRel(isset($data['oneHundredRel']) ? $data['oneHundredRel'] : null)
            ->setOutboundProxy(isset($data['outboundProxy']) ? $data['outboundProxy'] : null)
            ->setTrustIdInbound(isset($data['trustIdInbound']) ? $data['trustIdInbound'] : null)
            ->setTerminalId(isset($data['terminalId']) ? $data['terminalId'] : null)
            ->setFriendId(isset($data['friendId']) ? $data['friendId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->terminal = $transformer->transform('Core\\Model\\Terminal\\Terminal', $this->getTerminalId());
        $this->friend = $transformer->transform('Core\\Model\\Friend\\Friend', $this->getFriendId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PsEndpointDTO
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
     * @param string $sorceryId
     *
     * @return PsEndpointDTO
     */
    public function setSorceryId($sorceryId)
    {
        $this->sorceryId = $sorceryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSorceryId()
    {
        return $this->sorceryId;
    }

    /**
     * @param string $fromDomain
     *
     * @return PsEndpointDTO
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
     * @param string $aors
     *
     * @return PsEndpointDTO
     */
    public function setAors($aors = null)
    {
        $this->aors = $aors;

        return $this;
    }

    /**
     * @return string
     */
    public function getAors()
    {
        return $this->aors;
    }

    /**
     * @param string $callerid
     *
     * @return PsEndpointDTO
     */
    public function setCallerid($callerid = null)
    {
        $this->callerid = $callerid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallerid()
    {
        return $this->callerid;
    }

    /**
     * @param string $context
     *
     * @return PsEndpointDTO
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $disallow
     *
     * @return PsEndpointDTO
     */
    public function setDisallow($disallow)
    {
        $this->disallow = $disallow;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisallow()
    {
        return $this->disallow;
    }

    /**
     * @param string $allow
     *
     * @return PsEndpointDTO
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * @param string $directMedia
     *
     * @return PsEndpointDTO
     */
    public function setDirectMedia($directMedia = null)
    {
        $this->directMedia = $directMedia;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectMedia()
    {
        return $this->directMedia;
    }

    /**
     * @param string $directMediaMethod
     *
     * @return PsEndpointDTO
     */
    public function setDirectMediaMethod($directMediaMethod = null)
    {
        $this->directMediaMethod = $directMediaMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectMediaMethod()
    {
        return $this->directMediaMethod;
    }

    /**
     * @param string $mailboxes
     *
     * @return PsEndpointDTO
     */
    public function setMailboxes($mailboxes = null)
    {
        $this->mailboxes = $mailboxes;

        return $this;
    }

    /**
     * @return string
     */
    public function getMailboxes()
    {
        return $this->mailboxes;
    }

    /**
     * @param string $pickupGroup
     *
     * @return PsEndpointDTO
     */
    public function setPickupGroup($pickupGroup = null)
    {
        $this->pickupGroup = $pickupGroup;

        return $this;
    }

    /**
     * @return string
     */
    public function getPickupGroup()
    {
        return $this->pickupGroup;
    }

    /**
     * @param string $sendDiversion
     *
     * @return PsEndpointDTO
     */
    public function setSendDiversion($sendDiversion = null)
    {
        $this->sendDiversion = $sendDiversion;

        return $this;
    }

    /**
     * @return string
     */
    public function getSendDiversion()
    {
        return $this->sendDiversion;
    }

    /**
     * @param string $sendPai
     *
     * @return PsEndpointDTO
     */
    public function setSendPai($sendPai = null)
    {
        $this->sendPai = $sendPai;

        return $this;
    }

    /**
     * @return string
     */
    public function getSendPai()
    {
        return $this->sendPai;
    }

    /**
     * @param string $subscribecontext
     *
     * @return PsEndpointDTO
     */
    public function setSubscribecontext($subscribecontext)
    {
        $this->subscribecontext = $subscribecontext;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubscribecontext()
    {
        return $this->subscribecontext;
    }

    /**
     * @param string $oneHundredRel
     *
     * @return PsEndpointDTO
     */
    public function setOneHundredRel($oneHundredRel)
    {
        $this->oneHundredRel = $oneHundredRel;

        return $this;
    }

    /**
     * @return string
     */
    public function getOneHundredRel()
    {
        return $this->oneHundredRel;
    }

    /**
     * @param string $outboundProxy
     *
     * @return PsEndpointDTO
     */
    public function setOutboundProxy($outboundProxy = null)
    {
        $this->outboundProxy = $outboundProxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutboundProxy()
    {
        return $this->outboundProxy;
    }

    /**
     * @param string $trustIdInbound
     *
     * @return PsEndpointDTO
     */
    public function setTrustIdInbound($trustIdInbound = null)
    {
        $this->trustIdInbound = $trustIdInbound;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrustIdInbound()
    {
        return $this->trustIdInbound;
    }

    /**
     * @param integer $terminalId
     *
     * @return PsEndpointDTO
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTerminalId()
    {
        return $this->terminalId;
    }

    /**
     * @return \Core\Model\Terminal\Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @param integer $friendId
     *
     * @return PsEndpointDTO
     */
    public function setFriendId($friendId)
    {
        $this->friendId = $friendId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFriendId()
    {
        return $this->friendId;
    }

    /**
     * @return \Core\Model\Friend\Friend
     */
    public function getFriend()
    {
        return $this->friend;
    }
}

