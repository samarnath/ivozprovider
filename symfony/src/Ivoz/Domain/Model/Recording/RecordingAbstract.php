<?php

namespace Ivoz\Domain\Model\Recording;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * RecordingAbstract
 */
abstract class RecordingAbstract
{
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
     * @var RecordedFile
     */
    protected $recordedFile;

    /**
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
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
    public function __construct(
        $calldate,
        $type,
        $duration,
        RecordedFile $recordedFile
    ) {
        $this->setCalldate($calldate);
        $this->setType($type);
        $this->setDuration($duration);
        $this->setRecordedFile($recordedFile);
    }

    abstract public function __wakeup();

    /**
     * @return RecordingDTO
     */
    public static function createDTO()
    {
        return new RecordingDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RecordingDTO
         */
        Assertion::isInstanceOf($dto, RecordingDTO::class);

        $recordedFile = new RecordedFile(
            $dto->getRecordedFileFileSize(),
            $dto->getRecordedFileMimeType(),
            $dto->getRecordedFileBaseName()
        );

        $self = new static(
            $dto->getCalldate(),
            $dto->getType(),
            $dto->getDuration(),
            $recordedFile
        );

        return $self
            ->setCallid($dto->getCallid())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setRecorder($dto->getRecorder())
            ->setCompany($dto->getCompany())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RecordingDTO
         */
        Assertion::isInstanceOf($dto, RecordingDTO::class);

        $recordedFile = new RecordedFile(
            $dto->getRecordedFileFileSize(),
            $dto->getRecordedFileMimeType(),
            $dto->getRecordedFileBaseName()
        );

        $this
            ->setCallid($dto->getCallid())
            ->setCalldate($dto->getCalldate())
            ->setType($dto->getType())
            ->setDuration($dto->getDuration())
            ->setCaller($dto->getCaller())
            ->setCallee($dto->getCallee())
            ->setRecorder($dto->getRecorder())
            ->setRecordedFile($recordedFile)
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return RecordingDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setCallid($this->getCallid())
            ->setCalldate($this->getCalldate())
            ->setType($this->getType())
            ->setDuration($this->getDuration())
            ->setCaller($this->getCaller())
            ->setCallee($this->getCallee())
            ->setRecorder($this->getRecorder())
            ->setRecordedFileFileSize($this->getRecordedFile()->getFileSize())
            ->setRecordedFileMimeType($this->getRecordedFile()->getMimeType())
            ->setRecordedFileBaseName($this->getRecordedFile()->getBaseName())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'callid' => $this->getCallid(),
            'calldate' => $this->getCalldate(),
            'type' => $this->getType(),
            'duration' => $this->getDuration(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'recorder' => $this->getRecorder(),
            'fileSize' => $this->getRecordedFile()->getFileSize(),
            'mimeType' => $this->getRecordedFile()->getMimeType(),
            'baseName' => $this->getRecordedFile()->getBaseName(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set callid
     *
     * @param string $callid
     *
     * @return self
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
     * Set type
     *
     * @param string $type
     *
     * @return self
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
     * @return self
     */
    protected function setDuration($duration)
    {
        Assertion::notNull($duration);
        Assertion::numeric($duration);

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
     * @return self
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
     * @return self
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
     * @return self
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
     * Set company
     *
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set recordedFile
     *
     * @param RecordedFile $recordedFile
     *
     * @return self
     */
    protected function setRecordedFile(RecordedFile $recordedFile)
    {
        $this->recordedFile = $recordedFile;

        return $this;
    }

    /**
     * Get recordedFile
     *
     * @return RecordedFile
     */
    public function getRecordedFile()
    {
        return $this->recordedFile;
    }

    // @codeCoverageIgnoreEnd
}

