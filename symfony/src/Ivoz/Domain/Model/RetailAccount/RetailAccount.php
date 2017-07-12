<?php

namespace Ivoz\Domain\Model\RetailAccount;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * RetailAccount
 */
class RetailAccount extends RetailAccountAbstract implements RetailAccountInterface, EntityInterface
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
     * @return RetailAccountDTO
     */
    public static function createDTO()
    {
        return new RetailAccountDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RetailAccountDTO
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
         * @var $dto RetailAccountDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return RetailAccountDTO
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
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null,
            'outgoingDDIId' => $this->getOutgoingDDI() ? $this->getOutgoingDDI()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null
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

