<?php

namespace Core\Model\CompanyAdmin;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class CompanyAdminDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $pass;

    /**
     * @var string
     */
    public $email = '';

    /**
     * @var boolean
     */
    public $active = '1';

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $timezoneId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $timezone;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'pass' => $this->getPass(),
            'email' => $this->getEmail(),
            'active' => $this->getActive(),
            'name' => $this->getName(),
            'lastname' => $this->getLastname(),
            'companyId' => $this->getCompanyId(),
            'timezoneId' => $this->getTimezoneId()
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
            ->setUsername(isset($data['username']) ? $data['username'] : null)
            ->setPass(isset($data['pass']) ? $data['pass'] : null)
            ->setEmail(isset($data['email']) ? $data['email'] : null)
            ->setActive(isset($data['active']) ? $data['active'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setLastname(isset($data['lastname']) ? $data['lastname'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setTimezoneId(isset($data['timezoneId']) ? $data['timezoneId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->timezone = $transformer->transform('Core\\Model\\Timezone\\Timezone', $this->getTimezoneId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return CompanyAdminDTO
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
     * @param string $username
     *
     * @return CompanyAdminDTO
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $pass
     *
     * @return CompanyAdminDTO
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param string $email
     *
     * @return CompanyAdminDTO
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param boolean $active
     *
     * @return CompanyAdminDTO
     */
    public function setActive($active = null)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param string $name
     *
     * @return CompanyAdminDTO
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $lastname
     *
     * @return CompanyAdminDTO
     */
    public function setLastname($lastname = null)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param integer $companyId
     *
     * @return CompanyAdminDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $timezoneId
     *
     * @return CompanyAdminDTO
     */
    public function setTimezoneId($timezoneId)
    {
        $this->timezoneId = $timezoneId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimezoneId()
    {
        return $this->timezoneId;
    }

    /**
     * @return \Core\Model\Timezone\Timezone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
}

