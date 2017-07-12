<?php

namespace Ast\Domain\Model\PsEndpoint;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PsEndpointAbstract
 */
abstract class PsEndpointAbstract
{
    /**
     * @column sorcery_id
     * @var string
     */
    protected $sorceryId;

    /**
     * @column from_domain
     * @var string
     */
    protected $fromDomain;

    /**
     * @var string
     */
    protected $aors;

    /**
     * @var string
     */
    protected $callerid;

    /**
     * @var string
     */
    protected $context = 'users';

    /**
     * @var string
     */
    protected $disallow = 'all';

    /**
     * @var string
     */
    protected $allow = 'all';

    /**
     * @column direct_media
     * @var string
     */
    protected $directMedia = 'yes';

    /**
     * @column direct_media_method
     * @comment enum:update|invite|reinvite
     * @var string
     */
    protected $directMediaMethod = 'update';

    /**
     * @var string
     */
    protected $mailboxes;

    /**
     * @column pickup_group
     * @var string
     */
    protected $pickupGroup;

    /**
     * @column send_diversion
     * @var string
     */
    protected $sendDiversion = 'yes';

    /**
     * @column send_pai
     * @var string
     */
    protected $sendPai = 'yes';

    /**
     * @var string
     */
    protected $subscribecontext = 'default';

    /**
     * @column 100rel
     * @var string
     */
    protected $oneHundredRel = 'no';

    /**
     * @column outbound_proxy
     * @var string
     */
    protected $outboundProxy;

    /**
     * @column trust_id_inbound
     * @var string
     */
    protected $trustIdInbound;

    /**
     * @var \Ivoz\Domain\Model\Terminal\TerminalInterface
     */
    protected $terminal;

    /**
     * @var \Ivoz\Domain\Model\Friend\FriendInterface
     */
    protected $friend;

