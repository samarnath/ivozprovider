<?php

namespace Core\Model\CallACLRelPattern;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * CallACLRelPattern
 */
class CallACLRelPattern implements EntityInterface, CallACLRelPatternInterface
{
    /**
     * @var integer
     */
    protected $id;

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
     * @var \Core\Model\CallACL\CallACLInterface
     */
    protected $callACL;

    /**
     * @var \Core\Model\CallACLPattern\CallACLPatternInterface
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

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return CallACLRelPatternDTO
     */
    public static function createDTO()
    {
        return new CallACLRelPatternDTO();
    }

    /**
     * Factory method
     * @param CallACLRelPatternDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CallACLRelPatternDTO::class);

        $self = new self(
            $dto->getPriority(),
            $dto->getPolicy()
        );

        return $self
            ->setCallACL($dto->getCallACL())
            ->setCallACLPattern($dto->getCallACLPattern());
    }

    /**
     * @param CallACLRelPatternDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'priority' => $this->getPriority(),
            'policy' => $this->getPolicy(),
            'callACLId' => $this->getCallACL() ? $this->getCallACL()->getId() : null,
            'callACLPatternId' => $this->getCallACLPattern() ? $this->getCallACLPattern()->getId() : null
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
     * Set priority
     *
     * @param integer $priority
     *
     * @return CallACLRelPattern
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
     * @return CallACLRelPattern
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
     * @param \Core\Model\CallACL\CallACLInterface $callACL
     *
     * @return CallACLRelPattern
     */
    protected function setCallACL(\Core\Model\CallACL\CallACLInterface $callACL)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Core\Model\CallACL\CallACLInterface
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set callACLPattern
     *
     * @param \Core\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     *
     * @return CallACLRelPattern
     */
    protected function setCallACLPattern(\Core\Model\CallACLPattern\CallACLPatternInterface $callACLPattern)
    {
        $this->callACLPattern = $callACLPattern;

        return $this;
    }

    /**
     * Get callACLPattern
     *
     * @return \Core\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern()
    {
        return $this->callACLPattern;
    }



    // @codeCoverageIgnoreEnd
}

