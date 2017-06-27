<?php

namespace Ast\Domain\Model\Musiconhold;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Musiconhold
 */
class Musiconhold extends MusiconholdAbstract implements MusiconholdInterface, EntityInterface
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
    public function __construct($name)
    {
        $this->setName($name);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return MusiconholdDTO
     */
    public static function createDTO()
    {
        return new MusiconholdDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MusiconholdDTO
         */
        Assertion::isInstanceOf($dto, MusiconholdDTO::class);

        $self = new self(
            $dto->getName());

        return $self
            ->setMode($dto->getMode())
            ->setDirectory($dto->getDirectory())
            ->setApplication($dto->getApplication())
            ->setDigit($dto->getDigit())
            ->setSort($dto->getSort())
            ->setFormat($dto->getFormat())
            ->setStamp($dto->getStamp())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MusiconholdDTO
         */
        Assertion::isInstanceOf($dto, MusiconholdDTO::class);

        $this
            ->setName($dto->getName())
            ->setMode($dto->getMode())
            ->setDirectory($dto->getDirectory())
            ->setApplication($dto->getApplication())
            ->setDigit($dto->getDigit())
            ->setSort($dto->getSort())
            ->setFormat($dto->getFormat())
            ->setStamp($dto->getStamp());


        return $this;
    }

    /**
     * @return MusiconholdDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setMode($this->getMode())
            ->setDirectory($this->getDirectory())
            ->setApplication($this->getApplication())
            ->setDigit($this->getDigit())
            ->setSort($this->getSort())
            ->setFormat($this->getFormat())
            ->setStamp($this->getStamp())
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'mode' => $this->getMode(),
            'directory' => $this->getDirectory(),
            'application' => $this->getApplication(),
            'digit' => $this->getDigit(),
            'sort' => $this->getSort(),
            'format' => $this->getFormat(),
            'stamp' => $this->getStamp(),
            'id' => $this->getId()
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


}

