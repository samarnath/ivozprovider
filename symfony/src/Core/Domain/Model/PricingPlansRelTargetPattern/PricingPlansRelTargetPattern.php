<?php

namespace Core\Domain\Model\PricingPlansRelTargetPattern;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PricingPlansRelTargetPattern
 */
class PricingPlansRelTargetPattern implements EntityInterface, PricingPlansRelTargetPatternInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $connectionCharge;

    /**
     * @var integer
     */
    protected $periodTime;

    /**
     * @var string
     */
    protected $perPeriodCharge;

    /**
     * @var \Core\Domain\Model\PricingPlan\PricingPlanInterface
     */
    protected $pricingPlan;

    /**
     * @var \Core\Domain\Model\TargetPattern\TargetPatternInterface
     */
    protected $targetPattern;

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
    public function __construct(
        $connectionCharge,
        $periodTime,
        $perPeriodCharge
    ) {
        $this->setConnectionCharge($connectionCharge);
        $this->setPeriodTime($periodTime);
        $this->setPerPeriodCharge($perPeriodCharge);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return PricingPlansRelTargetPatternDTO
     */
    public static function createDTO()
    {
        return new PricingPlansRelTargetPatternDTO();
    }

    /**
     * Factory method
     * @param PricingPlansRelTargetPatternDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, PricingPlansRelTargetPatternDTO::class);

        $self = new self(
            $dto->getConnectionCharge(),
            $dto->getPeriodTime(),
            $dto->getPerPeriodCharge()
        );

        return $self
            ->setPricingPlan($dto->getPricingPlan())
            ->setTargetPattern($dto->getTargetPattern())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param PricingPlansRelTargetPatternDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, PricingPlansRelTargetPatternDTO::class);

        $this
            ->setConnectionCharge($dto->getConnectionCharge())
            ->setPeriodTime($dto->getPeriodTime())
            ->setPerPeriodCharge($dto->getPerPeriodCharge())
            ->setPricingPlan($dto->getPricingPlan())
            ->setTargetPattern($dto->getTargetPattern())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return PricingPlansRelTargetPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setConnectionCharge($this->getConnectionCharge())
            ->setPeriodTime($this->getPeriodTime())
            ->setPerPeriodCharge($this->getPerPeriodCharge())
            ->setPricingPlanId($this->getPricingPlan() ? $this->getPricingPlan()->getId() : null)
            ->setTargetPatternId($this->getTargetPattern() ? $this->getTargetPattern()->getId() : null)
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'connectionCharge' => $this->getConnectionCharge(),
            'periodTime' => $this->getPeriodTime(),
            'perPeriodCharge' => $this->getPerPeriodCharge(),
            'pricingPlanId' => $this->getPricingPlan() ? $this->getPricingPlan()->getId() : null,
            'targetPatternId' => $this->getTargetPattern() ? $this->getTargetPattern()->getId() : null,
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
     * Set connectionCharge
     *
     * @param string $connectionCharge
     *
     * @return PricingPlansRelTargetPattern
     */
    protected function setConnectionCharge($connectionCharge)
    {
        Assertion::notNull($connectionCharge);
        //Assertion::float($connectionCharge);

        $this->connectionCharge = $connectionCharge;

        return $this;
    }

    /**
     * Get connectionCharge
     *
     * @return string
     */
    public function getConnectionCharge()
    {
        return $this->connectionCharge;
    }

    /**
     * Set periodTime
     *
     * @param integer $periodTime
     *
     * @return PricingPlansRelTargetPattern
     */
    protected function setPeriodTime($periodTime)
    {
        Assertion::notNull($periodTime);
        Assertion::integerish($periodTime);

        $this->periodTime = $periodTime;

        return $this;
    }

    /**
     * Get periodTime
     *
     * @return integer
     */
    public function getPeriodTime()
    {
        return $this->periodTime;
    }

    /**
     * Set perPeriodCharge
     *
     * @param string $perPeriodCharge
     *
     * @return PricingPlansRelTargetPattern
     */
    protected function setPerPeriodCharge($perPeriodCharge)
    {
        Assertion::notNull($perPeriodCharge);
        //Assertion::float($perPeriodCharge);

        $this->perPeriodCharge = $perPeriodCharge;

        return $this;
    }

    /**
     * Get perPeriodCharge
     *
     * @return string
     */
    public function getPerPeriodCharge()
    {
        return $this->perPeriodCharge;
    }

    /**
     * Set pricingPlan
     *
     * @param \Core\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan
     *
     * @return PricingPlansRelTargetPattern
     */
    protected function setPricingPlan(\Core\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan)
    {
        $this->pricingPlan = $pricingPlan;

        return $this;
    }

    /**
     * Get pricingPlan
     *
     * @return \Core\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * Set targetPattern
     *
     * @param \Core\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern
     *
     * @return PricingPlansRelTargetPattern
     */
    protected function setTargetPattern(\Core\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern)
    {
        $this->targetPattern = $targetPattern;

        return $this;
    }

    /**
     * Get targetPattern
     *
     * @return \Core\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return PricingPlansRelTargetPattern
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
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

