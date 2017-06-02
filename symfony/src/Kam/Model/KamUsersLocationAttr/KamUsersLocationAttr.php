<?php

namespace Kam\Model\KamUsersLocationAttr;

use Assert\Assertion;
use Kam\Application\DTO\KamUsersLocationAttrDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * KamUsersLocationAttr
 */
class KamUsersLocationAttr implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $ruid = '';

    /**
     * @var string
     */
    protected $username = '';

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $aname = '';

    /**
     * @var integer
     */
    protected $atype = '0';

    /**
     * @var string
     */
    protected $avalue = '';

    /**
     * @column last_modified
     * @var \DateTime
     */
    protected $lastModified = '1900-01-01 00:00:01';


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $ruid,
        $username,
        $aname,
        $atype,
        $avalue,
        $lastModified
    ) {
        $this->setRuid($ruid);
        $this->setUsername($username);
        $this->setAname($aname);
        $this->setAtype($atype);
        $this->setAvalue($avalue);
        $this->setLastModified($lastModified);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return KamUsersLocationAttrDTO
     */
    public static function createDTO()
    {
        return new KamUsersLocationAttrDTO();
    }

    /**
     * Factory method
     * @param KamUsersLocationAttrDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamUsersLocationAttrDTO::class);

        $self = new self(
            $dto->getRuid(),
            $dto->getUsername(),
            $dto->getAname(),
            $dto->getAtype(),
            $dto->getAvalue(),
            $dto->getLastModified()
        );

        return $self
            ->setDomain($dto->getDomain());
    }

    /**
     * @param KamUsersLocationAttrDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamUsersLocationAttrDTO::class);

        $this
            ->setRuid($dto->getRuid())
            ->setUsername($dto->getUsername())
            ->setDomain($dto->getDomain())
            ->setAname($dto->getAname())
            ->setAtype($dto->getAtype())
            ->setAvalue($dto->getAvalue())
            ->setLastModified($dto->getLastModified());


        return $this;
    }

    /**
     * @return KamUsersLocationAttrDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setRuid($this->getRuid())
            ->setUsername($this->getUsername())
            ->setDomain($this->getDomain())
            ->setAname($this->getAname())
            ->setAtype($this->getAtype())
            ->setAvalue($this->getAvalue())
            ->setLastModified($this->getLastModified());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'ruid' => $this->getRuid(),
            'username' => $this->getUsername(),
            'domain' => $this->getDomain(),
            'aname' => $this->getAname(),
            'atype' => $this->getAtype(),
            'avalue' => $this->getAvalue(),
            'lastModified' => $this->getLastModified()
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
     * Set ruid
     *
     * @param string $ruid
     *
     * @return KamUsersLocationAttr
     */
    protected function setRuid($ruid)
    {
        Assertion::notNull($ruid);
        Assertion::maxLength($ruid, 64);

        $this->ruid = $ruid;

        return $this;
    }

    /**
     * Get ruid
     *
     * @return string
     */
    public function getRuid()
    {
        return $this->ruid;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return KamUsersLocationAttr
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
     * @return KamUsersLocationAttr
     */
    protected function setDomain($domain = null)
    {
        if (!is_null($domain)) {
            Assertion::maxLength($domain, 190);
        }

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
     * Set aname
     *
     * @param string $aname
     *
     * @return KamUsersLocationAttr
     */
    protected function setAname($aname)
    {
        Assertion::notNull($aname);
        Assertion::maxLength($aname, 64);

        $this->aname = $aname;

        return $this;
    }

    /**
     * Get aname
     *
     * @return string
     */
    public function getAname()
    {
        return $this->aname;
    }

    /**
     * Set atype
     *
     * @param integer $atype
     *
     * @return KamUsersLocationAttr
     */
    protected function setAtype($atype)
    {
        Assertion::notNull($atype);
        Assertion::integerish($atype);

        $this->atype = $atype;

        return $this;
    }

    /**
     * Get atype
     *
     * @return integer
     */
    public function getAtype()
    {
        return $this->atype;
    }

    /**
     * Set avalue
     *
     * @param string $avalue
     *
     * @return KamUsersLocationAttr
     */
    protected function setAvalue($avalue)
    {
        Assertion::notNull($avalue);
        Assertion::maxLength($avalue, 255);

        $this->avalue = $avalue;

        return $this;
    }

    /**
     * Get avalue
     *
     * @return string
     */
    public function getAvalue()
    {
        return $this->avalue;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     *
     * @return KamUsersLocationAttr
     */
    protected function setLastModified($lastModified)
    {
        Assertion::notNull($lastModified);

        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }



    // @codeCoverageIgnoreEnd
}

