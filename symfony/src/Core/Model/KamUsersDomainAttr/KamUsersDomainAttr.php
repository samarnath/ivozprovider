<?php

namespace Core\Model\KamUsersDomainAttr;

use Assert\Assertion;
use Core\Application\DTO\KamUsersDomainAttrDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * KamUsersDomainAttr
 */
class KamUsersDomainAttr implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $type;

    /**
     * @var string
     */
    protected $value;

    /**
     * @column last_modified
     * @var \DateTime
     */
    protected $lastModified = '1900-01-01 00:00:01';

    /**
     * @var \Core\Model\Company\Company
     */
    protected $did;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name, $type, $value, $lastModified)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setValue($value);
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
     * @return KamUsersDomainAttrDTO
     */
    public static function createDTO()
    {
        return new KamUsersDomainAttrDTO();
    }

    /**
     * Factory method
     * @param KamUsersDomainAttrDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamUsersDomainAttrDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getType(),
            $dto->getValue(),
            $dto->getLastModified()
        );

        return $self
            ->setDid($dto->getDid());
    }

    /**
     * @param KamUsersDomainAttrDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamUsersDomainAttrDTO::class);

        $this
            ->setName($dto->getName())
            ->setType($dto->getType())
            ->setValue($dto->getValue())
            ->setLastModified($dto->getLastModified())
            ->setDid($dto->getDid());


        return $this;
    }

    /**
     * @return KamUsersDomainAttrDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setType($this->getType())
            ->setValue($this->getValue())
            ->setLastModified($this->getLastModified())
            ->setDidId($this->getDid() ? $this->getDid()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'value' => $this->getValue(),
            'lastModified' => $this->getLastModified(),
            'didId' => $this->getDid() ? $this->getDid()->getId() : null
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
     * Set name
     *
     * @param string $name
     *
     * @return KamUsersDomainAttr
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 32);

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return KamUsersDomainAttr
     */
    protected function setType($type)
    {
        Assertion::notNull($type);
        Assertion::integerish($type);
        Assertion::greaterOrEqualThan($type, 0);

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return KamUsersDomainAttr
     */
    protected function setValue($value)
    {
        Assertion::notNull($value);
        Assertion::maxLength($value, 255);

        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     *
     * @return KamUsersDomainAttr
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

    /**
     * Set did
     *
     * @param \Core\Model\Company\Company $did
     *
     * @return KamUsersDomainAttr
     */
    protected function setDid(\Core\Model\Company\Company $did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Get did
     *
     * @return \Core\Model\Company\Company
     */
    public function getDid()
    {
        return $this->did;
    }



    // @codeCoverageIgnoreEnd
}

