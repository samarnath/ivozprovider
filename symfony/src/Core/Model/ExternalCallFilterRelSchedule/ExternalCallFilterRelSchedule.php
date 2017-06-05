<?php

namespace Core\Model\ExternalCallFilterRelSchedule;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilterRelSchedule
 */
class ExternalCallFilterRelSchedule implements EntityInterface, ExternalCallFilterRelScheduleInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Core\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    protected $filter;

    /**
     * @var \Core\Model\Schedule\ScheduleInterface
     */
    protected $schedule;


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
     * @return ExternalCallFilterRelScheduleDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterRelScheduleDTO();
    }

    /**
     * Factory method
     * @param ExternalCallFilterRelScheduleDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExternalCallFilterRelScheduleDTO::class);

        $self = new self();

        return $self
            ->setFilter($dto->getFilter())
            ->setSchedule($dto->getSchedule());
    }

    /**
     * @param ExternalCallFilterRelScheduleDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, ExternalCallFilterRelScheduleDTO::class);

        $this
            ->setFilter($dto->getFilter())
            ->setSchedule($dto->getSchedule());


        return $this;
    }

    /**
     * @return ExternalCallFilterRelScheduleDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setFilterId($this->getFilter() ? $this->getFilter()->getId() : null)
            ->setScheduleId($this->getSchedule() ? $this->getSchedule()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'filterId' => $this->getFilter() ? $this->getFilter()->getId() : null,
            'scheduleId' => $this->getSchedule() ? $this->getSchedule()->getId() : null
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
     * @param \Core\Model\ExternalCallFilter\ExternalCallFilterInterface $filter
     *
     * @return ExternalCallFilterRelSchedule
     */
    protected function setFilter(\Core\Model\ExternalCallFilter\ExternalCallFilterInterface $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \Core\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set schedule
     *
     * @param \Core\Model\Schedule\ScheduleInterface $schedule
     *
     * @return ExternalCallFilterRelSchedule
     */
    protected function setSchedule(\Core\Model\Schedule\ScheduleInterface $schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \Core\Model\Schedule\ScheduleInterface
     */
    public function getSchedule()
    {
        return $this->schedule;
    }



    // @codeCoverageIgnoreEnd
}

