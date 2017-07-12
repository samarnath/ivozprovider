<?php

namespace Ivoz\Domain\Model\ConferenceRoom;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ConferenceRoomAbstract
 */
abstract class ConferenceRoomAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $pinProtected = '0';

    /**
     * @var string
     */
    protected $pinCode;

    /**
     * @var boolean
     */
    protected $maxMembers = '0';

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name, $pinProtected, $maxMembers)
    {
        $this->setName($name);
        $this->setPinProtected($pinProtected);
        $this->setMaxMembers($maxMembers);
    }

    abstract public function __wakeup();

    /**
     * @return ConferenceRoomDTO
     */
    public static function createDTO()
    {
        return new ConferenceRoomDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConferenceRoomDTO
         */
        Assertion::isInstanceOf($dto, ConferenceRoomDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getPinProtected(),
            $dto->getMaxMembers());

        return $self
            ->setPinCode($dto->getPinCode())
            ->setCompany($dto->getCompany())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConferenceRoomDTO
         */
        Assertion::isInstanceOf($dto, ConferenceRoomDTO::class);

        $this
            ->setName($dto->getName())
            ->setPinProtected($dto->getPinProtected())
            ->setPinCode($dto->getPinCode())
            ->setMaxMembers($dto->getMaxMembers())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return ConferenceRoomDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setPinProtected($this->getPinProtected())
            ->setPinCode($this->getPinCode())
            ->setMaxMembers($this->getMaxMembers())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'pinProtected' => $this->getPinProtected(),
            'pinCode' => $this->getPinCode(),
            'maxMembers' => $this->getMaxMembers(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

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
     * Set pinProtected
     *
     * @param boolean $pinProtected
     *
     * @return self
     */
    protected function setPinProtected($pinProtected)
    {
        Assertion::notNull($pinProtected);
        Assertion::between(intval($pinProtected), 0, 1);

        $this->pinProtected = $pinProtected;

        return $this;
    }

    /**
     * Get pinProtected
     *
     * @return boolean
     */
    public function getPinProtected()
    {
        return $this->pinProtected;
    }

    /**
     * Set pinCode
     *
     * @param string $pinCode
     *
     * @return self
     */
    protected function setPinCode($pinCode = null)
    {
        if (!is_null($pinCode)) {
            Assertion::maxLength($pinCode, 6);
        }

        $this->pinCode = $pinCode;

        return $this;
    }

    /**
     * Get pinCode
     *
     * @return string
     */
    public function getPinCode()
    {
        return $this->pinCode;
    }

    /**
     * Set maxMembers
     *
     * @param boolean $maxMembers
     *
     * @return self
     */
    protected function setMaxMembers($maxMembers)
    {
        Assertion::notNull($maxMembers);
        Assertion::between(intval($maxMembers), 0, 1);

        $this->maxMembers = $maxMembers;

        return $this;
    }

    /**
     * Get maxMembers
     *
     * @return boolean
     */
    public function getMaxMembers()
    {
        return $this->maxMembers;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

