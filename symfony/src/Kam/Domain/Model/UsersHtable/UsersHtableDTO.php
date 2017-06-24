<?php

namespace Kam\Domain\Model\UsersHtable;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersHtableDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @column key_name
     * @var string
     */
    private $keyName = '';

    /**
     * @column key_type
     * @var integer
     */
    private $keyType = '0';

    /**
     * @column value_type
     * @var integer
     */
    private $valueType = '0';

    /**
     * @column key_value
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
     * @param array $data
     * @return self
     * @deprecated
     *
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
     * @return UsersHtableDTO
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
     * @return UsersHtableDTO
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
     * @return UsersHtableDTO
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
     * @return UsersHtableDTO
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
     * @return UsersHtableDTO
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
     * @return UsersHtableDTO
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

