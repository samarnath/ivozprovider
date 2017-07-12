<?php

namespace Ivoz\Domain\Model\ApplicationServer;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ApplicationServerAbstract
 */
abstract class ApplicationServerAbstract
{
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

    abstract public function __wakeup();

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
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ApplicationServerDTO
         */
        Assertion::isInstanceOf($dto, ApplicationServerDTO::class);

        $self = new static(
            $dto->getIp());

        return $self
            ->setName($dto->getName())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
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
        return self::createDTO()
            ->setIp($this->getIp())
            ->setName($this->getName());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'ip' => $this->getIp(),
            'name' => $this->getName()
        ];
    }


    // @codeCoverageIgnoreStart

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

