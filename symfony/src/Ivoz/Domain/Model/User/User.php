<?php

namespace Ivoz\Domain\Model\User;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * User
 */
class User extends UserAbstract implements UserInterface, EntityInterface
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
     * @return UserDTO
     */
    public static function createDTO()
    {
        return new UserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UserDTO
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
         * @var $dto UserDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return UserDTO
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
            'callACLId' => $this->getCallACL() ? $this->getCallACL()->getId() : null,
            'bossAssistantId' => $this->getBossAssistant() ? $this->getBossAssistant()->getId() : null,
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'terminalId' => $this->getTerminal() ? $this->getTerminal()->getId() : null,
            'extensionId' => $this->getExtension() ? $this->getExtension()->getId() : null,
            'timezoneId' => $this->getTimezone() ? $this->getTimezone()->getId() : null,
            'outgoingDDIId' => $this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null
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

