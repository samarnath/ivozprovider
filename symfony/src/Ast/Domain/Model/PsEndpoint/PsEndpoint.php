<?php

namespace Ast\Domain\Model\PsEndpoint;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * PsEndpoint
 */
class PsEndpoint extends PsEndpointAbstract implements PsEndpointInterface, EntityInterface
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

    ///////////////////////////////
    //
    ///////////////////////////////

    /**
     * @deprecated
     * @throws \Exception
     */
    public function getAstPsAor()
    {
        Throw new \Exception('To be re-thinked');
    }

    ///////////////////////////////
    //
    ///////////////////////////////

    /**
     * @return PsEndpointDTO
     */
    public static function createDTO()
    {
        return new PsEndpointDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PsEndpointDTO
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
         * @var $dto PsEndpointDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return PsEndpointDTO
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
            'terminalId' => $this->getTerminal() ? $this->getTerminal()->getId() : null,
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null,
            'retailAccountId' => $this->getRetailAccount() ? $this->getRetailAccount()->getId() : null
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

