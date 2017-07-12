<?php

namespace Ivoz\Domain\Model\CallACL;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CallACLAbstract
 */
abstract class CallACLAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @comment enum:allow|deny
     * @var string
     */
    protected $defaultPolicy;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
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
    public function __construct($name, $defaultPolicy)
    {
        $this->setName($name);
        $this->setDefaultPolicy($defaultPolicy);
    }

    abstract public function __wakeup();

    /**
     * @return CallACLDTO
     */
    public static function createDTO()
    {
        return new CallACLDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallACLDTO
         */
        Assertion::isInstanceOf($dto, CallACLDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getDefaultPolicy());

        return $self
            ->setCompany($dto->getCompany())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallACLDTO
         */
        Assertion::isInstanceOf($dto, CallACLDTO::class);

        $this
            ->setName($dto->getName())
            ->setDefaultPolicy($dto->getDefaultPolicy())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return CallACLDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setName($this->getName())
            ->setDefaultPolicy($this->getDefaultPolicy())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'defaultPolicy' => $this->getDefaultPolicy(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
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
     * Set defaultPolicy
     *
     * @param string $defaultPolicy
     *
     * @return self
     */
    protected function setDefaultPolicy($defaultPolicy)
    {
        Assertion::notNull($defaultPolicy);
        Assertion::maxLength($defaultPolicy, 10);
        Assertion::choice($defaultPolicy, array (
          0 => 'allow',
          1 => 'deny',
        ));

        $this->defaultPolicy = $defaultPolicy;

        return $this;
    }

    /**
     * Get defaultPolicy
     *
     * @return string
     */
    public function getDefaultPolicy()
    {
        return $this->defaultPolicy;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

