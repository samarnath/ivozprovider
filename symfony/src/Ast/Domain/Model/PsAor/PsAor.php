<?php

namespace Ast\Domain\Model\PsAor;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PsAor
 */
class PsAor
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @column sorcery_id
     * @var string
     */
    protected $sorceryId;

    /**
     * @column default_expiration
     * @var integer
     */
    protected $defaultExpiration;

    /**
     * @column max_contacts
     * @var integer
     */
    protected $maxContacts;

    /**
     * @column minimum_expiration
     * @var integer
     */
    protected $minimumExpiration;

    /**
     * @column remove_existing
     * @var string
     */
    protected $removeExisting;

    /**
     * @column authenticate_qualify
     * @var string
     */
    protected $authenticateQualify;

    /**
     * @column maximum_expiration
     * @var integer
     */
    protected $maximumExpiration;

    /**
     * @column support_path
     * @var string
     */
    protected $supportPath;

    /**
     * @var string
     */
    protected $contact;

    /**
     * @column qualify_frequency
     * @var integer
     */
    protected $qualifyFrequency;


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
     * @param PsAorDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, PsAorDTO::class);

        $self = new self(
            $dto->getSorceryId()
        );

        return $self
            ->setDefaultExpiration($dto->getDefaultExpiration())
            ->setMaxContacts($dto->getMaxContacts())
            ->setMinimumExpiration($dto->getMinimumExpiration())
            ->setRemoveExisting($dto->getRemoveExisting())
            ->setAuthenticateQualify($dto->getAuthenticateQualify())
            ->setMaximumExpiration($dto->getMaximumExpiration())
            ->setSupportPath($dto->getSupportPath())
            ->setContact($dto->getContact())
            ->setQualifyFrequency($dto->getQualifyFrequency());
    }

    /**
     * @param PsAorDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
            ->setSorceryId($this->getSorceryId())
            ->setDefaultExpiration($this->getDefaultExpiration())
            ->setMaxContacts($this->getMaxContacts())
            ->setMinimumExpiration($this->getMinimumExpiration())
            ->setRemoveExisting($this->getRemoveExisting())
            ->setAuthenticateQualify($this->getAuthenticateQualify())
            ->setMaximumExpiration($this->getMaximumExpiration())
            ->setSupportPath($this->getSupportPath())
            ->setContact($this->getContact())
            ->setQualifyFrequency($this->getQualifyFrequency());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'sorceryId' => $this->getSorceryId(),
            'defaultExpiration' => $this->getDefaultExpiration(),
            'maxContacts' => $this->getMaxContacts(),
            'minimumExpiration' => $this->getMinimumExpiration(),
            'removeExisting' => $this->getRemoveExisting(),
            'authenticateQualify' => $this->getAuthenticateQualify(),
            'maximumExpiration' => $this->getMaximumExpiration(),
            'supportPath' => $this->getSupportPath(),
            'contact' => $this->getContact(),
            'qualifyFrequency' => $this->getQualifyFrequency()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return PsAor
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

    /**
     * Set sorceryId
     *
     * @param string $sorceryId
     *
     * @return PsAor
     */
    protected function setSorceryId($sorceryId)
    {
        Assertion::notNull($sorceryId);
        Assertion::maxLength($sorceryId, 40);

        $this->sorceryId = $sorceryId;

        return $this;
    }

    /**
     * Get sorceryId
     *
     * @return string
     */
    public function getSorceryId()
    {
        return $this->sorceryId;
    }

    /**
     * Set defaultExpiration
     *
     * @param integer $defaultExpiration
     *
     * @return PsAor
     */
    protected function setDefaultExpiration($defaultExpiration = null)
    {
        if (!is_null($defaultExpiration)) {
            if (!is_null($defaultExpiration)) {
                Assertion::integerish($defaultExpiration);
            }
        }

        $this->defaultExpiration = $defaultExpiration;

        return $this;
    }

    /**
     * Get defaultExpiration
     *
     * @return integer
     */
    public function getDefaultExpiration()
    {
        return $this->defaultExpiration;
    }

    /**
     * Set maxContacts
     *
     * @param integer $maxContacts
     *
     * @return PsAor
     */
    protected function setMaxContacts($maxContacts = null)
    {
        if (!is_null($maxContacts)) {
            if (!is_null($maxContacts)) {
                Assertion::integerish($maxContacts);
            }
        }

        $this->maxContacts = $maxContacts;

        return $this;
    }

    /**
     * Get maxContacts
     *
     * @return integer
     */
    public function getMaxContacts()
    {
        return $this->maxContacts;
    }

    /**
     * Set minimumExpiration
     *
     * @param integer $minimumExpiration
     *
     * @return PsAor
     */
    protected function setMinimumExpiration($minimumExpiration = null)
    {
        if (!is_null($minimumExpiration)) {
            if (!is_null($minimumExpiration)) {
                Assertion::integerish($minimumExpiration);
            }
        }

        $this->minimumExpiration = $minimumExpiration;

        return $this;
    }

    /**
     * Get minimumExpiration
     *
     * @return integer
     */
    public function getMinimumExpiration()
    {
        return $this->minimumExpiration;
    }

    /**
     * Set removeExisting
     *
     * @param string $removeExisting
     *
     * @return PsAor
     */
    protected function setRemoveExisting($removeExisting = null)
    {
        if (!is_null($removeExisting)) {
        }

        $this->removeExisting = $removeExisting;

        return $this;
    }

    /**
     * Get removeExisting
     *
     * @return string
     */
    public function getRemoveExisting()
    {
        return $this->removeExisting;
    }

    /**
     * Set authenticateQualify
     *
     * @param string $authenticateQualify
     *
     * @return PsAor
     */
    protected function setAuthenticateQualify($authenticateQualify = null)
    {
        if (!is_null($authenticateQualify)) {
        }

        $this->authenticateQualify = $authenticateQualify;

        return $this;
    }

    /**
     * Get authenticateQualify
     *
     * @return string
     */
    public function getAuthenticateQualify()
    {
        return $this->authenticateQualify;
    }

    /**
     * Set maximumExpiration
     *
     * @param integer $maximumExpiration
     *
     * @return PsAor
     */
    protected function setMaximumExpiration($maximumExpiration = null)
    {
        if (!is_null($maximumExpiration)) {
            if (!is_null($maximumExpiration)) {
                Assertion::integerish($maximumExpiration);
            }
        }

        $this->maximumExpiration = $maximumExpiration;

        return $this;
    }

    /**
     * Get maximumExpiration
     *
     * @return integer
     */
    public function getMaximumExpiration()
    {
        return $this->maximumExpiration;
    }

    /**
     * Set supportPath
     *
     * @param string $supportPath
     *
     * @return PsAor
     */
    protected function setSupportPath($supportPath = null)
    {
        if (!is_null($supportPath)) {
        }

        $this->supportPath = $supportPath;

        return $this;
    }

    /**
     * Get supportPath
     *
     * @return string
     */
    public function getSupportPath()
    {
        return $this->supportPath;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return PsAor
     */
    protected function setContact($contact = null)
    {
        if (!is_null($contact)) {
            Assertion::maxLength($contact, 200);
        }

        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set qualifyFrequency
     *
     * @param integer $qualifyFrequency
     *
     * @return PsAor
     */
    protected function setQualifyFrequency($qualifyFrequency = null)
    {
        if (!is_null($qualifyFrequency)) {
            if (!is_null($qualifyFrequency)) {
                Assertion::integerish($qualifyFrequency);
            }
        }

        $this->qualifyFrequency = $qualifyFrequency;

        return $this;
    }

    /**
     * Get qualifyFrequency
     *
     * @return integer
     */
    public function getQualifyFrequency()
    {
        return $this->qualifyFrequency;
    }



    // @codeCoverageIgnoreEnd
}

