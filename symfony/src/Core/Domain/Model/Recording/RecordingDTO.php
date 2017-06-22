<?php

namespace Core\Domain\Model\Recording;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class RecordingDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $callid;

    /**
     * @var \DateTime
     */
    private $calldate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $type = 'ddi';

    /**
     * @var float
     */
    private $duration = '0.000';

    /**
     * @var string
     */
    private $caller;

    /**
     * @var string
     */
    private $callee;

    /**
     * @var string
     */
    private $recorder;

    /**
     * @var integer
     */
    private $recordedFileFileSize;

    /**
     * @var string
     */
    private $recordedFileMimeType;

    /**
     * @var string
     */
    private $recordedFileBaseName;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'callid' => $this->getCallid(),
            'calldate' => $this->getCalldate(),
            'type' => $this->getType(),
            'duration' => $this->getDuration(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'recorder' => $this->getRecorder(),
            'recordedFileFileSize' => $this->getRecordedFileFileSize(),
            'recordedFileMimeType' => $this->getRecordedFileMimeType(),
            'recordedFileBaseName' => $this->getRecordedFileBaseName(),
            'companyId' => $this->getCompanyId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setCallid(isset($data['callid']) ? $data['callid'] : null)
            ->setCalldate(isset($data['calldate']) ? $data['calldate'] : null)
            ->setType(isset($data['type']) ? $data['type'] : null)
            ->setDuration(isset($data['duration']) ? $data['duration'] : null)
            ->setCaller(isset($data['caller']) ? $data['caller'] : null)
            ->setCallee(isset($data['callee']) ? $data['callee'] : null)
            ->setRecorder(isset($data['recorder']) ? $data['recorder'] : null)
            ->setRecordedFileFileSize(isset($data['recordedFileFileSize']) ? $data['recordedFileFileSize'] : null)
            ->setRecordedFileMimeType(isset($data['recordedFileMimeType']) ? $data['recordedFileMimeType'] : null)
            ->setRecordedFileBaseName(isset($data['recordedFileBaseName']) ? $data['recordedFileBaseName'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return RecordingDTO
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
     * @param string $callid
     *
     * @return RecordingDTO
     */
    public function setCallid($callid = null)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param \DateTime $calldate
     *
     * @return RecordingDTO
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
     * @param string $type
     *
     * @return RecordingDTO
     */
    public function setType($type)
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
     * @param float $duration
     *
     * @return RecordingDTO
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $caller
     *
     * @return RecordingDTO
     */
    public function setCaller($caller = null)
    {
        $this->caller = $caller;

        return $this;
    }

    /**
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * @param string $callee
     *
     * @return RecordingDTO
     */
    public function setCallee($callee = null)
    {
        $this->callee = $callee;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * @param string $recorder
     *
     * @return RecordingDTO
     */
    public function setRecorder($recorder = null)
    {
        $this->recorder = $recorder;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecorder()
    {
        return $this->recorder;
    }

    /**
     * @param integer $recordedFileFileSize
     *
     * @return RecordingDTO
     */
    public function setRecordedFileFileSize($recordedFileFileSize = null)
    {
        $this->recordedFileFileSize = $recordedFileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRecordedFileFileSize()
    {
        return $this->recordedFileFileSize;
    }

    /**
     * @param string $recordedFileMimeType
     *
     * @return RecordingDTO
     */
    public function setRecordedFileMimeType($recordedFileMimeType = null)
    {
        $this->recordedFileMimeType = $recordedFileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordedFileMimeType()
    {
        return $this->recordedFileMimeType;
    }

    /**
     * @param string $recordedFileBaseName
     *
     * @return RecordingDTO
     */
    public function setRecordedFileBaseName($recordedFileBaseName = null)
    {
        $this->recordedFileBaseName = $recordedFileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordedFileBaseName()
    {
        return $this->recordedFileBaseName;
    }

    /**
     * @param integer $companyId
     *
     * @return RecordingDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }
}

