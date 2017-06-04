<?php

namespace Core\Model\CompanyService;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * CompanyService
 */
class CompanyService implements EntityInterface, CompanyServiceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\Service\Service
     */
    protected $service;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($code)
    {
        $this->setCode($code);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return CompanyServiceDTO
     */
    public static function createDTO()
    {
        return new CompanyServiceDTO();
    }

    /**
     * Factory method
     * @param CompanyServiceDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CompanyServiceDTO::class);

        $self = new self(
            $dto->getCode()
        );

        return $self
            ->setCompany($dto->getCompany())
            ->setService($dto->getService());
    }

    /**
     * @param CompanyServiceDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CompanyServiceDTO::class);

        $this
            ->setCode($dto->getCode())
            ->setCompany($dto->getCompany())
            ->setService($dto->getService());


        return $this;
    }

    /**
     * @return CompanyServiceDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setCode($this->getCode())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setServiceId($this->getService() ? $this->getService()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'code' => $this->getCode(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'serviceId' => $this->getService() ? $this->getService()->getId() : null
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
     * Set code
     *
     * @param string $code
     *
     * @return CompanyService
     */
    protected function setCode($code)
    {
        Assertion::notNull($code);
        Assertion::maxLength($code, 3);

        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return CompanyService
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

    /**
     * Set service
     *
     * @param \Core\Model\Service\Service $service
     *
     * @return CompanyService
     */
    protected function setService(\Core\Model\Service\Service $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Core\Model\Service\Service
     */
    public function getService()
    {
        return $this->service;
    }



    // @codeCoverageIgnoreEnd
}

