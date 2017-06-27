<?php

namespace Ast\Domain\Model\PsAor;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PsAor
 */
class PsAor extends PsAorAbstract implements PsAorInterface, EntityInterface
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
    public function __construct($sorceryId)
    {
        $this->setSorceryId($sorceryId);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return PsAorDTO
     */
    public static function createDTO()
    {
        return new PsAorDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PsAorDTO
         */
        Assertion::isInstanceOf($dto, PsAorDTO::class);

        $self = new self(
            $dto->getSorceryId());

        return $self
            ->setDefaultExpiration($dto->getDefaultExpiration())
            ->setMaxContacts($dto->getMaxContacts())
            ->setMinimumExpiration($dto->getMinimumExpiration())
            ->setRemoveExisting($dto->getRemoveExisting())
            ->setAuthenticateQualify($dto->getAuthenticateQualify())
            ->setMaximumExpiration($dto->getMaximumExpiration())
            ->setSupportPath($dto->getSupportPath())
            ->setContact($dto->getContact())
            ->setQualifyFrequency($dto->getQualifyFrequency())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PsAorDTO
         */
        Assertion::isInstanceOf($dto, PsAorDTO::class);

        $this
            ->setSorceryId($dto->getSorceryId())
            ->setDefaultExpiration($dto->getDefaultExpiration())
            ->setMaxContacts($dto->getMaxContacts())
            ->setMinimumExpiration($dto->getMinimumExpiration())
            ->setRemoveExisting($dto->getRemoveExisting())
            ->setAuthenticateQualify($dto->getAuthenticateQualify())
            ->setMaximumExpiration($dto->getMaximumExpiration())
            ->setSupportPath($dto->getSupportPath())
            ->setContact($dto->getContact())
            ->setQualifyFrequency($dto->getQualifyFrequency());


        return $this;
    }

    /**
     * @return PsAorDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setSorceryId($this->getSorceryId())
            ->setDefaultExpiration($this->getDefaultExpiration())
            ->setMaxContacts($this->getMaxContacts())
            ->setMinimumExpiration($this->getMinimumExpiration())
            ->setRemoveExisting($this->getRemoveExisting())
            ->setAuthenticateQualify($this->getAuthenticateQualify())
            ->setMaximumExpiration($this->getMaximumExpiration())
            ->setSupportPath($this->getSupportPath())
            ->setContact($this->getContact())
            ->setQualifyFrequency($this->getQualifyFrequency())
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'sorceryId' => $this->getSorceryId(),
            'defaultExpiration' => $this->getDefaultExpiration(),
            'maxContacts' => $this->getMaxContacts(),
            'minimumExpiration' => $this->getMinimumExpiration(),
            'removeExisting' => $this->getRemoveExisting(),
            'authenticateQualify' => $this->getAuthenticateQualify(),
            'maximumExpiration' => $this->getMaximumExpiration(),
            'supportPath' => $this->getSupportPath(),
            'contact' => $this->getContact(),
            'qualifyFrequency' => $this->getQualifyFrequency(),
            'id' => $this->getId()
        ];
    }


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return self
     */
    protected function setId($id)
    {
        Assertion::notNull($id);
        Assertion::integerish($id);
        Assertion::greaterOrEqualThan($id, 0);

        $this->id = $id;

        return $this;
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

