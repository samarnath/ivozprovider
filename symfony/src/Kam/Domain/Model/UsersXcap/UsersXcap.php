<?php

namespace Kam\Domain\Model\UsersXcap;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersXcap
 */
class UsersXcap
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $doc;

    /**
     * @column doc_type
     * @var integer
     */
    protected $docType;

    /**
     * @var string
     */
    protected $etag;

    /**
     * @var integer
     */
    protected $source;

    /**
     * @column doc_uri
     * @var string
     */
    protected $docUri;

    /**
     * @var integer
     */
    protected $port;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $username,
        $domain,
        $doc,
        $docType,
        $etag,
        $source,
        $docUri,
        $port
    ) {
        $this->setUsername($username);
        $this->setDomain($domain);
        $this->setDoc($doc);
        $this->setDocType($docType);
        $this->setEtag($etag);
        $this->setSource($source);
        $this->setDocUri($docUri);
        $this->setPort($port);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return UsersXcapDTO
     */
    public static function createDTO()
    {
        return new UsersXcapDTO();
    }

    /**
     * Factory method
     * @param UsersXcapDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersXcapDTO::class);

        $self = new self(
            $dto->getUsername(),
            $dto->getDomain(),
            $dto->getDoc(),
            $dto->getDocType(),
            $dto->getEtag(),
            $dto->getSource(),
            $dto->getDocUri(),
            $dto->getPort()
        );

        return $self;
    }

    /**
     * @param UsersXcapDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersXcapDTO::class);

        $this
            ->setUsername($dto->getUsername())
            ->setDomain($dto->getDomain())
            ->setDoc($dto->getDoc())
            ->setDocType($dto->getDocType())
            ->setEtag($dto->getEtag())
            ->setSource($dto->getSource())
            ->setDocUri($dto->getDocUri())
            ->setPort($dto->getPort());


        return $this;
    }

    /**
     * @return UsersXcapDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setUsername($this->getUsername())
            ->setDomain($this->getDomain())
            ->setDoc($this->getDoc())
            ->setDocType($this->getDocType())
            ->setEtag($this->getEtag())
            ->setSource($this->getSource())
            ->setDocUri($this->getDocUri())
            ->setPort($this->getPort());
    }

    /**
     * @return array
     */
    protected function __toArray()
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
     * Set username
     *
     * @param string $username
     *
     * @return UsersXcap
     */
    protected function setUsername($username)
    {
        Assertion::notNull($username);
        Assertion::maxLength($username, 64);

        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return UsersXcap
     */
    protected function setDomain($domain)
    {
        Assertion::notNull($domain);
        Assertion::maxLength($domain, 190);

        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set doc
     *
     * @param string $doc
     *
     * @return UsersXcap
     */
    protected function setDoc($doc)
    {
        Assertion::notNull($doc);

        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc
     *
     * @return string
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * Set docType
     *
     * @param integer $docType
     *
     * @return UsersXcap
     */
    protected function setDocType($docType)
    {
        Assertion::notNull($docType);
        Assertion::integerish($docType);

        $this->docType = $docType;

        return $this;
    }

    /**
     * Get docType
     *
     * @return integer
     */
    public function getDocType()
    {
        return $this->docType;
    }

    /**
     * Set etag
     *
     * @param string $etag
     *
     * @return UsersXcap
     */
    protected function setEtag($etag)
    {
        Assertion::notNull($etag);
        Assertion::maxLength($etag, 64);

        $this->etag = $etag;

        return $this;
    }

    /**
     * Get etag
     *
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Set source
     *
     * @param integer $source
     *
     * @return UsersXcap
     */
    protected function setSource($source)
    {
        Assertion::notNull($source);
        Assertion::integerish($source);

        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return integer
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set docUri
     *
     * @param string $docUri
     *
     * @return UsersXcap
     */
    protected function setDocUri($docUri)
    {
        Assertion::notNull($docUri);
        Assertion::maxLength($docUri, 255);

        $this->docUri = $docUri;

        return $this;
    }

    /**
     * Get docUri
     *
     * @return string
     */
    public function getDocUri()
    {
        return $this->docUri;
    }

    /**
     * Set port
     *
     * @param integer $port
     *
     * @return UsersXcap
     */
    protected function setPort($port)
    {
        Assertion::notNull($port);
        Assertion::integerish($port);

        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }



    // @codeCoverageIgnoreEnd
}

