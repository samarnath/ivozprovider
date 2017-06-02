<?php

namespace Kam\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class KamDispatcherDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $setid = '0';

    /**
     * @var string
     */
    public $destination = '';

    /**
     * @var integer
     */
    public $flags = '0';

    /**
     * @var integer
     */
    public $priority = '0';

    /**
     * @var string
     */
    public $attrs = '';

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var mixed
     */
    public $applicationServerId;

    /**
     * @var mixed
     */
    public $applicationServer;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'setid' => $this->getSetid(),
            'destination' => $this->getDestination(),
            'flags' => $this->getFlags(),
            'priority' => $this->getPriority(),
            'attrs' => $this->getAttrs(),
            'description' => $this->getDescription(),
            'applicationServerId' => $this->getApplicationServerId()
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
            ->setSetid(isset($data['setid']) ? $data['setid'] : null)
            ->setDestination(isset($data['destination']) ? $data['destination'] : null)
            ->setFlags(isset($data['flags']) ? $data['flags'] : null)
            ->setPriority(isset($data['priority']) ? $data['priority'] : null)
            ->setAttrs(isset($data['attrs']) ? $data['attrs'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setApplicationServerId(isset($data['applicationServerId']) ? $data['applicationServerId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->applicationServer = $transformer->transform('Core\\Model\\ApplicationServer\\ApplicationServer', $this->getApplicationServerId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return KamDispatcherDTO
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
     * @param integer $setid
     *
     * @return KamDispatcherDTO
     */
    public function setSetid($setid)
    {
        $this->setid = $setid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSetid()
    {
        return $this->setid;
    }

    /**
     * @param string $destination
     *
     * @return KamDispatcherDTO
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param integer $flags
     *
     * @return KamDispatcherDTO
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $priority
     *
     * @return KamDispatcherDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $attrs
     *
     * @return KamDispatcherDTO
     */
    public function setAttrs($attrs)
    {
        $this->attrs = $attrs;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttrs()
    {
        return $this->attrs;
    }

    /**
     * @param string $description
     *
     * @return KamDispatcherDTO
     */
    public function setDescription($description)
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
     * @param integer $applicationServerId
     *
     * @return KamDispatcherDTO
     */
    public function setApplicationServerId($applicationServerId)
    {
        $this->applicationServerId = $applicationServerId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getApplicationServerId()
    {
        return $this->applicationServerId;
    }

    /**
     * @return \Core\Model\ApplicationServer\ApplicationServer
     */
    public function getApplicationServer()
    {
        return $this->applicationServer;
    }
}

