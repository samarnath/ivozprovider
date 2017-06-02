<?php

namespace Kam\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamUsersXcapDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $doc;

    /**
     * @column doc_type
     * @var integer
     */
    public $docType;

    /**
     * @var string
     */
    public $etag;

    /**
     * @var integer
     */
    public $source;

    /**
     * @column doc_uri
     * @var string
     */
    public $docUri;

    /**
     * @var integer
     */
    public $port;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'domain' => $this->getDomain(),
            'doc' => $this->getDoc(),
            'docType' => $this->getDocType(),
            'etag' => $this->getEtag(),
            'source' => $this->getSource(),
            'docUri' => $this->getDocUri(),
            'port' => $this->getPort()
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
            ->setUsername(isset($data['username']) ? $data['username'] : null)
            ->setDomain(isset($data['domain']) ? $data['domain'] : null)
            ->setDoc(isset($data['doc']) ? $data['doc'] : null)
            ->setDocType(isset($data['docType']) ? $data['docType'] : null)
            ->setEtag(isset($data['etag']) ? $data['etag'] : null)
            ->setSource(isset($data['source']) ? $data['source'] : null)
            ->setDocUri(isset($data['docUri']) ? $data['docUri'] : null)
            ->setPort(isset($data['port']) ? $data['port'] : null);
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
     * @return KamUsersXcapDTO
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
     * @param string $username
     *
     * @return KamUsersXcapDTO
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $domain
     *
     * @return KamUsersXcapDTO
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $doc
     *
     * @return KamUsersXcapDTO
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * @return string
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * @param integer $docType
     *
     * @return KamUsersXcapDTO
     */
    public function setDocType($docType)
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDocType()
    {
        return $this->docType;
    }

    /**
     * @param string $etag
     *
     * @return KamUsersXcapDTO
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;

        return $this;
    }

    /**
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param integer $source
     *
     * @return KamUsersXcapDTO
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $docUri
     *
     * @return KamUsersXcapDTO
     */
    public function setDocUri($docUri)
    {
        $this->docUri = $docUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocUri()
    {
        return $this->docUri;
    }

    /**
     * @param integer $port
     *
     * @return KamUsersXcapDTO
     */
    public function setPort($port)
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
}

