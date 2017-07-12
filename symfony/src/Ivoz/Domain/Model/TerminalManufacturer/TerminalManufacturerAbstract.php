<?php

namespace Ivoz\Domain\Model\TerminalManufacturer;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * TerminalManufacturerAbstract
 */
abstract class TerminalManufacturerAbstract
{
    /**
     * @var string
     */
    protected $iden;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($iden, $name, $description)
    {
        $this->setIden($iden);
        $this->setName($name);
        $this->setDescription($description);
    }

    abstract public function __wakeup();

    /**
     * @return TerminalManufacturerDTO
     */
    public static function createDTO()
    {
        return new TerminalManufacturerDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TerminalManufacturerDTO
         */
        Assertion::isInstanceOf($dto, TerminalManufacturerDTO::class);

        $self = new static(
            $dto->getIden(),
            $dto->getName(),
            $dto->getDescription());

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TerminalManufacturerDTO
         */
        Assertion::isInstanceOf($dto, TerminalManufacturerDTO::class);

        $this
            ->setIden($dto->getIden())
            ->setName($dto->getName())
            ->setDescription($dto->getDescription());


        return $this;
    }

    /**
     * @return TerminalManufacturerDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setIden($this->getIden())
            ->setName($this->getName())
            ->setDescription($this->getDescription());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'iden' => $this->getIden(),
            'name' => $this->getName(),
            'description' => $this->getDescription()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    protected function setIden($iden)
    {
        Assertion::notNull($iden);
        Assertion::maxLength($iden, 100);

        $this->iden = $iden;

        return $this;
    }

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden()
    {
        return $this->iden;
    }

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
        Assertion::maxLength($name, 100);

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
    protected function setDescription($description)
    {
        Assertion::notNull($description);
        Assertion::maxLength($description, 500);

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

