<?php

namespace Core\Domain\Model\FaxesInOut;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FaxesInOut
 */
class FaxesInOut implements EntityInterface, FaxesInOutInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @comment ora de recepcion del fa
     * @var \DateTime
     */
    protected $calldate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    protected $src;

    /**
     * @var string
     */
    protected $dst;

    /**
     * @comment enum:In|Out
     * @var string
     */
    protected $type = 'Out';

    /**
     * @var string
     */
    protected $pages;

    /**
     * @var string
     */
    protected $status;

    /**
     * @comment FSO
     * @var integer
     */
    protected $fileFileSize;

    /**
     * @var string
     */
    protected $fileMimeType;

    /**
     * @var string
     */
    protected $fileBaseName;

    /**
     * @var \Core\Domain\Model\Fax\FaxInterface
     */
    protected $fax;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($calldate)
    {
        $this->setCalldate($calldate);
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
     * @param FaxesInOutDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FaxesInOutDTO::class);

        $self = new self(
            $dto->getCalldate()
        );

        return $self
            ->setSrc($dto->getSrc())
            ->setDst($dto->getDst())
            ->setType($dto->getType())
            ->setPages($dto->getPages())
            ->setStatus($dto->getStatus())
            ->setFileFileSize($dto->getFileFileSize())
            ->setFileMimeType($dto->getFileMimeType())
            ->setFileBaseName($dto->getFileBaseName())
            ->setFax($dto->getFax());
    }

    /**
     * @param FaxesInOutDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FaxesInOutDTO::class);

        $this
            ->setCalldate($dto->getCalldate())
            ->setSrc($dto->getSrc())
            ->setDst($dto->getDst())
            ->setType($dto->getType())
            ->setPages($dto->getPages())
            ->setStatus($dto->getStatus())
            ->setFileFileSize($dto->getFileFileSize())
            ->setFileMimeType($dto->getFileMimeType())
            ->setFileBaseName($dto->getFileBaseName())
            ->setFax($dto->getFax());


        return $this;
    }

    /**
     * @return FaxesInOutDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setCalldate($this->getCalldate())
            ->setSrc($this->getSrc())
            ->setDst($this->getDst())
            ->setType($this->getType())
            ->setPages($this->getPages())
            ->setStatus($this->getStatus())
            ->setFileFileSize($this->getFileFileSize())
            ->setFileMimeType($this->getFileMimeType())
            ->setFileBaseName($this->getFileBaseName())
            ->setFaxId($this->getFax() ? $this->getFax()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'calldate' => $this->getCalldate(),
            'src' => $this->getSrc(),
            'dst' => $this->getDst(),
            'type' => $this->getType(),
            'pages' => $this->getPages(),
            'status' => $this->getStatus(),
            'fileFileSize' => $this->getFileFileSize(),
            'fileMimeType' => $this->getFileMimeType(),
            'fileBaseName' => $this->getFileBaseName(),
            'faxId' => $this->getFax() ? $this->getFax()->getId() : null
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
     * Set calldate
     *
     * @param \DateTime $calldate
     *
     * @return FaxesInOut
     */
    protected function setCalldate($calldate)
    {
        Assertion::notNull($calldate);

        $this->calldate = $calldate;

        return $this;
    }

    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * Set src
     *
     * @param string $src
     *
     * @return FaxesInOut
     */
    protected function setSrc($src = null)
    {
        if (!is_null($src)) {
            Assertion::maxLength($src, 128);
        }

        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set dst
     *
     * @param string $dst
     *
     * @return FaxesInOut
     */
    protected function setDst($dst = null)
    {
        if (!is_null($dst)) {
            Assertion::maxLength($dst, 128);
        }

        $this->dst = $dst;

        return $this;
    }

    /**
     * Get dst
     *
     * @return string
     */
    public function getDst()
    {
        return $this->dst;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return FaxesInOut
     */
    protected function setType($type = null)
    {
        if (!is_null($type)) {
            Assertion::maxLength($type, 20);
        Assertion::choice($type, array (
          0 => '    In',
          1 => '    Out',
        ));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set pages
     *
     * @param string $pages
     *
     * @return FaxesInOut
     */
    protected function setPages($pages = null)
    {
        if (!is_null($pages)) {
            Assertion::maxLength($pages, 64);
        }

        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return FaxesInOut
     */
    protected function setStatus($status = null)
    {
        if (!is_null($status)) {
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set fileFileSize
     *
     * @param integer $fileFileSize
     *
     * @return FaxesInOut
     */
    protected function setFileFileSize($fileFileSize = null)
    {
        if (!is_null($fileFileSize)) {
            if (!is_null($fileFileSize)) {
                Assertion::integerish($fileFileSize);
                Assertion::greaterOrEqualThan($fileFileSize, 0);
            }
        }

        $this->fileFileSize = $fileFileSize;

        return $this;
    }

    /**
     * Get fileFileSize
     *
     * @return integer
     */
    public function getFileFileSize()
    {
        return $this->fileFileSize;
    }

    /**
     * Set fileMimeType
     *
     * @param string $fileMimeType
     *
     * @return FaxesInOut
     */
    protected function setFileMimeType($fileMimeType = null)
    {
        if (!is_null($fileMimeType)) {
            Assertion::maxLength($fileMimeType, 80);
        }

        $this->fileMimeType = $fileMimeType;

        return $this;
    }

    /**
     * Get fileMimeType
     *
     * @return string
     */
    public function getFileMimeType()
    {
        return $this->fileMimeType;
    }

    /**
     * Set fileBaseName
     *
     * @param string $fileBaseName
     *
     * @return FaxesInOut
     */
    protected function setFileBaseName($fileBaseName = null)
    {
        if (!is_null($fileBaseName)) {
            Assertion::maxLength($fileBaseName, 255);
        }

        $this->fileBaseName = $fileBaseName;

        return $this;
    }

    /**
     * Get fileBaseName
     *
     * @return string
     */
    public function getFileBaseName()
    {
        return $this->fileBaseName;
    }

    /**
     * Set fax
     *
     * @param \Core\Domain\Model\Fax\FaxInterface $fax
     *
     * @return FaxesInOut
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



    // @codeCoverageIgnoreEnd
}

