<?php

namespace Kam\Domain\Model\UsersLocationAttr;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersLocationAttrDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ruid = '';

    /**
     * @var string
     */
    private $username = '';

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $aname = '';

    /**
     * @var integer
     */
    private $atype = '0';

    /**
     * @var string
     */
    private $avalue = '';

    /**
     * @var \DateTime
     */
    private $lastModified = '1900-01-01 00:00:01';

    /**
     * @return array
     */
    public function __toArray()
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
     * @return UsersLocationAttrDTO
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
     * @param string $ruid
     *
     * @return UsersLocationAttrDTO
     */
    public function setRuid($ruid)
    {
        $this->ruid = $ruid;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuid()
    {
        return $this->ruid;
    }

    /**
     * @param string $username
     *
     * @return UsersLocationAttrDTO
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
     * @return UsersLocationAttrDTO
     */
    public function setDomain($domain = null)
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
     * @param string $aname
     *
     * @return UsersLocationAttrDTO
     */
    public function setAname($aname)
    {
        $this->aname = $aname;

        return $this;
    }

    /**
     * @return string
     */
    public function getAname()
    {
        return $this->aname;
    }

    /**
     * @param integer $atype
     *
     * @return UsersLocationAttrDTO
     */
    public function setAtype($atype)
    {
        $this->atype = $atype;

        return $this;
    }

    /**
     * @return integer
     */
    public function getAtype()
    {
        return $this->atype;
    }

    /**
     * @param string $avalue
     *
     * @return UsersLocationAttrDTO
     */
    public function setAvalue($avalue)
    {
        $this->avalue = $avalue;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvalue()
    {
        return $this->avalue;
    }

    /**
     * @param \DateTime $lastModified
     *
     * @return UsersLocationAttrDTO
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }
}

