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
    private $id;

    /**
     * @var string
     */
    private $sorceryId;

    /**
     * @var integer
     */
    private $defaultExpiration;

    /**
     * @var integer
     */
    private $maxContacts;

    /**
     * @var integer
     */
    private $minimumExpiration;

    /**
     * @var string
     */
    private $removeExisting;

    /**
     * @var string
     */
    private $authenticateQualify;

    /**
     * @var integer
     */
    private $maximumExpiration;

    /**
     * @var string
     */
    private $supportPath;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var integer
     */
    private $qualifyFrequency;

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
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    /**
     * {@inheritDoc}
     */
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

