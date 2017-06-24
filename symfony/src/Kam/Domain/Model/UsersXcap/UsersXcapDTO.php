<?php

namespace Kam\Domain\Model\UsersXcap;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersXcapDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $doc;

    /**
     * @column doc_type
     * @var integer
     */
    private $docType;

    /**
     * @var string
     */
    private $etag;

    /**
     * @var integer
     */
    private $source;

    /**
     * @column doc_uri
     * @var string
     */
    private $docUri;

    /**
     * @var integer
     */
    private $port;

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
     * @deprecated
     *
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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
     * @return UsersXcapDTO
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

