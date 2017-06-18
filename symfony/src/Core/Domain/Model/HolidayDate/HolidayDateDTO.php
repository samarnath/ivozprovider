<?php

namespace Core\Domain\Model\HolidayDate;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class HolidayDateDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var \DateTime
     */
    public $eventDate;

    /**
     * @var mixed
     */
    public $calendarId;

    /**
     * @var mixed
     */
    public $locutionId;

    /**
     * @var mixed
     */
    public $calendar;

    /**
     * @var mixed
     */
    public $locution;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'eventDate' => $this->getEventDate(),
            'calendarId' => $this->getCalendarId(),
            'locutionId' => $this->getLocutionId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setEventDate(isset($data['eventDate']) ? $data['eventDate'] : null)
            ->setCalendarId(isset($data['calendarId']) ? $data['calendarId'] : null)
            ->setLocutionId(isset($data['locutionId']) ? $data['locutionId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->calendar = $transformer->transform('Core\\Model\\Calendar\\Calendar', $this->getCalendarId());
        $this->locution = $transformer->transform('Core\\Model\\Locution\\Locution', $this->getLocutionId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return HolidayDateDTO
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
     * @param string $name
     *
     * @return HolidayDateDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $eventDate
     *
     * @return HolidayDateDTO
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @param integer $calendarId
     *
     * @return HolidayDateDTO
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
     * @return \Core\Domain\Model\Calendar\Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param integer $locutionId
     *
     * @return HolidayDateDTO
     */
    public function setLocutionId($locutionId)
    {
        $this->locutionId = $locutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLocutionId()
    {
        return $this->locutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\Locution
     */
    public function getLocution()
    {
        return $this->locution;
    }
}

