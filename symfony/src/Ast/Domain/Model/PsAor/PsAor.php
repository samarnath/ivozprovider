<?php

namespace Ast\Domain\Model\PsAor;

use Core\Application\DataTransferObjectInterface;

/**
 * PsAor
 */
class PsAor extends PsAorAbstract implements PsAorInterface
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
     * @return PsAorDTO
     */
    public static function createDTO()
    {
        return new PsAorDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PsAorDTO
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
         * @var $dto PsAorDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return PsAorDTO
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
            'id' => $this->getId()
        ];
    }


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return self
     */
    protected function setId($id)
    {
        Assertion::notNull($id);
        Assertion::integerish($id);
        Assertion::greaterOrEqualThan($id, 0);

        $this->id = $id;

        return $this;
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

