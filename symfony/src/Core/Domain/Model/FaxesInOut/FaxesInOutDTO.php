<?php

namespace Core\Domain\Model\FaxesInOut;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class FaxesInOutDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $calldate = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    private $src;

    /**
     * @var string
     */
    private $dst;

    /**
     * @var string
     */
    private $type = 'Out';

    /**
     * @var string
     */
    private $pages;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $fileFileSize;

    /**
     * @var string
     */
    private $fileMimeType;

    /**
     * @var string
     */
    private $fileBaseName;

    /**
     * @var mixed
     */
    private $faxId;

    /**
     * @var mixed
     */
    private $fax;

    /**
     * @return array
     */
    public function __toArray()
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
            'faxId' => $this->getFaxId()
        ];
    }

    /**
     * @param array $data
     * @return self
     * @deprecated
     *
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setCalldate(isset($data['calldate']) ? $data['calldate'] : null)
            ->setSrc(isset($data['src']) ? $data['src'] : null)
            ->setDst(isset($data['dst']) ? $data['dst'] : null)
            ->setType(isset($data['type']) ? $data['type'] : null)
            ->setPages(isset($data['pages']) ? $data['pages'] : null)
            ->setStatus(isset($data['status']) ? $data['status'] : null)
            ->setFileFileSize(isset($data['fileFileSize']) ? $data['fileFileSize'] : null)
            ->setFileMimeType(isset($data['fileMimeType']) ? $data['fileMimeType'] : null)
            ->setFileBaseName(isset($data['fileBaseName']) ? $data['fileBaseName'] : null)
            ->setFaxId(isset($data['faxId']) ? $data['faxId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->fax = $transformer->transform('Core\\Domain\\Model\\Fax\\Fax', $this->getFaxId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return FaxesInOutDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $calldate
     *
     * @return FaxesInOutDTO
     */
    public function setCalldate($calldate)
    {
        $this->calldate = $calldate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * @param string $src
     *
     * @return FaxesInOutDTO
     */
    public function setSrc($src = null)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param string $dst
     *
     * @return FaxesInOutDTO
     */
    public function setDst($dst = null)
    {
        $this->dst = $dst;

        return $this;
    }

    /**
     * @return string
     */
    public function getDst()
    {
        return $this->dst;
    }

    /**
     * @param string $type
     *
     * @return FaxesInOutDTO
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $pages
     *
     * @return FaxesInOutDTO
     */
    public function setPages($pages = null)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param string $status
     *
     * @return FaxesInOutDTO
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $fileFileSize
     *
     * @return FaxesInOutDTO
     */
    public function setFileFileSize($fileFileSize = null)
    {
        $this->fileFileSize = $fileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFileFileSize()
    {
        return $this->fileFileSize;
    }

    /**
     * @param string $fileMimeType
     *
     * @return FaxesInOutDTO
     */
    public function setFileMimeType($fileMimeType = null)
    {
        $this->fileMimeType = $fileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileMimeType()
    {
        return $this->fileMimeType;
    }

    /**
     * @param string $fileBaseName
     *
     * @return FaxesInOutDTO
     */
    public function setFileBaseName($fileBaseName = null)
    {
        $this->fileBaseName = $fileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileBaseName()
    {
        return $this->fileBaseName;
    }

    /**
     * @param integer $faxId
     *
     * @return FaxesInOutDTO
     */
    public function setFaxId($faxId)
    {
        $this->faxId = $faxId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFaxId()
    {
        return $this->faxId;
    }

    /**
     * @return \Core\Domain\Model\Fax\Fax
     */
    public function getFax()
    {
        return $this->fax;
    }
}

