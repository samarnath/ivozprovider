<?php

namespace Ast\Domain\Model\PsEndpoint;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PsEndpoint
 */
class PsEndpoint extends PsEndpointAbstract implements PsEndpointInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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

        $self = new self(
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'terminalId' => $this->getTerminal() ? $this->getTerminal()->getId() : null,
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null,
            'retailAccountId' => $this->getRetailAccount() ? $this->getRetailAccount()->getId() : null
        ];
    }


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
     * Set terminal
     *
     * @param \Core\Domain\Model\Terminal\TerminalInterface $terminal
     *
     * @return self
     */
    protected function setTerminal(\Core\Domain\Model\Terminal\TerminalInterface $terminal = null)
    {
        $this->terminal = $terminal;

        return $this;
    }

    /**
     * Get terminal
     *
     * @return \Core\Domain\Model\Terminal\TerminalInterface
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * Set friend
     *
     * @param \Core\Domain\Model\Friend\FriendInterface $friend
     *
     * @return self
     */
    protected function setFriend(\Core\Domain\Model\Friend\FriendInterface $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Core\Domain\Model\Friend\FriendInterface
     */
    public function getFriend()
    {
        return $this->friend;
    }

    /**
     * Set retailAccount
     *
     * @param \Core\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount
     *
     * @return self
     */
    protected function setRetailAccount(\Core\Domain\Model\RetailAccount\RetailAccountInterface $retailAccount = null)
    {
        $this->retailAccount = $retailAccount;

        return $this;
    }

    /**
     * Get retailAccount
     *
     * @return \Core\Domain\Model\RetailAccount\RetailAccountInterface
     */
    public function getRetailAccount()
    {
        return $this->retailAccount;
    }


}

