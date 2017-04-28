<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamUsersDomainAttrDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var integer
     */
    public $type;

    /**
     * @var string
     */
    public $value;

    /**
     * @column last_modified
     * @var \DateTime
     */
    public $lastModified = '1900-01-01 00:00:01';

    /**
     * @var mixed
     */
    public $didId;

    /**
     * @var mixed
     */
    public $did;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'value' => $this->getValue(),
            'lastModified' => $this->getLastModified(),
            'didId' => $this->getDidId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setType(isset($data['type']) ? $data['type'] : null)
            ->setValue(isset($data['value']) ? $data['value'] : null)
            ->setLastModified(isset($data['lastModified']) ? $data['lastModified'] : null)
            ->setDidId(isset($data['didId']) ? $data['didId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->did = $transformer->transform('Core\\Model\\Company\\Company', $this->getDidId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return KamUsersDomainAttrDTO
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
     * @param string $name
     *
     * @return KamUsersDomainAttrDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param integer $type
     *
     * @return KamUsersDomainAttrDTO
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $value
     *
     * @return KamUsersDomainAttrDTO
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param \DateTime $lastModified
     *
     * @return KamUsersDomainAttrDTO
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

    /**
     * @param integer $didId
     *
     * @return KamUsersDomainAttrDTO
     */
    public function setDidId($didId)
    {
        $this->didId = $didId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDidId()
    {
        return $this->didId;
    }

    /**
     * @return \Core\Model\Company\Company
     */
    public function getDid()
    {
        return $this->did;
    }
}

