<?php

namespace Ivoz\Domain\Model\Language;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * LanguageAbstract
 */
abstract class LanguageAbstract
{
    /**
     * @var string
     */
    protected $iden;

    /**
     * @var Name
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
    public function __construct($iden, Name $name)
    {
        $this->setIden($iden);
        $this->setName($name);
    }

    abstract public function __wakeup();

    /**
     * @return LanguageDTO
     */
    public static function createDTO()
    {
        return new LanguageDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LanguageDTO
         */
        Assertion::isInstanceOf($dto, LanguageDTO::class);

        $name = new Name(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $self = new static(
            $dto->getIden(),
            $name
        );

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LanguageDTO
         */
        Assertion::isInstanceOf($dto, LanguageDTO::class);

        $name = new Name(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $this
            ->setIden($dto->getIden())
            ->setName($name);


        return $this;
    }

    /**
     * @return LanguageDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setIden($this->getIden())
            ->setName($this->getName()->getName())
            ->setNameEn($this->getName()->getEn())
            ->setNameEs($this->getName()->getEs());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'iden' => $this->getIden(),
            'name' => $this->getName()->getName(),
            'en' => $this->getName()->getEn(),
            'es' => $this->getName()->getEs()
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
     * @param Name $name
     *
     * @return self
     */
    protected function setName(Name $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    // @codeCoverageIgnoreEnd
}

