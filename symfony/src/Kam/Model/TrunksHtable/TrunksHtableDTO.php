<?php

namespace Kam\Model\TrunksHtable;

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
    public $id;

    /**
     * @column key_name
     * @var string
     */
    public $keyName = '';

    /**
     * @column key_type
     * @var integer
     */
    public $keyType = '0';

    /**
     * @column value_type
     * @var integer
     */
    public $valueType = '0';

    /**
     * @column key_value
     * @var string
     */
    public $keyValue = '';

    /**
     * @var integer
     */
    public $expires = '0';

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
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setKeyName(isset($data['keyName']) ? $data['keyName'] : null)
            ->setKeyType(isset($data['keyType']) ? $data['keyType'] : null)
            ->setValueType(isset($data['valueType']) ? $data['valueType'] : null)
            ->setKeyValue(isset($data['keyValue']) ? $data['keyValue'] : null)
            ->setExpires(isset($data['expires']) ? $data['expires'] : null);
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

