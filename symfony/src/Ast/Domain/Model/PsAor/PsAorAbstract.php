<?php

namespace Ast\Domain\Model\PsAor;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PsAorAbstract
 */
abstract class PsAorAbstract
{
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

    abstract public function __wakeup();

    // @codeCoverageIgnoreStart

    /**
     * Set sorceryId
     *
     * @param string $sorceryId
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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

