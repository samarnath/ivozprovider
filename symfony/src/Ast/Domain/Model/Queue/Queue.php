<?php

namespace Ast\Domain\Model\Queue;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Queue
 */
class Queue extends QueueAbstract implements QueueInterface, EntityInterface
{
    /**
     * @var string
     */
    protected $name;


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
     * @return QueueDTO
     */
    public static function createDTO()
    {
        return new QueueDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueDTO
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
         * @var $dto QueueDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return QueueDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setName($this->getName());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'name' => $this->getName(),
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null
        ];
    }


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
        Assertion::maxLength($name, 128);

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


}

