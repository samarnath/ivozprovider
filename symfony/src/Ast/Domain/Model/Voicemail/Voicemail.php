<?php

namespace Ast\Domain\Model\Voicemail;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Voicemail
 */
class Voicemail extends VoicemailAbstract implements VoicemailInterface, EntityInterface
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
     * @return VoicemailDTO
     */
    public static function createDTO()
    {
        return new VoicemailDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto VoicemailDTO
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
         * @var $dto VoicemailDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return VoicemailDTO
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
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
        ];
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

