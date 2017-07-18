<?php

namespace Ivoz\Domain\Model\EtagVersion;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class EtagVersionDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $etag;

    /**
     * @var \DateTime
     */
    private $lastChange;

    /**
     * @var integer
     */
    private $id;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'table' => $this->getTable(),
            'etag' => $this->getEtag(),
            'lastChange' => $this->getLastChange(),
            'id' => $this->getId()
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
     * @param string $table
     *
     * @return EtagVersionDTO
     */
    public function setTable($table = null)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $etag
     *
     * @return EtagVersionDTO
     */
    public function setEtag($etag = null)
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
     * @param \DateTime $lastChange
     *
     * @return EtagVersionDTO
     */
    public function setLastChange($lastChange = null)
    {
        $this->lastChange = $lastChange;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastChange()
    {
        return $this->lastChange;
    }

    /**
     * @param integer $id
     *
     * @return EtagVersionDTO
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
}

