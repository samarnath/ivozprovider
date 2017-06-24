<?php

namespace Core\Domain\Model\ChangeHistory;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ChangeHistoryDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $table;

    /**
     * @var integer
     */
    private $objid;

    /**
     * @var string
     */
    private $field;

    /**
     * @column old_value
     * @var string
     */
    private $oldValue;

    /**
     * @column new_value
     * @var string
     */
    private $newValue;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
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

    /**
     * @param array $data
     * @return self
     * @deprecated
     *
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setUser(isset($data['user']) ? $data['user'] : null)
            ->setDate(isset($data['date']) ? $data['date'] : null)
            ->setAction(isset($data['action']) ? $data['action'] : null)
            ->setTable(isset($data['table']) ? $data['table'] : null)
            ->setObjid(isset($data['objid']) ? $data['objid'] : null)
            ->setField(isset($data['field']) ? $data['field'] : null)
            ->setOldValue(isset($data['oldValue']) ? $data['oldValue'] : null)
            ->setNewValue(isset($data['newValue']) ? $data['newValue'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ChangeHistoryDTO
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
     * @param string $user
     *
     * @return ChangeHistoryDTO
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \DateTime $date
     *
     * @return ChangeHistoryDTO
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $action
     *
     * @return ChangeHistoryDTO
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $table
     *
     * @return ChangeHistoryDTO
     */
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param integer $objid
     *
     * @return ChangeHistoryDTO
     */
    public function setObjid($objid)
    {
        $this->objid = $objid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getObjid()
    {
        return $this->objid;
    }

    /**
     * @param string $field
     *
     * @return ChangeHistoryDTO
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $oldValue
     *
     * @return ChangeHistoryDTO
     */
    public function setOldValue($oldValue = null)
    {
        $this->oldValue = $oldValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getOldValue()
    {
        return $this->oldValue;
    }

    /**
     * @param string $newValue
     *
     * @return ChangeHistoryDTO
     */
    public function setNewValue($newValue = null)
    {
        $this->newValue = $newValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNewValue()
    {
        return $this->newValue;
    }
}

