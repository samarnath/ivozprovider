<?php

namespace Kam\Domain\Model\UsersDomainAttr;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersDomainAttr
 */
class UsersDomainAttr extends UsersDomainAttrAbstract implements UsersDomainAttrInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersDomainAttrDTO
         */
        Assertion::isInstanceOf($dto, UsersDomainAttrDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getType(),
            $dto->getValue(),
            $dto->getLastModified());

        return $self
            ->setDid($dto->getDid())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersDomainAttrDTO
         */
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
            ->setName($this->getName())
            ->setType($this->getType())
            ->setValue($this->getValue())
            ->setLastModified($this->getLastModified())
            ->setId($this->getId())
            ->setDidId($this->getDid() ? $this->getDid()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'type' => $this->getType(),
            'value' => $this->getValue(),
            'lastModified' => $this->getLastModified(),
            'id' => $this->getId(),
            'didId' => $this->getDid() ? $this->getDid()->getId() : null
        ];
    }


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
     * Set did
     *
     * @param \Core\Domain\Model\Company\CompanyInterface $did
     *
     * @return self
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


}

