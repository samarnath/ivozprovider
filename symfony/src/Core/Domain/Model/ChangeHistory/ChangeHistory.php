<?php

namespace Core\Domain\Model\ChangeHistory;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ChangeHistory
 */
class ChangeHistory extends ChangeHistoryAbstract implements ChangeHistoryInterface, EntityInterface
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
    public function __construct(
        $user,
        $date,
        $action,
        $table,
        $objid,
        $field
    ) {
        $this->setUser($user);
        $this->setDate($date);
        $this->setAction($action);
        $this->setTable($table);
        $this->setObjid($objid);
        $this->setField($field);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return ChangeHistoryDTO
     */
    public static function createDTO()
    {
        return new ChangeHistoryDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ChangeHistoryDTO
         */
        Assertion::isInstanceOf($dto, ChangeHistoryDTO::class);

        $self = new self(
            $dto->getUser(),
            $dto->getDate(),
            $dto->getAction(),
            $dto->getTable(),
            $dto->getObjid(),
            $dto->getField());

        return $self
            ->setOldValue($dto->getOldValue())
            ->setNewValue($dto->getNewValue())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ChangeHistoryDTO
         */
        Assertion::isInstanceOf($dto, ChangeHistoryDTO::class);

        $this
            ->setUser($dto->getUser())
            ->setDate($dto->getDate())
            ->setAction($dto->getAction())
            ->setTable($dto->getTable())
            ->setObjid($dto->getObjid())
            ->setField($dto->getField())
            ->setOldValue($dto->getOldValue())
            ->setNewValue($dto->getNewValue());


        return $this;
    }

    /**
     * @return ChangeHistoryDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setUser($this->getUser())
            ->setDate($this->getDate())
            ->setAction($this->getAction())
            ->setTable($this->getTable())
            ->setObjid($this->getObjid())
            ->setField($this->getField())
            ->setOldValue($this->getOldValue())
            ->setNewValue($this->getNewValue())
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'user' => $this->getUser(),
            'date' => $this->getDate(),
            'action' => $this->getAction(),
            'table' => $this->getTable(),
            'objid' => $this->getObjid(),
            'field' => $this->getField(),
            'oldValue' => $this->getOldValue(),
            'newValue' => $this->getNewValue(),
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

