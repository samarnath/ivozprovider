<?php

namespace Ivoz\Domain\Model\ExternalCallFilter;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilter
 */
class ExternalCallFilter extends ExternalCallFilterAbstract implements ExternalCallFilterInterface, EntityInterface
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
    public function __construct()
    {
        parent::__construct(...func_get_args());

    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return ExternalCallFilterDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterDTO
         */
        $self = parent::fromDTO($dto);

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return ExternalCallFilterDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => $this->getId(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'welcomeLocutionId' => $this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null,
            'holidayLocutionId' => $this->getHolidayLocution() ? $this->getHolidayLocution()->getId() : null,
            'outOfScheduleLocutionId' => $this->getOutOfScheduleLocution() ? $this->getOutOfScheduleLocution()->getId() : null,
            'holidayExtensionId' => $this->getHolidayExtension() ? $this->getHolidayExtension()->getId() : null,
            'outOfScheduleExtensionId' => $this->getOutOfScheduleExtension() ? $this->getOutOfScheduleExtension()->getId() : null,
            'holidayVoiceMailUserId' => $this->getHolidayVoiceMailUser() ? $this->getHolidayVoiceMailUser()->getId() : null,
            'outOfScheduleVoiceMailUserId' => $this->getOutOfScheduleVoiceMailUser() ? $this->getOutOfScheduleVoiceMailUser()->getId() : null
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

