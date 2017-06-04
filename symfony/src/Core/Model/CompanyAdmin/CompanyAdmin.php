<?php

namespace Core\Model\CompanyAdmin;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * CompanyAdmin
 */
class CompanyAdmin implements EntityInterface, CompanyAdminInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\Timezone\Timezone
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
    public function __construct($username, $pass, $email)
    {
        $this->setUsername($username);
        $this->setPass($pass);
        $this->setEmail($email);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return CompanyAdminDTO
     */
    public static function createDTO()
    {
        return new CompanyAdminDTO();
    }

    /**
     * Factory method
     * @param CompanyAdminDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CompanyAdminDTO::class);

        $self = new self(
            $dto->getUsername(),
            $dto->getPass(),
            $dto->getEmail()
        );

        return $self
            ->setActive($dto->getActive())
            ->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setCompany($dto->getCompany())
            ->setTimezone($dto->getTimezone());
    }

    /**
     * @param CompanyAdminDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return CompanyAdmin
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
     * @return CompanyAdmin
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
     * @return CompanyAdmin
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
     * @return CompanyAdmin
     */
    protected function setActive($active = null)
    {
        if (!is_null($active)) {
            Assertion::between(intval($active), 0, 1);
        }

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
     * @return CompanyAdmin
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
     * @return CompanyAdmin
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
     * @param \Core\Model\Company\Company $company
     *
     * @return CompanyAdmin
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set timezone
     *
     * @param \Core\Model\Timezone\Timezone $timezone
     *
     * @return CompanyAdmin
     */
    protected function setTimezone(\Core\Model\Timezone\Timezone $timezone = null)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \Core\Model\Timezone\Timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }



    // @codeCoverageIgnoreEnd
}

