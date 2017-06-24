<?php

namespace Core\Domain\Model\ApplicationServer;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * ApplicationServerAbstract
 */
abstract class ApplicationServerAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $name;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($ip)
    {
        $this->setIp($ip);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return ApplicationServerDTO
     */
    public static function createDTO()
    {
        return new ApplicationServerDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ApplicationServerDTO
         */
        Assertion::isInstanceOf($dto, ApplicationServerDTO::class);

        $self = new static(
            $dto->getIp()
        );

        return $self
            ->setName($dto->getName());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ApplicationServerDTO
         */
        Assertion::isInstanceOf($dto, ApplicationServerDTO::class);

        $this
            ->setIp($dto->getIp())
            ->setName($dto->getName());


        return $this;
    }

    /**
     * @return ApplicationServerDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setIp($this->getIp())
            ->setName($this->getName());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'ip' => $this->getIp(),
            'name' => $this->getName()
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
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    protected function setIp($ip)
    {
        Assertion::notNull($ip);
        Assertion::maxLength($ip, 50);

        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
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
            Assertion::maxLength($name, 64);
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



    // @codeCoverageIgnoreEnd
}

