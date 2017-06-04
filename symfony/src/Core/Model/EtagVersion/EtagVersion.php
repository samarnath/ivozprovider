<?php

namespace Core\Model\EtagVersion;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * EtagVersion
 */
class EtagVersion implements EntityInterface, EtagVersionInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $etag;

    /**
     * @var \DateTime
     */
    protected $lastChange;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return EtagVersionDTO
     */
    public static function createDTO()
    {
        return new EtagVersionDTO();
    }

    /**
     * Factory method
     * @param EtagVersionDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, EtagVersionDTO::class);

        $self = new self();

        return $self
            ->setTable($dto->getTable())
            ->setEtag($dto->getEtag())
            ->setLastChange($dto->getLastChange());
    }

    /**
     * @param EtagVersionDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, EtagVersionDTO::class);

        $this
            ->setTable($dto->getTable())
            ->setEtag($dto->getEtag())
            ->setLastChange($dto->getLastChange());


        return $this;
    }

    /**
     * @return EtagVersionDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setTable($this->getTable())
            ->setEtag($this->getEtag())
            ->setLastChange($this->getLastChange());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'table' => $this->getTable(),
            'etag' => $this->getEtag(),
            'lastChange' => $this->getLastChange()
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
     * Set table
     *
     * @param string $table
     *
     * @return EtagVersion
     */
    protected function setTable($table = null)
    {
        if (!is_null($table)) {
            Assertion::maxLength($table, 55);
        }

        $this->table = $table;

        return $this;
    }

    /**
     * Get table
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set etag
     *
     * @param string $etag
     *
     * @return EtagVersion
     */
    protected function setEtag($etag = null)
    {
        if (!is_null($etag)) {
            Assertion::maxLength($etag, 255);
        }

        $this->etag = $etag;

        return $this;
    }

    /**
     * Get etag
     *
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Set lastChange
     *
     * @param \DateTime $lastChange
     *
     * @return EtagVersion
     */
    protected function setLastChange($lastChange = null)
    {
        if (!is_null($lastChange)) {
        }

        $this->lastChange = $lastChange;

        return $this;
    }

    /**
     * Get lastChange
     *
     * @return \DateTime
     */
    public function getLastChange()
    {
        return $this->lastChange;
    }



    // @codeCoverageIgnoreEnd
}

