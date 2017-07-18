<?php

namespace Core\Domain\Model\Domain;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Domain
 */
class Domain implements EntityInterface, DomainInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $scope = 'global';

    /**
     * @var string
     */
    protected $pointsTo = 'proxyusers';

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \Core\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($domain, $scope, $pointsTo)
    {
        $this->setDomain($domain);
        $this->setScope($scope);
        $this->setPointsTo($pointsTo);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return DomainDTO
     */
    public static function createDTO()
    {
        return new DomainDTO();
    }

    /**
     * Factory method
     * @param DomainDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, DomainDTO::class);

        $self = new self(
            $dto->getDomain(),
            $dto->getScope(),
            $dto->getPointsTo()
        );

        return $self
            ->setDescription($dto->getDescription())
            ->setCompany($dto->getCompany())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param DomainDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, DomainDTO::class);

        $this
            ->setDomain($dto->getDomain())
            ->setScope($dto->getScope())
            ->setPointsTo($dto->getPointsTo())
            ->setDescription($dto->getDescription())
            ->setCompany($dto->getCompany())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return DomainDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setDomain($this->getDomain())
            ->setScope($this->getScope())
            ->setPointsTo($this->getPointsTo())
            ->setDescription($this->getDescription())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'domain' => $this->getDomain(),
            'scope' => $this->getScope(),
            'pointsTo' => $this->getPointsTo(),
            'description' => $this->getDescription(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
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
     * Set domain
     *
     * @param string $domain
     *
     * @return Domain
     */
    protected function setDomain($domain)
    {
        Assertion::notNull($domain);
        Assertion::maxLength($domain, 190);

        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set scope
     *
     * @param string $scope
     *
     * @return Domain
     */
    protected function setScope($scope)
    {
        Assertion::notNull($scope);

        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set pointsTo
     *
     * @param string $pointsTo
     *
     * @return Domain
     */
    protected function setPointsTo($pointsTo)
    {
        Assertion::notNull($pointsTo);

        $this->pointsTo = $pointsTo;

        return $this;
    }

    /**
     * Get pointsTo
     *
     * @return string
     */
    public function getPointsTo()
    {
        return $this->pointsTo;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Domain
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 500);
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

    /**
     * Set company
     *
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return Domain
     */
    protected function setCompany(\Core\Domain\Model\Company\CompanyInterface $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return Domain
     */
    public function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

