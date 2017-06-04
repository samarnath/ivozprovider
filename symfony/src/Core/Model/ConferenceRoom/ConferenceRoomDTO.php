<?php

namespace Core\Model\ConferenceRoom;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ConferenceRoomDTO implements DataTransferObjectInterface
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
     * @var boolean
     */
    public $pinProtected = '0';

    /**
     * @var string
     */
    public $pinCode;

    /**
     * @var boolean
     */
    public $maxMembers = '0';

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'pinProtected' => $this->getPinProtected(),
            'pinCode' => $this->getPinCode(),
            'maxMembers' => $this->getMaxMembers(),
            'companyId' => $this->getCompanyId()
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
            ->setPinProtected(isset($data['pinProtected']) ? $data['pinProtected'] : null)
            ->setPinCode(isset($data['pinCode']) ? $data['pinCode'] : null)
            ->setMaxMembers(isset($data['maxMembers']) ? $data['maxMembers'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ConferenceRoomDTO
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
     * @return ConferenceRoomDTO
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
     * @param boolean $pinProtected
     *
     * @return ConferenceRoomDTO
     */
    public function setPinProtected($pinProtected)
    {
        $this->pinProtected = $pinProtected;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPinProtected()
    {
        return $this->pinProtected;
    }

    /**
     * @param string $pinCode
     *
     * @return ConferenceRoomDTO
     */
    public function setPinCode($pinCode = null)
    {
        $this->pinCode = $pinCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPinCode()
    {
        return $this->pinCode;
    }

    /**
     * @param boolean $maxMembers
     *
     * @return ConferenceRoomDTO
     */
    public function setMaxMembers($maxMembers)
    {
        $this->maxMembers = $maxMembers;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMaxMembers()
    {
        return $this->maxMembers;
    }

    /**
     * @param integer $companyId
     *
     * @return ConferenceRoomDTO
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
}

