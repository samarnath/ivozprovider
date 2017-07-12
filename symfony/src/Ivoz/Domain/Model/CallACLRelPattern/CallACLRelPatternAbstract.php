<?php

namespace Ivoz\Domain\Model\CallACLRelPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CallACLRelPatternAbstract
 */
abstract class CallACLRelPatternAbstract
{
    /**
     * @var integer
     */
    protected $priority;

    /**
     * @comment enum:allow|deny
     * @var string
     */
    protected $policy;

    /**
     * @var \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    protected $callACL;

    /**
     * @var \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    protected $callACLPattern;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($priority, $policy)
    {
        $this->setPriority($priority);
        $this->setPolicy($policy);
    }

    abstract public function __wakeup();

    /**
     * @return CallACLRelPatternDTO
     */
    public static function createDTO()
    {
        return new CallACLRelPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallACLRelPatternDTO
         */
        Assertion::isInstanceOf($dto, CallACLRelPatternDTO::class);

        $self = new static(
            $dto->getPriority(),
            $dto->getPolicy());

        return $self
            ->setCallACL($dto->getCallACL())
            ->setCallACLPattern($dto->getCallACLPattern())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallACLRelPatternDTO
         */
        Assertion::isInstanceOf($dto, CallACLRelPatternDTO::class);

        $this
            ->setPriority($dto->getPriority())
            ->setPolicy($dto->getPolicy())
            ->setCallACL($dto->getCallACL())
            ->setCallACLPattern($dto->getCallACLPattern());


        return $this;
    }

    /**
     * @return CallACLRelPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setPriority($this->getPriority())
            ->setPolicy($this->getPolicy())
            ->setCallACLId($this->getCallACL() ? $this->getCallACL()->getId() : null)
            ->setCallACLPatternId($this->getCallACLPattern() ? $this->getCallACLPattern()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'priority' => $this->getPriority(),
            'policy' => $this->getPolicy(),
            'callACLId' => $this->getCallACL() ? $this->getCallACL()->getId() : null,
            'callACLPatternId' => $this->getCallACLPattern() ? $this->getCallACLPattern()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set policy
     *
     * @param string $policy
     *
     * @return self
     */
    protected function setPolicy($policy)
    {
        Assertion::notNull($policy);
        Assertion::maxLength($policy, 25);
        Assertion::choice($policy, array (
          0 => 'allow',
          1 => 'deny',
        ));

        $this->policy = $policy;

        return $this;
    }

    /**
     * Get policy
     *
     * @return string
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * Set callACL
     *
     * @param \Ivoz\Domain\Model\CallACL\CallACLInterface $callACL
     *
     * @return self
     */
    protected function setCallACL(\Ivoz\Domain\Model\CallACL\CallACLInterface $callACL)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Ivoz\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set callACLPattern
     *
     * @param \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     *
     * @return self
     */
    protected function setCallACLPattern(\Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern)
    {
        $this->callACLPattern = $callACLPattern;

        return $this;
    }

    /**
     * Get callACLPattern
     *
     * @return \Ivoz\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern()
    {
        return $this->callACLPattern;
    }



    // @codeCoverageIgnoreEnd
}

