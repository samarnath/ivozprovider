<?php

namespace Core\Domain\Model\LcrGateway;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class LcrGatewayDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @column lcr_id
     * @var integer
     */
    private $lcrId = '1';

    /**
     * @column gw_name
     * @var string
     */
    private $gwName;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $hostname;

    /**
     * @var integer
     */
    private $port;

    /**
     * @var string
     */
    private $params;

    /**
     * @column uri_scheme
     * @var boolean
     */
    private $uriScheme;

    /**
     * @var boolean
     */
    private $transport;

    /**
     * @var boolean
     */
    private $strip;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $tag;

    /**
     * @var integer
     */
    private $flags = '0';

    /**
     * @var integer
     */
    private $defunct;

    /**
     * @var mixed
     */
    private $peerServerId;

    /**
     * @var mixed
     */
    private $peerServer;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
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
            'peerServerId' => $this->getPeerServerId()
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
            ->setLcrId(isset($data['lcrId']) ? $data['lcrId'] : null)
            ->setGwName(isset($data['gwName']) ? $data['gwName'] : null)
            ->setIp(isset($data['ip']) ? $data['ip'] : null)
            ->setHostname(isset($data['hostname']) ? $data['hostname'] : null)
            ->setPort(isset($data['port']) ? $data['port'] : null)
            ->setParams(isset($data['params']) ? $data['params'] : null)
            ->setUriScheme(isset($data['uriScheme']) ? $data['uriScheme'] : null)
            ->setTransport(isset($data['transport']) ? $data['transport'] : null)
            ->setStrip(isset($data['strip']) ? $data['strip'] : null)
            ->setPrefix(isset($data['prefix']) ? $data['prefix'] : null)
            ->setTag(isset($data['tag']) ? $data['tag'] : null)
            ->setFlags(isset($data['flags']) ? $data['flags'] : null)
            ->setDefunct(isset($data['defunct']) ? $data['defunct'] : null)
            ->setPeerServerId(isset($data['peerServerId']) ? $data['peerServerId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->peerServer = $transformer->transform('Core\\Domain\\Model\\PeerServer\\PeerServerInterface', $this->getPeerServerId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return LcrGatewayDTO
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
     * @param integer $lcrId
     *
     * @return LcrGatewayDTO
     */
    public function setLcrId($lcrId)
    {
        $this->lcrId = $lcrId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLcrId()
    {
        return $this->lcrId;
    }

    /**
     * @param string $gwName
     *
     * @return LcrGatewayDTO
     */
    public function setGwName($gwName)
    {
        $this->gwName = $gwName;

        return $this;
    }

    /**
     * @return string
     */
    public function getGwName()
    {
        return $this->gwName;
    }

    /**
     * @param string $ip
     *
     * @return LcrGatewayDTO
     */
    public function setIp($ip = null)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $hostname
     *
     * @return LcrGatewayDTO
     */
    public function setHostname($hostname = null)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param integer $port
     *
     * @return LcrGatewayDTO
     */
    public function setPort($port = null)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $params
     *
     * @return LcrGatewayDTO
     */
    public function setParams($params = null)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param boolean $uriScheme
     *
     * @return LcrGatewayDTO
     */
    public function setUriScheme($uriScheme = null)
    {
        $this->uriScheme = $uriScheme;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getUriScheme()
    {
        return $this->uriScheme;
    }

    /**
     * @param boolean $transport
     *
     * @return LcrGatewayDTO
     */
    public function setTransport($transport = null)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param boolean $strip
     *
     * @return LcrGatewayDTO
     */
    public function setStrip($strip = null)
    {
        $this->strip = $strip;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getStrip()
    {
        return $this->strip;
    }

    /**
     * @param string $prefix
     *
     * @return LcrGatewayDTO
     */
    public function setPrefix($prefix = null)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $tag
     *
     * @return LcrGatewayDTO
     */
    public function setTag($tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param integer $flags
     *
     * @return LcrGatewayDTO
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $defunct
     *
     * @return LcrGatewayDTO
     */
    public function setDefunct($defunct = null)
    {
        $this->defunct = $defunct;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDefunct()
    {
        return $this->defunct;
    }

    /**
     * @param integer $peerServerId
     *
     * @return LcrGatewayDTO
     */
    public function setPeerServerId($peerServerId)
    {
        $this->peerServerId = $peerServerId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeerServerId()
    {
        return $this->peerServerId;
    }

    /**
     * @return \Core\Domain\Model\PeerServer\PeerServerInterface
     */
    public function getPeerServer()
    {
        return $this->peerServer;
    }
}

