<?php

namespace Core\Domain\Model\Recording;

use Assert\Assertion;

/**
 * RecordedFile
 */
class RecordedFile
{
    /**
     * @column recordedFileFileSize
     * @comment FSO:keepExtension
     * @var integer
     */
    protected $fileSize;

    /**
     * @column recordedFileMimeType
     * @var string
     */
    protected $mimeType;

    /**
     * @column recordedFileBaseName
     * @var string
     */
    protected $baseName;


    /**
     * Constructor
     */
    public function __construct($fileSize, $mimeType, $baseName)
    {
        $this->setFileSize($fileSize);
        $this->setMimeType($mimeType);
        $this->setBaseName($baseName);
    }

    // @codeCoverageIgnoreStart

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     *
     * @return self
     */
    protected function setFileSize($fileSize = null)
    {
        if (!is_null($fileSize)) {
            if (!is_null($fileSize)) {
                Assertion::integerish($fileSize);
                Assertion::greaterOrEqualThan($fileSize, 0);
            }
        }

        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     *
     * @return self
     */
    protected function setMimeType($mimeType = null)
    {
        if (!is_null($mimeType)) {
            Assertion::maxLength($mimeType, 80);
        }

        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set baseName
     *
     * @param string $baseName
     *
     * @return self
     */
    protected function setBaseName($baseName = null)
    {
        if (!is_null($baseName)) {
            Assertion::maxLength($baseName, 255);
        }

        $this->baseName = $baseName;

        return $this;
    }

    /**
     * Get baseName
     *
     * @return string
     */
    public function getBaseName()
    {
        return $this->baseName;
    }



    // @codeCoverageIgnoreEnd
}

