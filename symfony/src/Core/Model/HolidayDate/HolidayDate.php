<?php

namespace Core\Model\HolidayDate;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * HolidayDate
 */
class HolidayDate implements EntityInterface, HolidayDateInterface
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
     * @var \Core\Model\Calendar\Calendar
     */
    protected $calendar;

    /**
     * @var \Core\Model\Locution\Locution
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
     * @param HolidayDateDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, HolidayDateDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getEventDate()
        );

        return $self
            ->setCalendar($dto->getCalendar())
            ->setLocution($dto->getLocution());
    }

    /**
     * @param HolidayDateDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
        return self::createDTO()
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
     * @return HolidayDate
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
     * @return HolidayDate
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
     * @param \Core\Model\Calendar\Calendar $calendar
     *
     * @return HolidayDate
     */
    protected function setCalendar(\Core\Model\Calendar\Calendar $calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return \Core\Model\Calendar\Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * Set locution
     *
     * @param \Core\Model\Locution\Locution $locution
     *
     * @return HolidayDate
     */
    protected function setLocution(\Core\Model\Locution\Locution $locution = null)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * Get locution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getLocution()
    {
        return $this->locution;
    }



    // @codeCoverageIgnoreEnd
}

