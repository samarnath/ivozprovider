<?php

namespace Core\Domain\Model\FaxesInOut;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FaxesInOut
 */
class FaxesInOut extends FaxesInOutAbstract implements FaxesInOutInterface, EntityInterface
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
    public function __construct($calldate, File $file)
    {
        $this->setCalldate($calldate);
        $this->setFile($file);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return FaxesInOutDTO
     */
    public static function createDTO()
    {
        return new FaxesInOutDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FaxesInOutDTO
         */
        Assertion::isInstanceOf($dto, FaxesInOutDTO::class);

        $file = new File(
            $dto->getFileFileSize(),
            $dto->getFileMimeType(),
            $dto->getFileBaseName()
        );

        $self = new self(
            $dto->getCalldate(),
            $file
        );

        return $self
            ->setSrc($dto->getSrc())
            ->setDst($dto->getDst())
            ->setType($dto->getType())
            ->setPages($dto->getPages())
            ->setStatus($dto->getStatus())
            ->setFax($dto->getFax())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FaxesInOutDTO
         */
        Assertion::isInstanceOf($dto, FaxesInOutDTO::class);

        $file = new File(
            $dto->getFileFileSize(),
            $dto->getFileMimeType(),
            $dto->getFileBaseName()
        );

        $this
            ->setCalldate($dto->getCalldate())
            ->setSrc($dto->getSrc())
            ->setDst($dto->getDst())
            ->setType($dto->getType())
            ->setPages($dto->getPages())
            ->setStatus($dto->getStatus())
            ->setFile($file)
            ->setFax($dto->getFax());


        return $this;
    }

    /**
     * @return FaxesInOutDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setCalldate($this->getCalldate())
            ->setSrc($this->getSrc())
            ->setDst($this->getDst())
            ->setType($this->getType())
            ->setPages($this->getPages())
            ->setStatus($this->getStatus())
            ->setId($this->getId())
            ->setFileFileSize($this->getFile()->getFileSize())
            ->setFileMimeType($this->getFile()->getMimeType())
            ->setFileBaseName($this->getFile()->getBaseName())
            ->setFaxId($this->getFax() ? $this->getFax()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'calldate' => $this->getCalldate(),
            'src' => $this->getSrc(),
            'dst' => $this->getDst(),
            'type' => $this->getType(),
            'pages' => $this->getPages(),
            'status' => $this->getStatus(),
            'id' => $this->getId(),
            'fileSize' => $this->getFile()->getFileSize(),
            'mimeType' => $this->getFile()->getMimeType(),
            'baseName' => $this->getFile()->getBaseName(),
            'faxId' => $this->getFax() ? $this->getFax()->getId() : null
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
     * Set fax
     *
     * @param \Core\Domain\Model\Fax\FaxInterface $fax
     *
     * @return self
     */
    protected function setFax(\Core\Domain\Model\Fax\FaxInterface $fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax()
    {
        return $this->fax;
    }


}

