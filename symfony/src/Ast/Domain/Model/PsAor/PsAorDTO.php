<?php

namespace Ast\Domain\Model\PsAor;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PsAorDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column sorcery_id
     * @var string
     */
    public $sorceryId;

    /**
     * @column default_expiration
     * @var integer
     */
    public $defaultExpiration;

    /**
     * @column max_contacts
     * @var integer
     */
    public $maxContacts;

    /**
     * @column minimum_expiration
     * @var integer
     */
    public $minimumExpiration;

    /**
     * @column remove_existing
     * @var string
     */
    public $removeExisting;

    /**
     * @column authenticate_qualify
     * @var string
     */
    public $authenticateQualify;

    /**
     * @column maximum_expiration
     * @var integer
     */
    public $maximumExpiration;

    /**
     * @column support_path
     * @var string
     */
    public $supportPath;

    /**
     * @var string
     */
    public $contact;

    /**
     * @column qualify_frequency
     * @var integer
     */
    public $qualifyFrequency;

    /**
     * @return array
     */
    public function __toArray()
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

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setSorceryId(isset($data['sorceryId']) ? $data['sorceryId'] : null)
            ->setDefaultExpiration(isset($data['defaultExpiration']) ? $data['defaultExpiration'] : null)
            ->setMaxContacts(isset($data['maxContacts']) ? $data['maxContacts'] : null)
            ->setMinimumExpiration(isset($data['minimumExpiration']) ? $data['minimumExpiration'] : null)
            ->setRemoveExisting(isset($data['removeExisting']) ? $data['removeExisting'] : null)
            ->setAuthenticateQualify(isset($data['authenticateQualify']) ? $data['authenticateQualify'] : null)
            ->setMaximumExpiration(isset($data['maximumExpiration']) ? $data['maximumExpiration'] : null)
            ->setSupportPath(isset($data['supportPath']) ? $data['supportPath'] : null)
            ->setContact(isset($data['contact']) ? $data['contact'] : null)
            ->setQualifyFrequency(isset($data['qualifyFrequency']) ? $data['qualifyFrequency'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PsAorDTO
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
     * @param string $sorceryId
     *
     * @return PsAorDTO
     */
    public function setSorceryId($sorceryId)
    {
        $this->sorceryId = $sorceryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSorceryId()
    {
        return $this->sorceryId;
    }

    /**
     * @param integer $defaultExpiration
     *
     * @return PsAorDTO
     */
    public function setDefaultExpiration($defaultExpiration = null)
    {
        $this->defaultExpiration = $defaultExpiration;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDefaultExpiration()
    {
        return $this->defaultExpiration;
    }

    /**
     * @param integer $maxContacts
     *
     * @return PsAorDTO
     */
    public function setMaxContacts($maxContacts = null)
    {
        $this->maxContacts = $maxContacts;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxContacts()
    {
        return $this->maxContacts;
    }

    /**
     * @param integer $minimumExpiration
     *
     * @return PsAorDTO
     */
    public function setMinimumExpiration($minimumExpiration = null)
    {
        $this->minimumExpiration = $minimumExpiration;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMinimumExpiration()
    {
        return $this->minimumExpiration;
    }

    /**
     * @param string $removeExisting
     *
     * @return PsAorDTO
     */
    public function setRemoveExisting($removeExisting = null)
    {
        $this->removeExisting = $removeExisting;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemoveExisting()
    {
        return $this->removeExisting;
    }

    /**
     * @param string $authenticateQualify
     *
     * @return PsAorDTO
     */
    public function setAuthenticateQualify($authenticateQualify = null)
    {
        $this->authenticateQualify = $authenticateQualify;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthenticateQualify()
    {
        return $this->authenticateQualify;
    }

    /**
     * @param integer $maximumExpiration
     *
     * @return PsAorDTO
     */
    public function setMaximumExpiration($maximumExpiration = null)
    {
        $this->maximumExpiration = $maximumExpiration;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaximumExpiration()
    {
        return $this->maximumExpiration;
    }

    /**
     * @param string $supportPath
     *
     * @return PsAorDTO
     */
    public function setSupportPath($supportPath = null)
    {
        $this->supportPath = $supportPath;

        return $this;
    }

    /**
     * @return string
     */
    public function getSupportPath()
    {
        return $this->supportPath;
    }

    /**
     * @param string $contact
     *
     * @return PsAorDTO
     */
    public function setContact($contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param integer $qualifyFrequency
     *
     * @return PsAorDTO
     */
    public function setQualifyFrequency($qualifyFrequency = null)
    {
        $this->qualifyFrequency = $qualifyFrequency;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQualifyFrequency()
    {
        return $this->qualifyFrequency;
    }
}

