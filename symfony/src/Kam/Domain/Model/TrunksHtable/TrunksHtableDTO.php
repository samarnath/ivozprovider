<?php

namespace Kam\Domain\Model\TrunksHtable;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TrunksHtableDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $keyName = '';

    /**
     * @var integer
     */
    private $keyType = '0';

    /**
     * @var integer
     */
    private $valueType = '0';

    /**
     * @var string
     */
    private $keyValue = '';

    /**
     * @var integer
     */
    private $expires = '0';

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'keyName' => $this->getKeyName(),
            'keyType' => $this->getKeyType(),
            'valueType' => $this->getValueType(),
            'keyValue' => $this->getKeyValue(),
            'expires' => $this->getExpires()
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
     * @return TrunksHtableDTO
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
     * @param string $keyName
     *
     * @return TrunksHtableDTO
     */
    public function setKeyName($keyName)
    {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * @param integer $keyType
     *
     * @return TrunksHtableDTO
     */
    public function setKeyType($keyType)
    {
        $this->keyType = $keyType;

        return $this;
    }

    /**
     * @return integer
     */
    public function getKeyType()
    {
        return $this->keyType;
    }

    /**
     * @param integer $valueType
     *
     * @return TrunksHtableDTO
     */
    public function setValueType($valueType)
    {
        $this->valueType = $valueType;

        return $this;
    }

    /**
     * @return integer
     */
    public function getValueType()
    {
        return $this->valueType;
    }

    /**
     * @param string $keyValue
     *
     * @return TrunksHtableDTO
     */
    public function setKeyValue($keyValue)
    {
        $this->keyValue = $keyValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * @param integer $expires
     *
     * @return TrunksHtableDTO
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }
}

