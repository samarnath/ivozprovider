<?php

namespace Core\Domain\Model\Schedule;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ScheduleDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $timeIn;

    /**
     * @var \DateTime
     */
    private $timeout;

    /**
     * @var boolean
     */
    private $monday = '0';

    /**
     * @var boolean
     */
    private $tuesday = '0';

    /**
     * @var boolean
     */
    private $wednesday = '0';

    /**
     * @var boolean
     */
    private $thursday = '0';

    /**
     * @var boolean
     */
    private $friday = '0';

    /**
     * @var boolean
     */
    private $saturday = '0';

    /**
     * @var boolean
     */
    private $sunday = '0';

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'timeIn' => $this->getTimeIn(),
            'timeout' => $this->getTimeout(),
            'monday' => $this->getMonday(),
            'tuesday' => $this->getTuesday(),
            'wednesday' => $this->getWednesday(),
            'thursday' => $this->getThursday(),
            'friday' => $this->getFriday(),
            'saturday' => $this->getSaturday(),
            'sunday' => $this->getSunday(),
            'companyId' => $this->getCompanyId()
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
            ->setTimeIn(isset($data['timeIn']) ? $data['timeIn'] : null)
            ->setTimeout(isset($data['timeout']) ? $data['timeout'] : null)
            ->setMonday(isset($data['monday']) ? $data['monday'] : null)
            ->setTuesday(isset($data['tuesday']) ? $data['tuesday'] : null)
            ->setWednesday(isset($data['wednesday']) ? $data['wednesday'] : null)
            ->setThursday(isset($data['thursday']) ? $data['thursday'] : null)
            ->setFriday(isset($data['friday']) ? $data['friday'] : null)
            ->setSaturday(isset($data['saturday']) ? $data['saturday'] : null)
            ->setSunday(isset($data['sunday']) ? $data['sunday'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ScheduleDTO
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
     * @return ScheduleDTO
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
     * @param \DateTime $timeIn
     *
     * @return ScheduleDTO
     */
    public function setTimeIn($timeIn)
    {
        $this->timeIn = $timeIn;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeIn()
    {
        return $this->timeIn;
    }

    /**
     * @param \DateTime $timeout
     *
     * @return ScheduleDTO
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param boolean $monday
     *
     * @return ScheduleDTO
     */
    public function setMonday($monday = null)
    {
        $this->monday = $monday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMonday()
    {
        return $this->monday;
    }

    /**
     * @param boolean $tuesday
     *
     * @return ScheduleDTO
     */
    public function setTuesday($tuesday = null)
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getTuesday()
    {
        return $this->tuesday;
    }

    /**
     * @param boolean $wednesday
     *
     * @return ScheduleDTO
     */
    public function setWednesday($wednesday = null)
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getWednesday()
    {
        return $this->wednesday;
    }

    /**
     * @param boolean $thursday
     *
     * @return ScheduleDTO
     */
    public function setThursday($thursday = null)
    {
        $this->thursday = $thursday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getThursday()
    {
        return $this->thursday;
    }

    /**
     * @param boolean $friday
     *
     * @return ScheduleDTO
     */
    public function setFriday($friday = null)
    {
        $this->friday = $friday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getFriday()
    {
        return $this->friday;
    }

    /**
     * @param boolean $saturday
     *
     * @return ScheduleDTO
     */
    public function setSaturday($saturday = null)
    {
        $this->saturday = $saturday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSaturday()
    {
        return $this->saturday;
    }

    /**
     * @param boolean $sunday
     *
     * @return ScheduleDTO
     */
    public function setSunday($sunday = null)
    {
        $this->sunday = $sunday;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSunday()
    {
        return $this->sunday;
    }

    /**
     * @param integer $companyId
     *
     * @return ScheduleDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }
}