    /**
     * @var \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface
     */
    protected $retailAccount;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $sorceryId,
        $context,
        $disallow,
        $allow,
        $subscribecontext,
        $oneHundredRel
    ) {
        $this->setSorceryId($sorceryId);
        $this->setContext($context);
        $this->setDisallow($disallow);
        $this->setAllow($allow);
        $this->setSubscribecontext($subscribecontext);
        $this->setOneHundredRel($oneHundredRel);
    }

    abstract public function __wakeup();

    /**
     * @return PsEndpointDTO
     */
    public static function createDTO()
    {
        return new PsEndpointDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PsEndpointDTO
         */
        Assertion::isInstanceOf($dto, PsEndpointDTO::class);

        $self = new static(
            $dto->getSorceryId(),
            $dto->getContext(),
            $dto->getDisallow(),
            $dto->getAllow(),
            $dto->getSubscribecontext(),
            $dto->getOneHundredRel());

        return $self
            ->setFromDomain($dto->getFromDomain())
            ->setAors($dto->getAors())
            ->setCallerid($dto->getCallerid())
            ->setDirectMedia($dto->getDirectMedia())
            ->setDirectMediaMethod($dto->getDirectMediaMethod())
            ->setMailboxes($dto->getMailboxes())
            ->setPickupGroup($dto->getPickupGroup())
            ->setSendDiversion($dto->getSendDiversion())
            ->setSendPai($dto->getSendPai())
            ->setOutboundProxy($dto->getOutboundProxy())
            ->setTrustIdInbound($dto->getTrustIdInbound())
            ->setTerminal($dto->getTerminal())
            ->setFriend($dto->getFriend())
            ->setRetailAccount($dto->getRetailAccount())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PsEndpointDTO
         */
        Assertion::isInstanceOf($dto, PsEndpointDTO::class);

        $this
            ->setSorceryId($dto->getSorceryId())
            ->setFromDomain($dto->getFromDomain())
            ->setAors($dto->getAors())
            ->setCallerid($dto->getCallerid())
            ->setContext($dto->getContext())
            ->setDisallow($dto->getDisallow())
            ->setAllow($dto->getAllow())
            ->setDirectMedia($dto->getDirectMedia())
            ->setDirectMediaMethod($dto->getDirectMediaMethod())
            ->setMailboxes($dto->getMailboxes())
            ->setPickupGroup($dto->getPickupGroup())
            ->setSendDiversion($dto->getSendDiversion())
            ->setSendPai($dto->getSendPai())
            ->setSubscribecontext($dto->getSubscribecontext())
            ->setOneHundredRel($dto->getOneHundredRel())
            ->setOutboundProxy($dto->getOutboundProxy())
            ->setTrustIdInbound($dto->getTrustIdInbound())
            ->setTerminal($dto->getTerminal())
            ->setFriend($dto->getFriend())
            ->setRetailAccount($dto->getRetailAccount());


        return $this;
    }

    /**
     * @return PsEndpointDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setSorceryId($this->getSorceryId())
            ->setFromDomain($this->getFromDomain())
            ->setAors($this->getAors())
            ->setCallerid($this->getCallerid())
            ->setContext($this->getContext())
            ->setDisallow($this->getDisallow())
            ->setAllow($this->getAllow())
            ->setDirectMedia($this->getDirectMedia())
            ->setDirectMediaMethod($this->getDirectMediaMethod())
            ->setMailboxes($this->getMailboxes())
            ->setPickupGroup($this->getPickupGroup())
            ->setSendDiversion($this->getSendDiversion())
            ->setSendPai($this->getSendPai())
            ->setSubscribecontext($this->getSubscribecontext())
            ->setOneHundredRel($this->getOneHundredRel())
            ->setOutboundProxy($this->getOutboundProxy())
            ->setTrustIdInbound($this->getTrustIdInbound())
            ->setTerminalId($this->getTerminal() ? $this->getTerminal()->getId() : null)
            ->setFriendId($this->getFriend() ? $this->getFriend()->getId() : null)
            ->setRetailAccountId($this->getRetailAccount() ? $this->getRetailAccount()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
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
            'terminalId' => $this->getTerminal() ? $this->getTerminal()->getId() : null,
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null,
            'retailAccountId' => $this->getRetailAccount() ? $this->getRetailAccount()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set sorceryId
     *
     * @param string $sorceryId
     *
     * @return self
     */
    protected function setSorceryId($sorceryId)
    {
        Assertion::notNull($sorceryId);
        Assertion::maxLength($sorceryId, 40);

        $this->sorceryId = $sorceryId;

        return $this;
    }

    /**
     * Get sorceryId
     *
     * @return string
     */
    public function getSorceryId()
    {
        return $this->sorceryId;
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
     * Set aors
     *
     * @param string $aors
     *
     * @return self
     */
    protected function setAors($aors = null)
    {
        if (!is_null($aors)) {
            Assertion::maxLength($aors, 200);
        }

        $this->aors = $aors;

        return $this;
    }

    /**
     * Get aors
     *
     * @return string
     */
    public function getAors()
    {
        return $this->aors;
    }

    /**
     * Set callerid
     *
     * @param string $callerid
     *
     * @return self
     */
    protected function setCallerid($callerid = null)
    {
        if (!is_null($callerid)) {
            Assertion::maxLength($callerid, 100);
        }

        $this->callerid = $callerid;

        return $this;
    }

    /**
     * Get callerid
     *
     * @return string
     */
    public function getCallerid()
    {
        return $this->callerid;
    }

    /**
     * Set context
     *
     * @param string $context
     *
     * @return self
     */
    protected function setContext($context)
    {
        Assertion::notNull($context);
        Assertion::maxLength($context, 40);

        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set disallow
     *
     * @param string $disallow
     *
     * @return self
     */
    protected function setDisallow($disallow)
    {
        Assertion::notNull($disallow);
        Assertion::maxLength($disallow, 200);

        $this->disallow = $disallow;

        return $this;
    }

    /**
     * Get disallow
     *
     * @return string
     */
    public function getDisallow()
    {
        return $this->disallow;
    }

    /**
     * Set allow
     *
     * @param string $allow
     *
     * @return self
     */
    protected function setAllow($allow)
    {
        Assertion::notNull($allow);
        Assertion::maxLength($allow, 200);

        $this->allow = $allow;

        return $this;
    }

    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * Set directMedia
     *
     * @param string $directMedia
     *
     * @return self
     */
    protected function setDirectMedia($directMedia = null)
    {
        if (!is_null($directMedia)) {
        }

        $this->directMedia = $directMedia;

        return $this;
    }

    /**
     * Get directMedia
     *
     * @return string
     */
    public function getDirectMedia()
    {
        return $this->directMedia;
    }

    /**
     * Set directMediaMethod
     *
     * @param string $directMediaMethod
     *
     * @return self
     */
    protected function setDirectMediaMethod($directMediaMethod = null)
    {
        if (!is_null($directMediaMethod)) {
        Assertion::choice($directMediaMethod, array (
          0 => '    update',
          1 => '    invite',
          2 => '    reinvite',
        ));
        }

        $this->directMediaMethod = $directMediaMethod;

        return $this;
    }

    /**
     * Get directMediaMethod
     *
     * @return string
     */
    public function getDirectMediaMethod()
    {
        return $this->directMediaMethod;
    }

    /**
     * Set mailboxes
     *
     * @param string $mailboxes
     *
     * @return self
     */
    protected function setMailboxes($mailboxes = null)
    {
        if (!is_null($mailboxes)) {
            Assertion::maxLength($mailboxes, 100);
        }

        $this->mailboxes = $mailboxes;

        return $this;
    }

    /**
     * Get mailboxes
     *
     * @return string
     */
    public function getMailboxes()
    {
        return $this->mailboxes;
    }

    /**
     * Set pickupGroup
     *
     * @param string $pickupGroup
     *
     * @return self
     */
    protected function setPickupGroup($pickupGroup = null)
    {
        if (!is_null($pickupGroup)) {
            Assertion::maxLength($pickupGroup, 40);
        }

        $this->pickupGroup = $pickupGroup;

        return $this;
    }

    /**
     * Get pickupGroup
     *
     * @return string
     */
    public function getPickupGroup()
    {
        return $this->pickupGroup;
    }

    /**
     * Set sendDiversion
     *
     * @param string $sendDiversion
     *
     * @return self
     */
    protected function setSendDiversion($sendDiversion = null)
    {
        if (!is_null($sendDiversion)) {
        }

        $this->sendDiversion = $sendDiversion;

        return $this;
    }

    /**
     * Get sendDiversion
     *
     * @return string
     */
    public function getSendDiversion()
    {
        return $this->sendDiversion;
    }

    /**
     * Set sendPai
     *
     * @param string $sendPai
     *
     * @return self
     */
    protected function setSendPai($sendPai = null)
    {
        if (!is_null($sendPai)) {
        }

        $this->sendPai = $sendPai;

        return $this;
    }

    /**
     * Get sendPai
     *
     * @return string
     */
    public function getSendPai()
    {
        return $this->sendPai;
    }

    /**
     * Set subscribecontext
     *
     * @param string $subscribecontext
     *
     * @return self
     */
    protected function setSubscribecontext($subscribecontext)
    {
        Assertion::notNull($subscribecontext);
        Assertion::maxLength($subscribecontext, 40);

        $this->subscribecontext = $subscribecontext;

        return $this;
    }

    /**
     * Get subscribecontext
     *
     * @return string
     */
    public function getSubscribecontext()
    {
        return $this->subscribecontext;
    }

    /**
     * Set oneHundredRel
     *
     * @param string $oneHundredRel
     *
     * @return self
     */
    protected function setOneHundredRel($oneHundredRel)
    {
        Assertion::notNull($oneHundredRel);

        $this->oneHundredRel = $oneHundredRel;

        return $this;
    }

    /**
     * Get oneHundredRel
     *
     * @return string
     */
    public function getOneHundredRel()
    {
        return $this->oneHundredRel;
    }

    /**
     * Set outboundProxy
     *
     * @param string $outboundProxy
     *
     * @return self
     */
    protected function setOutboundProxy($outboundProxy = null)
    {
        if (!is_null($outboundProxy)) {
            Assertion::maxLength($outboundProxy, 256);
        }

        $this->outboundProxy = $outboundProxy;

        return $this;
    }

    /**
     * Get outboundProxy
     *
     * @return string
     */
    public function getOutboundProxy()
    {
        return $this->outboundProxy;
    }

    /**
     * Set trustIdInbound
     *
     * @param string $trustIdInbound
     *
     * @return self
     */
    protected function setTrustIdInbound($trustIdInbound = null)
    {
        if (!is_null($trustIdInbound)) {
        }

        $this->trustIdInbound = $trustIdInbound;

        return $this;
    }

    /**
     * Get trustIdInbound
     *
     * @return string
     */
    public function getTrustIdInbound()
    {
        return $this->trustIdInbound;
    }

    /**
     * Set terminal
     *
     * @param \Ivoz\Domain\Model\Terminal\TerminalInterface $terminal
     *
     * @return self
     */
    protected function setTerminal(\Ivoz\Domain\Model\Terminal\TerminalInterface $terminal = null)
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get terminal
     *
     * @return \Ivoz\Domain\Model\Terminal\TerminalInterface
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Set friend
     *
     * @param \Ivoz\Domain\Model\Friend\FriendInterface $friend
     *
     * @return self
     */
    protected function setFriend(\Ivoz\Domain\Model\Friend\FriendInterface $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Ivoz\Domain\Model\Friend\FriendInterface
     */
    public function getFriend()
    {
        return $this->friend;
    }

    /**
     * Set retailAccount
     *
     * @param \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount
     *
     * @return self
     */
    protected function setRetailAccount(\Ivoz\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount = null)
    {
        $this->retailAccount = $retailAccount;

        return $this;
    }

    /**
     * Get retailAccount
     *
     * @return \Ivoz\Domain\Model\RetailAccount\RetailAccountInterface
     */
    public function getRetailAccount()
    {
        return $this->retailAccount;
    }



    // @codeCoverageIgnoreEnd
}

