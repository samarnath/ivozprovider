<?php

namespace Ivoz\Domain\Model\ProxyUser;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ProxyUserAbstract
 */
abstract class ProxyUserAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $ip;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    abstract public function __wakeup();

    /**
     * @return ProxyUserDTO
     */
    public static function createDTO()
    {
        return new ProxyUserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ProxyUserDTO
         */
        Assertion::isInstanceOf($dto, ProxyUserDTO::class);

        $self = new static();

        return $self
            ->setName($dto->getName())
            ->setIp($dto->getIp())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ProxyUserDTO
         */
        Assertion::isInstanceOf($dto, ProxyUserDTO::class);

        $this
            ->setName($dto->getName())
            ->setIp($dto->getIp());


        return $this;
    }

    /**
     * @return ProxyUserDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setIp($this->getIp());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'ip' => $this->getIp()
        ];
    }


    // @codeCoverageIgnoreStart

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
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    protected function setIp($ip = null)
    {
        if (!is_null($ip)) {
            Assertion::maxLength($ip, 50);
        }

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



    // @codeCoverageIgnoreEnd
}

