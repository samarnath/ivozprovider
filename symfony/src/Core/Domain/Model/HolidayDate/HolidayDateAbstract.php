<?php

namespace Core\Domain\Model\HolidayDate;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * HolidayDateAbstract
 */
abstract class HolidayDateAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $eventDate;

    /**
     * @var \Core\Domain\Model\Calendar\CalendarInterface
     */
    protected $calendar;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $locution;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name, $eventDate)
    {
        $this->setName($name);
        $this->setEventDate($eventDate);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return HolidayDateDTO
     */
    public static function createDTO()
    {
        return new HolidayDateDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HolidayDateDTO
         */
        Assertion::isInstanceOf($dto, HolidayDateDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getEventDate()
        );

        return $self
            ->setCalendar($dto->getCalendar())
            ->setLocution($dto->getLocution());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HolidayDateDTO
         */
        Assertion::isInstanceOf($dto, HolidayDateDTO::class);

        $this
            ->setName($dto->getName())
            ->setEventDate($dto->getEventDate())
            ->setCalendar($dto->getCalendar())
            ->setLocution($dto->getLocution());


        return $this;
    }

    /**
     * @return HolidayDateDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setEventDate($this->getEventDate())
            ->setCalendarId($this->getCalendar() ? $this->getCalendar()->getId() : null)
            ->setLocutionId($this->getLocution() ? $this->getLocution()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'eventDate' => $this->getEventDate(),
            'calendarId' => $this->getCalendar() ? $this->getCalendar()->getId() : null,
            'locutionId' => $this->getLocution() ? $this->getLocution()->getId() : null
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
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 50);

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return self
     */
    protected function setEventDate($eventDate)
    {
        Assertion::notNull($eventDate);

        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
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

    /**
     * Set locution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $locution
     *
     * @return self
     */
    protected function setLocution(\Core\Domain\Model\Locution\LocutionInterface $locution = null)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * Get locution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getLocution()
    {
        return $this->locution;
    }



    // @codeCoverageIgnoreEnd
}

