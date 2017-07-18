<?php

namespace Ivoz\Domain\Model\FaxesInOut;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * FaxesInOutAbstract
 */
abstract class FaxesInOutAbstract
{
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
     * @var File
     */
    protected $file;

    /**
     * @var \Ivoz\Domain\Model\Fax\FaxInterface
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
    public function __construct($calldate, File $file)
    {
        $this->setCalldate($calldate);
        $this->setFile($file);
    }

    abstract public function __wakeup();

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

        $self = new static(
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
            'fileSize' => $this->getFile()->getFileSize(),
            'mimeType' => $this->getFile()->getMimeType(),
            'baseName' => $this->getFile()->getBaseName(),
            'faxId' => $this->getFax() ? $this->getFax()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set calldate
     *
     * @param \DateTime $calldate
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * Set fax
     *
     * @param \Ivoz\Domain\Model\Fax\FaxInterface $fax
     *
     * @return self
     */
    protected function setFax(\Ivoz\Domain\Model\Fax\FaxInterface $fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return \Ivoz\Domain\Model\Fax\FaxInterface
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set file
     *
     * @param File $file
     *
     * @return self
     */
    protected function setFile(File $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    // @codeCoverageIgnoreEnd
}

