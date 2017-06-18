<?php

namespace Core\Domain\Model\Terminal;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TerminalDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $disallow = 'all';

    /**
     * @var string
     */
    public $allow = 'alaw';

    /**
     * @column direct_media_method
     * @var string
     */
    public $directMediaMethod = 'update';

    /**
     * @var string
     */
    public $password = '';

    /**
     * @var string
     */
    public $mac;

    /**
     * @var \DateTime
     */
    public $lastProvisionDate;

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $TerminalModelId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $TerminalModel;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'domain' => $this->getDomain(),
            'disallow' => $this->getDisallow(),
            'allow' => $this->getAllow(),
            'directMediaMethod' => $this->getDirectMediaMethod(),
            'password' => $this->getPassword(),
            'mac' => $this->getMac(),
            'lastProvisionDate' => $this->getLastProvisionDate(),
            'companyId' => $this->getCompanyId(),
            'terminalModelId' => $this->getTerminalModelId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setDomain(isset($data['domain']) ? $data['domain'] : null)
            ->setDisallow(isset($data['disallow']) ? $data['disallow'] : null)
            ->setAllow(isset($data['allow']) ? $data['allow'] : null)
            ->setDirectMediaMethod(isset($data['directMediaMethod']) ? $data['directMediaMethod'] : null)
            ->setPassword(isset($data['password']) ? $data['password'] : null)
            ->setMac(isset($data['mac']) ? $data['mac'] : null)
            ->setLastProvisionDate(isset($data['lastProvisionDate']) ? $data['lastProvisionDate'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setTerminalModelId(isset($data['TerminalModelId']) ? $data['TerminalModelId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->terminalModel = $transformer->transform('Core\\Model\\TerminalModel\\TerminalModel', $this->getTerminalModelId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return TerminalDTO
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
     * @param string $name
     *
     * @return TerminalDTO
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
     * @param string $domain
     *
     * @return TerminalDTO
     */
    public function setDomain($domain = null)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $disallow
     *
     * @return TerminalDTO
     */
    public function setDisallow($disallow)
    {
        $this->disallow = $disallow;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisallow()
    {
        return $this->disallow;
    }

    /**
     * @param string $allow
     *
     * @return TerminalDTO
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * @param string $directMediaMethod
     *
     * @return TerminalDTO
     */
    public function setDirectMediaMethod($directMediaMethod)
    {
        $this->directMediaMethod = $directMediaMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectMediaMethod()
    {
        return $this->directMediaMethod;
    }

    /**
     * @param string $password
     *
     * @return TerminalDTO
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $mac
     *
     * @return TerminalDTO
     */
    public function setMac($mac = null)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * @return string
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * @param \DateTime $lastProvisionDate
     *
     * @return TerminalDTO
     */
    public function setLastProvisionDate($lastProvisionDate = null)
    {
        $this->lastProvisionDate = $lastProvisionDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastProvisionDate()
    {
        return $this->lastProvisionDate;
    }

    /**
     * @param integer $companyId
     *
     * @return TerminalDTO
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
     * @return \Core\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $terminalModelId
     *
     * @return TerminalDTO
     */
    public function setTerminalModelId($terminalModelId)
    {
        $this->TerminalModelId = $terminalModelId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTerminalModelId()
    {
        return $this->TerminalModelId;
    }

    /**
     * @return \Core\Domain\Model\TerminalModel\TerminalModel
     */
    public function getTerminalModel()
    {
        return $this->TerminalModel;
    }
}

