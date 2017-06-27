<?php

namespace Ast\Domain\Model\PsEndpoint;



interface PsEndpointInterface
{
    /**
     * Get sorceryId
     *
     * @return string
     */
    public function getSorceryId();


    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain();


    /**
     * Get aors
     *
     * @return string
     */
    public function getAors();


    /**
     * Get callerid
     *
     * @return string
     */
    public function getCallerid();


    /**
     * Get context
     *
     * @return string
     */
    public function getContext();


    /**
     * Get disallow
     *
     * @return string
     */
    public function getDisallow();


    /**
     * Get allow
     *
     * @return string
     */
    public function getAllow();


    /**
     * Get directMedia
     *
     * @return string
     */
    public function getDirectMedia();


    /**
     * Get directMediaMethod
     *
     * @return string
     */
    public function getDirectMediaMethod();


    /**
     * Get mailboxes
     *
     * @return string
     */
    public function getMailboxes();


    /**
     * Get pickupGroup
     *
     * @return string
     */
    public function getPickupGroup();


    /**
     * Get sendDiversion
     *
     * @return string
     */
    public function getSendDiversion();


    /**
     * Get sendPai
     *
     * @return string
     */
    public function getSendPai();


    /**
     * Get subscribecontext
     *
     * @return string
     */
    public function getSubscribecontext();


    /**
     * Get oneHundredRel
     *
     * @return string
     */
    public function getOneHundredRel();


    /**
     * Get outboundProxy
     *
     * @return string
     */
    public function getOutboundProxy();


    /**
     * Get trustIdInbound
     *
     * @return string
     */
    public function getTrustIdInbound();


    /**
     * Get terminal
     *
     * @return \Core\Domain\Model\Terminal\TerminalInterface
     */
    public function getTerminal();


    /**
     * Get friend
     *
     * @return \Core\Domain\Model\Friend\FriendInterface
     */
    public function getFriend();


    /**
     * Get retailAccount
     *
     * @return \Core\Domain\Model\RetailAccount\RetailAccountInterface
     */
    public function getRetailAccount();



}

