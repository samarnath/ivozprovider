<?php

namespace Ivoz\Domain\Model\ChangeHistory;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ChangeHistoryAbstract
 */
abstract class ChangeHistoryAbstract
{
    /**
     * @var string
     */
    protected $user;

    /**
     * @var \DateTime
     */
    protected $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var integer
     */
    protected $objid;

    /**
     * @var string
     */
    protected $field;

    /**
     * @column old_value
     * @var string
     */
    protected $oldValue;

    /**
     * @column new_value
     * @var string
     */
    protected $newValue;


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

    abstract public function __wakeup();

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

        $self = new static(
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
            ->setNewValue($this->getNewValue());
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
            'newValue' => $this->getNewValue()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set user
     *
     * @param string $user
     *
     * @return self
     */
    protected function setUser($user)
    {
        Assertion::notNull($user);
        Assertion::maxLength($user, 50);

        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return self
     */
    protected function setDate($date)
    {
        Assertion::notNull($date);

        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return self
     */
    protected function setAction($action)
    {
        Assertion::notNull($action);
        Assertion::maxLength($action, 15);

        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set table
     *
     * @param string $table
     *
     * @return self
     */
    protected function setTable($table)
    {
        Assertion::notNull($table);
        Assertion::maxLength($table, 50);

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
     * Set objid
     *
     * @param integer $objid
     *
     * @return self
     */
    protected function setObjid($objid)
    {
        Assertion::notNull($objid);
        Assertion::integerish($objid);
        Assertion::greaterOrEqualThan($objid, 0);

        $this->objid = $objid;

        return $this;
    }

    /**
     * Get objid
     *
     * @return integer
     */
    public function getObjid()
    {
        return $this->objid;
    }

    /**
     * Set field
     *
     * @param string $field
     *
     * @return self
     */
    protected function setField($field)
    {
        Assertion::notNull($field);
        Assertion::maxLength($field, 50);

        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set oldValue
     *
     * @param string $oldValue
     *
     * @return self
     */
    protected function setOldValue($oldValue = null)
    {
        if (!is_null($oldValue)) {
            Assertion::maxLength($oldValue, 250);
        }

        $this->oldValue = $oldValue;

        return $this;
    }

    /**
     * Get oldValue
     *
     * @return string
     */
    public function getOldValue()
    {
        return $this->oldValue;
    }

    /**
     * Set newValue
     *
     * @param string $newValue
     *
     * @return self
     */
    protected function setNewValue($newValue = null)
    {
        if (!is_null($newValue)) {
            Assertion::maxLength($newValue, 250);
        }

        $this->newValue = $newValue;

        return $this;
    }

    /**
     * Get newValue
     *
     * @return string
     */
    public function getNewValue()
    {
        return $this->newValue;
    }



    // @codeCoverageIgnoreEnd
}

