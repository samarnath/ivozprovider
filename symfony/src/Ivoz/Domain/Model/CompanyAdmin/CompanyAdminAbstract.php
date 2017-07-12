<?php

namespace Ivoz\Domain\Model\CompanyAdmin;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CompanyAdminAbstract
 */
abstract class CompanyAdminAbstract
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @comment password
     * @var string
     */
    protected $pass;

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var boolean
     */
    protected $active = '1';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    protected $timezone;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($username, $pass, $email, $active)
    {
        $this->setUsername($username);
        $this->setPass($pass);
        $this->setEmail($email);
        $this->setActive($active);
    }

    abstract public function __wakeup();

    /**
     * @return CompanyAdminDTO
     */
    public static function createDTO()
    {
        return new CompanyAdminDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CompanyAdminDTO
         */
        Assertion::isInstanceOf($dto, CompanyAdminDTO::class);

        $self = new static(
            $dto->getUsername(),
            $dto->getPass(),
            $dto->getEmail(),
            $dto->getActive());

        return $self
            ->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setCompany($dto->getCompany())
            ->setTimezone($dto->getTimezone())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CompanyAdminDTO
         */
        Assertion::isInstanceOf($dto, CompanyAdminDTO::class);

        $this
            ->setUsername($dto->getUsername())
            ->setPass($dto->getPass())
            ->setEmail($dto->getEmail())
            ->setActive($dto->getActive())
            ->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setCompany($dto->getCompany())
            ->setTimezone($dto->getTimezone());


        return $this;
    }

    /**
     * @return CompanyAdminDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setUsername($this->getUsername())
            ->setPass($this->getPass())
            ->setEmail($this->getEmail())
            ->setActive($this->getActive())
            ->setName($this->getName())
            ->setLastname($this->getLastname())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setTimezoneId($this->getTimezone() ? $this->getTimezone()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'username' => $this->getUsername(),
            'pass' => $this->getPass(),
            'email' => $this->getEmail(),
            'active' => $this->getActive(),
            'name' => $this->getName(),
            'lastname' => $this->getLastname(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'timezoneId' => $this->getTimezone() ? $this->getTimezone()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set username
     *
     * @param string $username
     *
     * @return self
     */
    protected function setUsername($username)
    {
        Assertion::notNull($username);
        Assertion::maxLength($username, 65);

        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return self
     */
    protected function setPass($pass)
    {
        Assertion::notNull($pass);
        Assertion::maxLength($pass, 80);

        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return self
     */
    protected function setEmail($email)
    {
        Assertion::notNull($email);
        Assertion::maxLength($email, 100);

        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return self
     */
    protected function setActive($active)
    {
        Assertion::notNull($active);
        Assertion::between(intval($active), 0, 1);

        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 100);
        }

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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return self
     */
    protected function setLastname($lastname = null)
    {
        if (!is_null($lastname)) {
            Assertion::maxLength($lastname, 100);
        }

        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
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

    /**
     * Set timezone
     *
     * @param \Ivoz\Domain\Model\Timezone\TimezoneInterface $timezone
     *
     * @return self
     */
    protected function setTimezone(\Ivoz\Domain\Model\Timezone\TimezoneInterface $timezone = null)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \Ivoz\Domain\Model\Timezone\TimezoneInterface
     */
    public function getTimezone()
    {
        return $this->timezone;
    }



    // @codeCoverageIgnoreEnd
}

