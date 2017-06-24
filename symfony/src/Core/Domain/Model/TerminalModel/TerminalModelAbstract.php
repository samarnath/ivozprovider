<?php

namespace Core\Domain\Model\TerminalModel;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TerminalModelAbstract
 */
abstract class TerminalModelAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var string
     */
    protected $genericTemplate;

    /**
     * @var string
     */
    protected $specificTemplate;

    /**
     * @var string
     */
    protected $genericUrlPattern;

    /**
     * @var string
     */
    protected $specificUrlPattern;

    /**
     * @var \Core\Domain\Model\TerminalManufacturer\TerminalManufacturerInterface
     */
    protected $TerminalManufacturer;


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

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return TerminalModelDTO
     */
    public static function createDTO()
    {
        return new TerminalModelDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TerminalModelDTO
         */
        Assertion::isInstanceOf($dto, TerminalModelDTO::class);

        $self = new static(
            $dto->getIden(),
            $dto->getName(),
            $dto->getDescription()
        );

        return $self
            ->setGenericTemplate($dto->getGenericTemplate())
            ->setSpecificTemplate($dto->getSpecificTemplate())
            ->setGenericUrlPattern($dto->getGenericUrlPattern())
            ->setSpecificUrlPattern($dto->getSpecificUrlPattern())
            ->setTerminalManufacturer($dto->getTerminalManufacturer());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TerminalModelDTO
         */
        Assertion::isInstanceOf($dto, TerminalModelDTO::class);

        $this
            ->setIden($dto->getIden())
            ->setName($dto->getName())
            ->setDescription($dto->getDescription())
            ->setGenericTemplate($dto->getGenericTemplate())
            ->setSpecificTemplate($dto->getSpecificTemplate())
            ->setGenericUrlPattern($dto->getGenericUrlPattern())
            ->setSpecificUrlPattern($dto->getSpecificUrlPattern())
            ->setTerminalManufacturer($dto->getTerminalManufacturer());


        return $this;
    }

    /**
     * @return TerminalModelDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setIden($this->getIden())
            ->setName($this->getName())
            ->setDescription($this->getDescription())
            ->setGenericTemplate($this->getGenericTemplate())
            ->setSpecificTemplate($this->getSpecificTemplate())
            ->setGenericUrlPattern($this->getGenericUrlPattern())
            ->setSpecificUrlPattern($this->getSpecificUrlPattern())
            ->setTerminalManufacturerId($this->getTerminalManufacturer() ? $this->getTerminalManufacturer()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'iden' => $this->getIden(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'genericTemplate' => $this->getGenericTemplate(),
            'specificTemplate' => $this->getSpecificTemplate(),
            'genericUrlPattern' => $this->getGenericUrlPattern(),
            'specificUrlPattern' => $this->getSpecificUrlPattern(),
            'terminalManufacturerId' => $this->getTerminalManufacturer() ? $this->getTerminalManufacturer()->getId() : null
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

    /**
     * Set genericTemplate
     *
     * @param string $genericTemplate
     *
     * @return self
     */
    protected function setGenericTemplate($genericTemplate = null)
    {
        if (!is_null($genericTemplate)) {
            Assertion::maxLength($genericTemplate, 65535);
        }

        $this->genericTemplate = $genericTemplate;

        return $this;
    }

    /**
     * Get genericTemplate
     *
     * @return string
     */
    public function getGenericTemplate()
    {
        return $this->genericTemplate;
    }

    /**
     * Set specificTemplate
     *
     * @param string $specificTemplate
     *
     * @return self
     */
    protected function setSpecificTemplate($specificTemplate = null)
    {
        if (!is_null($specificTemplate)) {
            Assertion::maxLength($specificTemplate, 65535);
        }

        $this->specificTemplate = $specificTemplate;

        return $this;
    }

    /**
     * Get specificTemplate
     *
     * @return string
     */
    public function getSpecificTemplate()
    {
        return $this->specificTemplate;
    }

    /**
     * Set genericUrlPattern
     *
     * @param string $genericUrlPattern
     *
     * @return self
     */
    protected function setGenericUrlPattern($genericUrlPattern = null)
    {
        if (!is_null($genericUrlPattern)) {
            Assertion::maxLength($genericUrlPattern, 225);
        }

        $this->genericUrlPattern = $genericUrlPattern;

        return $this;
    }

    /**
     * Get genericUrlPattern
     *
     * @return string
     */
    public function getGenericUrlPattern()
    {
        return $this->genericUrlPattern;
    }

    /**
     * Set specificUrlPattern
     *
     * @param string $specificUrlPattern
     *
     * @return self
     */
    protected function setSpecificUrlPattern($specificUrlPattern = null)
    {
        if (!is_null($specificUrlPattern)) {
            Assertion::maxLength($specificUrlPattern, 225);
        }

        $this->specificUrlPattern = $specificUrlPattern;

        return $this;
    }

    /**
     * Get specificUrlPattern
     *
     * @return string
     */
    public function getSpecificUrlPattern()
    {
        return $this->specificUrlPattern;
    }

    /**
     * Set terminalManufacturer
     *
     * @param \Core\Domain\Model\TerminalManufacturer\TerminalManufacturerInterface $terminalManufacturer
     *
     * @return self
     */
    protected function setTerminalManufacturer(\Core\Domain\Model\TerminalManufacturer\TerminalManufacturerInterface $terminalManufacturer)
    {
        $this->TerminalManufacturer = $terminalManufacturer;

        return $this;
    }

    /**
     * Get terminalManufacturer
     *
     * @return \Core\Domain\Model\TerminalManufacturer\TerminalManufacturerInterface
     */
    public function getTerminalManufacturer()
    {
        return $this->TerminalManufacturer;
    }



    // @codeCoverageIgnoreEnd
}

