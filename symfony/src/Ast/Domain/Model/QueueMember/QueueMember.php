<?php

namespace Ast\Domain\Model\QueueMember;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * QueueMember
 */
class QueueMember extends QueueMemberAbstract implements QueueMemberInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $uniqueid;


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
     * @return QueueMemberDTO
     */
    public static function createDTO()
    {
        return new QueueMemberDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueMemberDTO
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
         * @var $dto QueueMemberDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return QueueMemberDTO
     */
    public function toDTO()
    {
        $dto = parent::toDTO();
        return $dto
            ->setUniqueid($this->getUniqueid());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'uniqueid' => $this->getUniqueid(),
            'queueMemberId' => $this->getQueueMember() ? $this->getQueueMember()->getId() : null
        ];
    }


    /**
     * Set uniqueid
     *
     * @param integer $uniqueid
     *
     * @return self
     */
    protected function setUniqueid($uniqueid)
    {
        Assertion::notNull($uniqueid);
        Assertion::integerish($uniqueid);
        Assertion::greaterOrEqualThan($uniqueid, 0);

        $this->uniqueid = $uniqueid;

        return $this;
    }

    /**
     * Get uniqueid
     *
     * @return integer
     */
    public function getUniqueid()
    {
        return $this->uniqueid;
    }


}

