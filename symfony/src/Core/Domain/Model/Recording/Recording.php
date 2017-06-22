<?php

namespace Core\Domain\Model\Recording;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Recording
 */
class Recording implements EntityInterface, RecordingInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $callid;

    /**
     * @var \DateTime
     */
    protected $calldate = 'CURRENT_TIMESTAMP';

    /**
     * @comment enum:ondemand|ddi
     * @var string
     */
    protected $type = 'ddi';

    /**
     * @var float
     */
    protected $duration = '0.000';

    /**
     * @var string
     */
    protected $caller;

    /**
     * @var string
     */
    protected $callee;

    /**
     * @var string
     */
    protected $recorder;

    /**
     * @comment FSO:keepExtension
     * @var integer
     */
    protected $recordedFileFileSize;

    /**
     * @var string
     */
    protected $recordedFileMimeType;

    /**
     * @var string
     */
    protected $recordedFileBaseName;

    /**
     * @var \Core\Domain\Model\Company\CompanyInterface
     */
    protected $company;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($calldate, $type, $duration)
    {
        $this->setCalldate($calldate);
        $this->setType($type);
        $this->setDuration($duration);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return RecordingDTO
     */
    public static function createDTO()
    {
        return new RecordingDTO();
    }

    /**
     * Factory method
     * @param RecordingDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RecordingDTO::class);

        $self = new self(
            $dto->getCalldate(),
            $dto->getType(),
            $dto->getDuration()
        );

        return $self
            ->setCallid($dto->getCallid())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setRecorder($dto->getRecorder())
            ->setRecordedFileFileSize($dto->getRecordedFileFileSize())
            ->setRecordedFileMimeType($dto->getRecordedFileMimeType())
            ->setRecordedFileBaseName($dto->getRecordedFileBaseName())
            ->setCompany($dto->getCompany());
    }

    /**
     * @param RecordingDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RecordingDTO::class);

        $this
            ->setCallid($dto->getCallid())
            ->setCalldate($dto->getCalldate())
            ->setType($dto->getType())
            ->setDuration($dto->getDuration())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setRecorder($dto->getRecorder())
            ->setRecordedFileFileSize($dto->getRecordedFileFileSize())
            ->setRecordedFileMimeType($dto->getRecordedFileMimeType())
            ->setRecordedFileBaseName($dto->getRecordedFileBaseName())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return RecordingDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setCallid($this->getCallid())
            ->setCalldate($this->getCalldate())
            ->setType($this->getType())
            ->setDuration($this->getDuration())
            ->setCaller($this->getCaller())
            ->setCallee($this->getCallee())
            ->setRecorder($this->getRecorder())
            ->setRecordedFileFileSize($this->getRecordedFileFileSize())
            ->setRecordedFileMimeType($this->getRecordedFileMimeType())
            ->setRecordedFileBaseName($this->getRecordedFileBaseName())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
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
     * Set callid
     *
     * @param string $callid
     *
     * @return Recording
     */
    protected function setCallid($callid = null)
    {
        if (!is_null($callid)) {
            Assertion::maxLength($callid, 255);
        }

        $this->callid = $callid;

        return $this;
    }

    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * Set calldate
     *
     * @param \DateTime $calldate
     *
     * @return Recording
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
     * Set type
     *
     * @param string $type
     *
     * @return Recording
     */
    protected function setType($type)
    {
        Assertion::notNull($type);
        Assertion::choice($type, array (
          0 => 'ondemand',
          1 => 'ddi',
        ));

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
     * Set duration
     *
     * @param float $duration
     *
     * @return Recording
     */
    protected function setDuration($duration)
    {
        Assertion::notNull($duration);
        //Assertion::float($duration);

        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set caller
     *
     * @param string $caller
     *
     * @return Recording
     */
    protected function setCaller($caller = null)
    {
        if (!is_null($caller)) {
            Assertion::maxLength($caller, 128);
        }

        $this->caller = $caller;

        return $this;
    }

    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * Set callee
     *
     * @param string $callee
     *
     * @return Recording
     */
    protected function setCallee($callee = null)
    {
        if (!is_null($callee)) {
            Assertion::maxLength($callee, 128);
        }

        $this->callee = $callee;

        return $this;
    }

    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * Set recorder
     *
     * @param string $recorder
     *
     * @return Recording
     */
    protected function setRecorder($recorder = null)
    {
        if (!is_null($recorder)) {
            Assertion::maxLength($recorder, 128);
        }

        $this->recorder = $recorder;

        return $this;
    }

    /**
     * Get recorder
     *
     * @return string
     */
    public function getRecorder()
    {
        return $this->recorder;
    }

    /**
     * Set recordedFileFileSize
     *
     * @param integer $recordedFileFileSize
     *
     * @return Recording
     */
    protected function setRecordedFileFileSize($recordedFileFileSize = null)
    {
        if (!is_null($recordedFileFileSize)) {
            if (!is_null($recordedFileFileSize)) {
                Assertion::integerish($recordedFileFileSize);
                Assertion::greaterOrEqualThan($recordedFileFileSize, 0);
            }
        }

        $this->recordedFileFileSize = $recordedFileFileSize;

        return $this;
    }

    /**
     * Get recordedFileFileSize
     *
     * @return integer
     */
    public function getRecordedFileFileSize()
    {
        return $this->recordedFileFileSize;
    }

    /**
     * Set recordedFileMimeType
     *
     * @param string $recordedFileMimeType
     *
     * @return Recording
     */
    protected function setRecordedFileMimeType($recordedFileMimeType = null)
    {
        if (!is_null($recordedFileMimeType)) {
            Assertion::maxLength($recordedFileMimeType, 80);
        }

        $this->recordedFileMimeType = $recordedFileMimeType;

        return $this;
    }

    /**
     * Get recordedFileMimeType
     *
     * @return string
     */
    public function getRecordedFileMimeType()
    {
        return $this->recordedFileMimeType;
    }

    /**
     * Set recordedFileBaseName
     *
     * @param string $recordedFileBaseName
     *
     * @return Recording
     */
    protected function setRecordedFileBaseName($recordedFileBaseName = null)
    {
        if (!is_null($recordedFileBaseName)) {
            Assertion::maxLength($recordedFileBaseName, 255);
        }

        $this->recordedFileBaseName = $recordedFileBaseName;

        return $this;
    }

    /**
     * Get recordedFileBaseName
     *
     * @return string
     */
    public function getRecordedFileBaseName()
    {
        return $this->recordedFileBaseName;
    }

    /**
     * Set company
     *
     * @param \Core\Domain\Model\Company\CompanyInterface $company
     *
     * @return Recording
     */
    protected function setCompany(\Core\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

