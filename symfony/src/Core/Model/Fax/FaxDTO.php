<?php

namespace Core\Model\Fax;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class FaxDTO implements DataTransferObjectInterface
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
    public $email;

    /**
     * @var boolean
     */
    public $sendByEmail = '1';

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $outgoingDDIId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $outgoingDDI;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'sendByEmail' => $this->getSendByEmail(),
            'companyId' => $this->getCompanyId(),
            'outgoingDDIId' => $this->getOutgoingDDIId()
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
            ->setEmail(isset($data['email']) ? $data['email'] : null)
            ->setSendByEmail(isset($data['sendByEmail']) ? $data['sendByEmail'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setOutgoingDDIId(isset($data['outgoingDDIId']) ? $data['outgoingDDIId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->outgoingDDI = $transformer->transform('Core\\Model\\DDI\\DDI', $this->getOutgoingDDIId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return FaxDTO
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
     * @return FaxDTO
     */
    public function setName($name)
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
     * @param string $email
     *
     * @return FaxDTO
     */
    public function setEmail($email = null)
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
     * @param boolean $sendByEmail
     *
     * @return FaxDTO
     */
    public function setSendByEmail($sendByEmail)
    {
        $this->sendByEmail = $sendByEmail;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSendByEmail()
    {
        return $this->sendByEmail;
    }

    /**
     * @param integer $companyId
     *
     * @return FaxDTO
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
     * @param integer $outgoingDDIId
     *
     * @return FaxDTO
     */
    public function setOutgoingDDIId($outgoingDDIId)
    {
        $this->outgoingDDIId = $outgoingDDIId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingDDIId()
    {
        return $this->outgoingDDIId;
    }

    /**
     * @return \Core\Model\DDI\DDI
     */
    public function getOutgoingDDI()
    {
        return $this->outgoingDDI;
    }
}

