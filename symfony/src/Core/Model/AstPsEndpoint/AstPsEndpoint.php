<?php

namespace Core\Model\AstPsEndpoint;

use Assert\Assertion;
use Core\Application\DTO\AstPsEndpointDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * AstPsEndpoint
 */
class AstPsEndpoint implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var \Core\Model\Terminal\Terminal
     */
    protected $terminal;

    /**
     * @var \Core\Model\Friend\Friend
     */
    protected $friend;


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

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return AstPsEndpointDTO
     */
    public static function createDTO()
    {
        return new AstPsEndpointDTO();
    }

    /**
     * Factory method
     * @param AstPsEndpointDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, AstPsEndpointDTO::class);

        $self = new self(
            $dto->getSorceryId(),
            $dto->getContext(),
            $dto->getDisallow(),
            $dto->getAllow(),
            $dto->getSubscribecontext(),
            $dto->getOneHundredRel()
        );

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
            ->setFriend($dto->getFriend());
    }

    /**
     * @param AstPsEndpointDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, AstPsEndpointDTO::class);

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
            ->setFriend($dto->getFriend());


        return $this;
    }

    /**
     * @return AstPsEndpointDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
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
            ->setFriendId($this->getFriend() ? $this->getFriend()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'terminalId' => $this->getTerminal() ? $this->getTerminal()->getId() : null,
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null
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
     * Set sorceryId
     *
     * @param string $sorceryId
     *
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @return AstPsEndpoint
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
     * @param \Core\Model\Terminal\Terminal $terminal
     *
     * @return AstPsEndpoint
     */
    protected function setTerminal(\Core\Model\Terminal\Terminal $terminal = null)
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get terminal
     *
     * @return \Core\Model\Terminal\Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Set friend
     *
     * @param \Core\Model\Friend\Friend $friend
     *
     * @return AstPsEndpoint
     */
    protected function setFriend(\Core\Model\Friend\Friend $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Core\Model\Friend\Friend
     */
    public function getFriend()
    {
        return $this->friend;
    }



    // @codeCoverageIgnoreEnd
}

