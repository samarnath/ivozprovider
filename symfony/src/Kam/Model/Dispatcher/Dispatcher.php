<?php

namespace Kam\Model\Dispatcher;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Dispatcher
 */
class Dispatcher implements EntityInterface, DispatcherInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $setid = '0';

    /**
     * @var string
     */
    protected $destination = '';

    /**
     * @var integer
     */
    protected $flags = '0';

    /**
     * @var integer
     */
    protected $priority = '0';

    /**
     * @var string
     */
    protected $attrs = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \Core\Model\ApplicationServer\ApplicationServer
     */
    protected $applicationServer;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $setid,
        $destination,
        $flags,
        $priority,
        $attrs,
        $description
    ) {
        $this->setSetid($setid);
        $this->setDestination($destination);
        $this->setFlags($flags);
        $this->setPriority($priority);
        $this->setAttrs($attrs);
        $this->setDescription($description);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return DispatcherDTO
     */
    public static function createDTO()
    {
        return new DispatcherDTO();
    }

    /**
     * Factory method
     * @param DispatcherDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, DispatcherDTO::class);

        $self = new self(
            $dto->getSetid(),
            $dto->getDestination(),
            $dto->getFlags(),
            $dto->getPriority(),
            $dto->getAttrs(),
            $dto->getDescription()
        );

        return $self
            ->setApplicationServer($dto->getApplicationServer());
    }

    /**
     * @param DispatcherDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, DispatcherDTO::class);

        $this
            ->setSetid($dto->getSetid())
            ->setDestination($dto->getDestination())
            ->setFlags($dto->getFlags())
            ->setPriority($dto->getPriority())
            ->setAttrs($dto->getAttrs())
            ->setDescription($dto->getDescription())
            ->setApplicationServer($dto->getApplicationServer());


        return $this;
    }

    /**
     * @return DispatcherDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setSetid($this->getSetid())
            ->setDestination($this->getDestination())
            ->setFlags($this->getFlags())
            ->setPriority($this->getPriority())
            ->setAttrs($this->getAttrs())
            ->setDescription($this->getDescription())
            ->setApplicationServerId($this->getApplicationServer() ? $this->getApplicationServer()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'setid' => $this->getSetid(),
            'destination' => $this->getDestination(),
            'flags' => $this->getFlags(),
            'priority' => $this->getPriority(),
            'attrs' => $this->getAttrs(),
            'description' => $this->getDescription(),
            'applicationServerId' => $this->getApplicationServer() ? $this->getApplicationServer()->getId() : null
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
     * Set setid
     *
     * @param integer $setid
     *
     * @return Dispatcher
     */
    protected function setSetid($setid)
    {
        Assertion::notNull($setid);
        Assertion::integerish($setid);

        $this->setid = $setid;

        return $this;
    }

    /**
     * Get setid
     *
     * @return integer
     */
    public function getSetid()
    {
        return $this->setid;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return Dispatcher
     */
    protected function setDestination($destination)
    {
        Assertion::notNull($destination);
        Assertion::maxLength($destination, 192);

        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set flags
     *
     * @param integer $flags
     *
     * @return Dispatcher
     */
    protected function setFlags($flags)
    {
        Assertion::notNull($flags);
        Assertion::integerish($flags);

        $this->flags = $flags;

        return $this;
    }

    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Dispatcher
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set attrs
     *
     * @param string $attrs
     *
     * @return Dispatcher
     */
    protected function setAttrs($attrs)
    {
        Assertion::notNull($attrs);
        Assertion::maxLength($attrs, 128);

        $this->attrs = $attrs;

        return $this;
    }

    /**
     * Get attrs
     *
     * @return string
     */
    public function getAttrs()
    {
        return $this->attrs;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dispatcher
     */
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 64);

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set applicationServer
     *
     * @param \Core\Model\ApplicationServer\ApplicationServer $applicationServer
     *
     * @return Dispatcher
     */
    protected function setApplicationServer(\Core\Model\ApplicationServer\ApplicationServer $applicationServer)
    {
        $this->applicationServer = $applicationServer;

        return $this;
    }

    /**
     * Get applicationServer
     *
     * @return \Core\Model\ApplicationServer\ApplicationServer
     */
    public function getApplicationServer()
    {
        return $this->applicationServer;
    }



    // @codeCoverageIgnoreEnd
}

