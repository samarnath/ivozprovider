<?php

namespace Core\Domain\Model\ExternalCallFilterRelCalendar;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilterRelCalendarAbstract
 */
abstract class ExternalCallFilterRelCalendarAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    protected $filter;

    /**
     * @var \Core\Domain\Model\Calendar\CalendarInterface
     */
    protected $calendar;


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
     * @return ExternalCallFilterRelCalendarDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterRelCalendarDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterRelCalendarDTO
         */
        Assertion::isInstanceOf($dto, ExternalCallFilterRelCalendarDTO::class);

        $self = new static();

        return $self
            ->setFilter($dto->getFilter())
            ->setCalendar($dto->getCalendar());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterRelCalendarDTO
         */
        Assertion::isInstanceOf($dto, ExternalCallFilterRelCalendarDTO::class);

        $this
            ->setFilter($dto->getFilter())
            ->setCalendar($dto->getCalendar());


        return $this;
    }

    /**
     * @return ExternalCallFilterRelCalendarDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setFilterId($this->getFilter() ? $this->getFilter()->getId() : null)
            ->setCalendarId($this->getCalendar() ? $this->getCalendar()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'filterId' => $this->getFilter() ? $this->getFilter()->getId() : null,
            'calendarId' => $this->getCalendar() ? $this->getCalendar()->getId() : null
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
     * Set filter
     *
     * @param \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $filter
     *
     * @return self
     */
    protected function setFilter(\Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \Core\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set calendar
     *
     * @param \Core\Domain\Model\Calendar\CalendarInterface $calendar
     *
     * @return self
     */
    protected function setCalendar(\Core\Domain\Model\Calendar\CalendarInterface $calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return \Core\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar()
    {
        return $this->calendar;
    }



    // @codeCoverageIgnoreEnd
}

