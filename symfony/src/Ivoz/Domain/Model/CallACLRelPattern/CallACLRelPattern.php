<?php

namespace Ivoz\Domain\Model\CallACLRelPattern;

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
    public function __construct()
    {
        parent::__construct(...func_get_args());

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
        $self = parent::fromDTO($dto);

        return $self;
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
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return CallACLRelPatternDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
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


}

