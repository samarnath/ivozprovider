<?php

namespace Core\Model\ExternalCallFilterRelCalendar;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ExternalCallFilterRelCalendarDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var mixed
     */
    public $filterId;

    /**
     * @var mixed
     */
    public $calendarId;

    /**
     * @var mixed
     */
    public $filter;

    /**
     * @var mixed
     */
    public $calendar;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'filterId' => $this->getFilterId(),
            'calendarId' => $this->getCalendarId()
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
            ->setFilterId(isset($data['filterId']) ? $data['filterId'] : null)
            ->setCalendarId(isset($data['calendarId']) ? $data['calendarId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->filter = $transformer->transform('Core\\Model\\ExternalCallFilter\\ExternalCallFilter', $this->getFilterId());
        $this->calendar = $transformer->transform('Core\\Model\\Calendar\\Calendar', $this->getCalendarId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ExternalCallFilterRelCalendarDTO
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
     * @param integer $filterId
     *
     * @return ExternalCallFilterRelCalendarDTO
     */
    public function setFilterId($filterId)
    {
        $this->filterId = $filterId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFilterId()
    {
        return $this->filterId;
    }

    /**
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param integer $calendarId
     *
     * @return ExternalCallFilterRelCalendarDTO
     */
    public function setCalendarId($calendarId)
    {
        $this->calendarId = $calendarId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCalendarId()
    {
        return $this->calendarId;
    }

    /**
     * @return \Core\Model\Calendar\Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }
}

