<?php

namespace Core\Domain\Model\EtagVersion;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class EtagVersionDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $table;

    /**
     * @var string
     */
    public $etag;

    /**
     * @var \DateTime
     */
    public $lastChange;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'table' => $this->getTable(),
            'etag' => $this->getEtag(),
            'lastChange' => $this->getLastChange()
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
            ->setTable(isset($data['table']) ? $data['table'] : null)
            ->setEtag(isset($data['etag']) ? $data['etag'] : null)
            ->setLastChange(isset($data['lastChange']) ? $data['lastChange'] : null);
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
}

