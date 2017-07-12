<?php

namespace Ivoz\Domain\Model\Queue;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Queue
 */
class Queue extends QueueAbstract implements QueueInterface, EntityInterface
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
     * @return QueueDTO
     */
    public static function createDTO()
    {
        return new QueueDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueDTO
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
         * @var $dto QueueDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return QueueDTO
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
            'periodicAnnounceLocutionId' => $this->getPeriodicAnnounceLocution() ? $this->getPeriodicAnnounceLocution()->getId() : null,
            'timeoutLocutionId' => $this->getTimeoutLocution() ? $this->getTimeoutLocution()->getId() : null,
            'timeoutExtensionId' => $this->getTimeoutExtension() ? $this->getTimeoutExtension()->getId() : null,
            'timeoutVoiceMailUserId' => $this->getTimeoutVoiceMailUser() ? $this->getTimeoutVoiceMailUser()->getId() : null,
            'fullLocutionId' => $this->getFullLocution() ? $this->getFullLocution()->getId() : null,
            'fullExtensionId' => $this->getFullExtension() ? $this->getFullExtension()->getId() : null,
            'fullVoiceMailUserId' => $this->getFullVoiceMailUser() ? $this->getFullVoiceMailUser()->getId() : null
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

