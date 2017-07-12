<?php

namespace Kam\Domain\Model\UsersHtable;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersHtableAbstract
 */
abstract class UsersHtableAbstract
{
    /**
     * @column key_name
     * @var string
     */
    protected $keyName = '';

    /**
     * @column key_type
     * @var integer
     */
    protected $keyType = '0';

    /**
     * @column value_type
     * @var integer
     */
    protected $valueType = '0';

    /**
     * @column key_value
     * @var string
     */
    protected $keyValue = '';

    /**
     * @var integer
     */
    protected $expires = '0';


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $keyName,
        $keyType,
        $valueType,
        $keyValue,
        $expires
    ) {
        $this->setKeyName($keyName);
        $this->setKeyType($keyType);
        $this->setValueType($valueType);
        $this->setKeyValue($keyValue);
        $this->setExpires($expires);
    }

    abstract public function __wakeup();

    /**
     * @return UsersHtableDTO
     */
    public static function createDTO()
    {
        return new UsersHtableDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersHtableDTO
         */
        Assertion::isInstanceOf($dto, UsersHtableDTO::class);

        $self = new static(
            $dto->getKeyName(),
            $dto->getKeyType(),
            $dto->getValueType(),
            $dto->getKeyValue(),
            $dto->getExpires());

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersHtableDTO
         */
        Assertion::isInstanceOf($dto, UsersHtableDTO::class);

        $this
            ->setKeyName($dto->getKeyName())
            ->setKeyType($dto->getKeyType())
            ->setValueType($dto->getValueType())
            ->setKeyValue($dto->getKeyValue())
            ->setExpires($dto->getExpires());


        return $this;
    }

    /**
     * @return UsersHtableDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setKeyName($this->getKeyName())
            ->setKeyType($this->getKeyType())
            ->setValueType($this->getValueType())
            ->setKeyValue($this->getKeyValue())
            ->setExpires($this->getExpires());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'keyName' => $this->getKeyName(),
            'keyType' => $this->getKeyType(),
            'valueType' => $this->getValueType(),
            'keyValue' => $this->getKeyValue(),
            'expires' => $this->getExpires()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set keyName
     *
     * @param string $keyName
     *
     * @return self
     */
    protected function setKeyName($keyName)
    {
        Assertion::notNull($keyName);
        Assertion::maxLength($keyName, 64);

        $this->keyName = $keyName;

        return $this;
    }

    /**
     * Get keyName
     *
     * @return string
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * Set keyType
     *
     * @param integer $keyType
     *
     * @return self
     */
    protected function setKeyType($keyType)
    {
        Assertion::notNull($keyType);
        Assertion::integerish($keyType);

        $this->keyType = $keyType;

        return $this;
    }

    /**
     * Get keyType
     *
     * @return integer
     */
    public function getKeyType()
    {
        return $this->keyType;
    }

    /**
     * Set valueType
     *
     * @param integer $valueType
     *
     * @return self
     */
    protected function setValueType($valueType)
    {
        Assertion::notNull($valueType);
        Assertion::integerish($valueType);

        $this->valueType = $valueType;

        return $this;
    }

    /**
     * Get valueType
     *
     * @return integer
     */
    public function getValueType()
    {
        return $this->valueType;
    }

    /**
     * Set keyValue
     *
     * @param string $keyValue
     *
     * @return self
     */
    protected function setKeyValue($keyValue)
    {
        Assertion::notNull($keyValue);
        Assertion::maxLength($keyValue, 128);

        $this->keyValue = $keyValue;

        return $this;
    }

    /**
     * Get keyValue
     *
     * @return string
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return self
     */
    protected function setExpires($expires)
    {
        Assertion::notNull($expires);
        Assertion::integerish($expires);

        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }



    // @codeCoverageIgnoreEnd
}

