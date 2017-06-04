<?php

namespace Core\Model\CallACLPattern;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * CallACLPattern
 */
class CallACLPattern implements EntityInterface, CallACLPatternInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $regExp;

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name, $regExp)
    {
        $this->setName($name);
        $this->setRegExp($regExp);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return CallACLPatternDTO
     */
    public static function createDTO()
    {
        return new CallACLPatternDTO();
    }

    /**
     * Factory method
     * @param CallACLPatternDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CallACLPatternDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getRegExp()
        );

        return $self
            ->setCompany($dto->getCompany());
    }

    /**
     * @param CallACLPatternDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CallACLPatternDTO::class);

        $this
            ->setName($dto->getName())
            ->setRegExp($dto->getRegExp())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return CallACLPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setRegExp($this->getRegExp())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'regExp' => $this->getRegExp(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
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
     * Set name
     *
     * @param string $name
     *
     * @return CallACLPattern
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 50);

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
     * Set regExp
     *
     * @param string $regExp
     *
     * @return CallACLPattern
     */
    protected function setRegExp($regExp)
    {
        Assertion::notNull($regExp);
        Assertion::maxLength($regExp, 255);

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
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return CallACLPattern
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

