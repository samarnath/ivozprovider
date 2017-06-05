<?php

namespace Core\Model\PeerServer;



interface PeerServerInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get hostname
     *
     * @return string
     */
    public function getHostname();


    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();


    /**
     * Get params
     *
     * @return string
     */
    public function getParams();


    /**
     * Get uriScheme
     *
     * @return boolean
     */
    public function getUriScheme();


    /**
     * Get transport
     *
     * @return boolean
     */
    public function getTransport();


    /**
     * Get strip
     *
     * @return boolean
     */
    public function getStrip();


    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix();


    /**
     * Get sendPAI
     *
     * @return boolean
     */
    public function getSendPAI();


    /**
     * Get sendRPID
     *
     * @return boolean
     */
    public function getSendRPID();


    /**
     * Get authNeeded
     *
     * @return string
     */
    public function getAuthNeeded();


    /**
     * Get authUser
     *
     * @return string
     */
    public function getAuthUser();


    /**
     * Get authPassword
     *
     * @return string
     */
    public function getAuthPassword();


    /**
     * Get sipProxy
     *
     * @return string
     */
    public function getSipProxy();


    /**
     * Get outboundProxy
     *
     * @return string
     */
    public function getOutboundProxy();


    /**
     * Get fromUser
     *
     * @return string
     */
    public function getFromUser();


    /**
     * Get fromDomain
     *
     * @return string
     */
    public function getFromDomain();


    /**
     * Get peeringContract
     *
     * @return \Core\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract();


    /**
     * Get brand
     *
     * @return \Core\Model\Brand\BrandInterface
     */
    public function getBrand();



}

