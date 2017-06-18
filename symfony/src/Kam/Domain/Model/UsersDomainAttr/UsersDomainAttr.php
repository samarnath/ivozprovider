<?php

namespace Kam\Domain\Model\UsersDomainAttr;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersDomainAttr
 */
class UsersDomainAttr
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
     * @var \Core\Domain\Model\Company\CompanyInterface
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
     * @return UsersDomainAttrDTO
     */
    public static function createDTO()
    {
        return new UsersDomainAttrDTO();
    }

    /**
     * Factory method
     * @param UsersDomainAttrDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersDomainAttrDTO::class);

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
     * @param UsersDomainAttrDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, UsersDomainAttrDTO::class);

        $this
            ->setName($dto->getName())
            ->setType($dto->getType())
            ->setValue($dto->getValue())
            ->setLastModified($dto->getLastModified())
            ->setDid($dto->getDid());


        return $this;
    }

    /**
     * @return UsersDomainAttrDTO
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
     * @return UsersDomainAttr
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
     * @return UsersDomainAttr
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
     * @return UsersDomainAttr
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
     * @return UsersDomainAttr
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
     * @param \Core\Domain\Model\Company\CompanyInterface $did
     *
     * @return UsersDomainAttr
     */
    protected function setDid(\Core\Domain\Model\Company\CompanyInterface $did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Get did
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getDid()
    {
        return $this->did;
    }



    // @codeCoverageIgnoreEnd
}

