<?php

namespace Ivoz\Domain\Model\MediaRelaySet;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * MediaRelaySetAbstract
 */
abstract class MediaRelaySetAbstract
{
    /**
     * @var string
     */
    protected $name = '0';

    /**
     * @var string
     */
    protected $description;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    abstract public function __wakeup();

    /**
     * @return MediaRelaySetDTO
     */
    public static function createDTO()
    {
        return new MediaRelaySetDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MediaRelaySetDTO
         */
        Assertion::isInstanceOf($dto, MediaRelaySetDTO::class);

        $self = new static(
            $dto->getName());

        return $self
            ->setDescription($dto->getDescription())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MediaRelaySetDTO
         */
        Assertion::isInstanceOf($dto, MediaRelaySetDTO::class);

        $this
            ->setName($dto->getName())
            ->setDescription($dto->getDescription());


        return $this;
    }

    /**
     * @return MediaRelaySetDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setDescription($this->getDescription());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription()
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
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 32);

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
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 200);
        }

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



    // @codeCoverageIgnoreEnd
}

