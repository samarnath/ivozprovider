<?php

namespace Kam\Domain\Model\Rtpproxy;

use Core\Application\DataTransferObjectInterface;

/**
 * Rtpproxy
 */
class Rtpproxy extends RtpproxyAbstract implements RtpproxyInterface
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
     * @return RtpproxyDTO
     */
    public static function createDTO()
    {
        return new RtpproxyDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RtpproxyDTO
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
         * @var $dto RtpproxyDTO
         */
        parent::updateFromDTO($dto);

        
        return $this;
    }

    /**
     * @return RtpproxyDTO
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


}

