<?php

namespace Ivoz\Domain\Model\DDI;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * DDI
 */
class DDI extends DDIAbstract implements DDIInterface, EntityInterface
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
     * @return DDIDTO
     */
    public static function createDTO()
    {
        return new DDIDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto DDIDTO
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
         * @var $dto DDIDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return DDIDTO
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
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null,
            'conferenceRoomId' => $this->getConferenceRoom() ? $this->getConferenceRoom()->getId() : null,
            'languageId' => $this->getLanguage() ? $this->getLanguage()->getId() : null,
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null,
            'externalCallFilterId' => $this->getExternalCallFilter() ? $this->getExternalCallFilter()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null,
            'iVRCommonId' => $this->getIVRCommon() ? $this->getIVRCommon()->getId() : null,
            'iVRCustomId' => $this->getIVRCustom() ? $this->getIVRCustom()->getId() : null,
            'huntGroupId' => $this->getHuntGroup() ? $this->getHuntGroup()->getId() : null,
            'faxId' => $this->getFax() ? $this->getFax()->getId() : null,
            'peeringContractId' => $this->getPeeringContract() ? $this->getPeeringContract()->getId() : null,
            'countryId' => $this->getCountry() ? $this->getCountry()->getId() : null,
            'retailAccountId' => $this->getRetailAccount() ? $this->getRetailAccount()->getId() : null
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

