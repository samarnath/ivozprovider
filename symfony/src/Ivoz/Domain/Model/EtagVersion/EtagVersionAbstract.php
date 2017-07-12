<?php

namespace Ivoz\Domain\Model\EtagVersion;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * EtagVersionAbstract
 */
abstract class EtagVersionAbstract
{
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

    abstract public function __wakeup();

    /**
     * @return EtagVersionDTO
     */
    public static function createDTO()
    {
        return new EtagVersionDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto EtagVersionDTO
         */
        Assertion::isInstanceOf($dto, EtagVersionDTO::class);

        $self = new static();

        return $self
            ->setTable($dto->getTable())
            ->setEtag($dto->getEtag())
            ->setLastChange($dto->getLastChange())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto EtagVersionDTO
         */
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
            'table' => $this->getTable(),
            'etag' => $this->getEtag(),
            'lastChange' => $this->getLastChange()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set table
     *
     * @param string $table
     *
     * @return self
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
     * @return self
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
     * @return self
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

