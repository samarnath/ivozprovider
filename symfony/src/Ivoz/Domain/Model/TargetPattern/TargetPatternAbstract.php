<?php

namespace Ivoz\Domain\Model\TargetPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * TargetPatternAbstract
 */
abstract class TargetPatternAbstract
{
    /**
     * @var string
     */
    protected $regExp;

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Description
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
    public function __construct(
        $regExp,
        Name $name,
        Description $description
    ) {
        $this->setRegExp($regExp);
        $this->setName($name);
        $this->setDescription($description);
    }

    abstract public function __wakeup();

    /**
     * @return TargetPatternDTO
     */
    public static function createDTO()
    {
        return new TargetPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TargetPatternDTO
         */
        Assertion::isInstanceOf($dto, TargetPatternDTO::class);

        $name = new Name(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $self = new static(
            $dto->getRegExp(),
            $name,
            $description
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
         * @var $dto TargetPatternDTO
         */
        Assertion::isInstanceOf($dto, TargetPatternDTO::class);

        $name = new Name(
            $dto->getName(),
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescription(),
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $this
            ->setRegExp($dto->getRegExp())
            ->setName($name)
            ->setDescription($description);


        return $this;
    }

    /**
     * @return TargetPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setRegExp($this->getRegExp())
            ->setName($this->getName()->getName())
            ->setNameEn($this->getName()->getEn())
            ->setNameEs($this->getName()->getEs())
            ->setDescription($this->getDescription()->getDescription())
            ->setDescriptionEn($this->getDescription()->getEn())
            ->setDescriptionEs($this->getDescription()->getEs());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'regExp' => $this->getRegExp(),
            'name' => $this->getName()->getName(),
            'en' => $this->getName()->getEn(),
            'es' => $this->getName()->getEs(),
            'description' => $this->getDescription()->getDescription(),
            'en' => $this->getDescription()->getEn(),
            'es' => $this->getDescription()->getEs()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set regExp
     *
     * @param string $regExp
     *
     * @return self
     */
    protected function setRegExp($regExp)
    {
        Assertion::notNull($regExp);
        Assertion::maxLength($regExp, 80);

        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
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

    /**
     * Set description
     *
     * @param Description $description
     *
     * @return self
     */
    protected function setDescription(Description $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    // @codeCoverageIgnoreEnd
}

