<?php

namespace Kam\Domain\Model\UsersAddres;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class UsersAddresDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column source_address
     * @var string
     */
    public $sourceAddress;

    /**
     * @column ip_addr
     * @var string
     */
    public $ipAddr;

    /**
     * @var integer
     */
    public $mask = '32';

    /**
     * @var integer
     */
    public $port = '0';

    /**
     * @var string
     */
    public $tag;

    /**
     * @var string
     */
    public $description;

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
            'sourceAddress' => $this->getSourceAddress(),
            'ipAddr' => $this->getIpAddr(),
            'mask' => $this->getMask(),
            'port' => $this->getPort(),
            'tag' => $this->getTag(),
            'description' => $this->getDescription(),
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
            ->setSourceAddress(isset($data['sourceAddress']) ? $data['sourceAddress'] : null)
            ->setIpAddr(isset($data['ipAddr']) ? $data['ipAddr'] : null)
            ->setMask(isset($data['mask']) ? $data['mask'] : null)
            ->setPort(isset($data['port']) ? $data['port'] : null)
            ->setTag(isset($data['tag']) ? $data['tag'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
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
     * @return UsersAddresDTO
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
     * @param string $sourceAddress
     *
     * @return UsersAddresDTO
     */
    public function setSourceAddress($sourceAddress)
    {
        $this->sourceAddress = $sourceAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getSourceAddress()
    {
        return $this->sourceAddress;
    }

    /**
     * @param string $ipAddr
     *
     * @return UsersAddresDTO
     */
    public function setIpAddr($ipAddr = null)
    {
        $this->ipAddr = $ipAddr;

        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddr()
    {
        return $this->ipAddr;
    }

    /**
     * @param integer $mask
     *
     * @return UsersAddresDTO
     */
    public function setMask($mask)
    {
        $this->mask = $mask;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @param integer $port
     *
     * @return UsersAddresDTO
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $tag
     *
     * @return UsersAddresDTO
     */
    public function setTag($tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $description
     *
     * @return UsersAddresDTO
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $companyId
     *
     * @return UsersAddresDTO
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
}

