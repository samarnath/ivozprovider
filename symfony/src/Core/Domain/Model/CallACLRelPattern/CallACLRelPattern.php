<?php

namespace Core\Domain\Model\CallACLRelPattern;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * CallACLRelPattern
 */
class CallACLRelPattern extends CallACLRelPatternAbstract implements CallACLRelPatternInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallACLRelPatternDTO
         */
        Assertion::isInstanceOf($dto, CallACLRelPatternDTO::class);

        $self = new self(
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'callACLId' => $this->getCallACL() ? $this->getCallACL()->getId() : null,
            'callACLPatternId' => $this->getCallACLPattern() ? $this->getCallACLPattern()->getId() : null
        ];
    }


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
     * Set callACL
     *
     * @param \Core\Domain\Model\CallACL\CallACLInterface $callACL
     *
     * @return self
     */
    protected function setCallACL(\Core\Domain\Model\CallACL\CallACLInterface $callACL)
    {
        $this->callACL = $callACL;

        return $this;
    }

    /**
     * Get callACL
     *
     * @return \Core\Domain\Model\CallACL\CallACLInterface
     */
    public function getCallACL()
    {
        return $this->callACL;
    }

    /**
     * Set callACLPattern
     *
     * @param \Core\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern
     *
     * @return self
     */
    protected function setCallACLPattern(\Core\Domain\Model\CallACLPattern\CallACLPatternInterface $callACLPattern)
    {
        $this->callACLPattern = $callACLPattern;

        return $this;
    }

    /**
     * Get callACLPattern
     *
     * @return \Core\Domain\Model\CallACLPattern\CallACLPatternInterface
     */
    public function getCallACLPattern()
    {
        return $this->callACLPattern;
    }


}

