<?php

namespace Ivoz\Domain\Model\PricingPlansRelTargetPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PricingPlansRelTargetPatternAbstract
 */
abstract class PricingPlansRelTargetPatternAbstract
{
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
     * @var \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    protected $pricingPlan;

    /**
     * @var \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    protected $targetPattern;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
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

    abstract public function __wakeup();

    /**
     * @return PricingPlansRelTargetPatternDTO
     */
    public static function createDTO()
    {
        return new PricingPlansRelTargetPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlansRelTargetPatternDTO
         */
        Assertion::isInstanceOf($dto, PricingPlansRelTargetPatternDTO::class);

        $self = new static(
            $dto->getConnectionCharge(),
            $dto->getPeriodTime(),
            $dto->getPerPeriodCharge());

        return $self
            ->setPricingPlan($dto->getPricingPlan())
            ->setTargetPattern($dto->getTargetPattern())
            ->setBrand($dto->getBrand())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlansRelTargetPatternDTO
         */
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
     * Set connectionCharge
     *
     * @param string $connectionCharge
     *
     * @return self
     */
    protected function setConnectionCharge($connectionCharge)
    {
        Assertion::notNull($connectionCharge);
        Assertion::numeric($connectionCharge);

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
     * @return self
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
     * @return self
     */
    protected function setPerPeriodCharge($perPeriodCharge)
    {
        Assertion::notNull($perPeriodCharge);
        Assertion::numeric($perPeriodCharge);

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
     * @param \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan
     *
     * @return self
     */
    protected function setPricingPlan(\Ivoz\Domain\Model\PricingPlan\PricingPlanInterface $pricingPlan)
    {
        $this->pricingPlan = $pricingPlan;

        return $this;
    }

    /**
     * Get pricingPlan
     *
     * @return \Ivoz\Domain\Model\PricingPlan\PricingPlanInterface
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * Set targetPattern
     *
     * @param \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern
     *
     * @return self
     */
    protected function setTargetPattern(\Ivoz\Domain\Model\TargetPattern\TargetPatternInterface $targetPattern)
    {
        $this->targetPattern = $targetPattern;

        return $this;
    }

    /**
     * Get targetPattern
     *
     * @return \Ivoz\Domain\Model\TargetPattern\TargetPatternInterface
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

