<?php

namespace Core\Domain\Model\LcrGateway;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * LcrGateway
 */
class LcrGateway extends LcrGatewayAbstract implements LcrGatewayInterface, EntityInterface
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
    public function __construct($lcrId, $gwName, $flags)
    {
        $this->setLcrId($lcrId);
        $this->setGwName($gwName);
        $this->setFlags($flags);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return LcrGatewayDTO
     */
    public static function createDTO()
    {
        return new LcrGatewayDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrGatewayDTO
         */
        Assertion::isInstanceOf($dto, LcrGatewayDTO::class);

        $self = new self(
            $dto->getLcrId(),
            $dto->getGwName(),
            $dto->getFlags());

        return $self
            ->setIp($dto->getIp())
            ->setHostname($dto->getHostname())
            ->setPort($dto->getPort())
            ->setParams($dto->getParams())
            ->setUriScheme($dto->getUriScheme())
            ->setTransport($dto->getTransport())
            ->setStrip($dto->getStrip())
            ->setPrefix($dto->getPrefix())
            ->setTag($dto->getTag())
            ->setDefunct($dto->getDefunct())
            ->setPeerServer($dto->getPeerServer())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrGatewayDTO
         */
        Assertion::isInstanceOf($dto, LcrGatewayDTO::class);

        $this
            ->setLcrId($dto->getLcrId())
            ->setGwName($dto->getGwName())
            ->setIp($dto->getIp())
            ->setHostname($dto->getHostname())
            ->setPort($dto->getPort())
            ->setParams($dto->getParams())
            ->setUriScheme($dto->getUriScheme())
            ->setTransport($dto->getTransport())
            ->setStrip($dto->getStrip())
            ->setPrefix($dto->getPrefix())
            ->setTag($dto->getTag())
            ->setFlags($dto->getFlags())
            ->setDefunct($dto->getDefunct())
            ->setPeerServer($dto->getPeerServer());


        return $this;
    }

    /**
     * @return LcrGatewayDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setLcrId($this->getLcrId())
            ->setGwName($this->getGwName())
            ->setIp($this->getIp())
            ->setHostname($this->getHostname())
            ->setPort($this->getPort())
            ->setParams($this->getParams())
            ->setUriScheme($this->getUriScheme())
            ->setTransport($this->getTransport())
            ->setStrip($this->getStrip())
            ->setPrefix($this->getPrefix())
            ->setTag($this->getTag())
            ->setFlags($this->getFlags())
            ->setDefunct($this->getDefunct())
            ->setId($this->getId())
            ->setPeerServerId($this->getPeerServer() ? $this->getPeerServer()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'lcrId' => $this->getLcrId(),
            'gwName' => $this->getGwName(),
            'ip' => $this->getIp(),
            'hostname' => $this->getHostname(),
            'port' => $this->getPort(),
            'params' => $this->getParams(),
            'uriScheme' => $this->getUriScheme(),
            'transport' => $this->getTransport(),
            'strip' => $this->getStrip(),
            'prefix' => $this->getPrefix(),
            'tag' => $this->getTag(),
            'flags' => $this->getFlags(),
            'defunct' => $this->getDefunct(),
            'id' => $this->getId(),
            'peerServerId' => $this->getPeerServer() ? $this->getPeerServer()->getId() : null
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
     * Set peerServer
     *
     * @param \Core\Domain\Model\PeerServer\PeerServerInterface $peerServer
     *
     * @return self
     */
    protected function setPeerServer(\Core\Domain\Model\PeerServer\PeerServerInterface $peerServer)
    {
        $this->peerServer = $peerServer;

        return $this;
    }

    /**
     * Get peerServer
     *
     * @return \Core\Domain\Model\PeerServer\PeerServerInterface
     */
    public function getPeerServer()
    {
        return $this->peerServer;
    }


}

