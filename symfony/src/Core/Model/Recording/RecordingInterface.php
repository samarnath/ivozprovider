<?php

namespace Core\Model\Recording;



interface RecordingInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get callid
     *
     * @return string
     */
    public function getCallid();


    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate();


    /**
     * Get type
     *
     * @return string
     */
    public function getType();


    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration();


    /**
     * Get caller
     *
     * @return string
     */
    public function getCaller();


    /**
     * Get callee
     *
     * @return string
     */
    public function getCallee();


    /**
     * Get recorder
     *
     * @return string
     */
    public function getRecorder();


    /**
     * Get recordedFileFileSize
     *
     * @return integer
     */
    public function getRecordedFileFileSize();


    /**
     * Get recordedFileMimeType
     *
     * @return string
     */
    public function getRecordedFileMimeType();


    /**
     * Get recordedFileBaseName
     *
     * @return string
     */
    public function getRecordedFileBaseName();


    /**
     * Get company
     *
     * @return \Core\Model\Company\CompanyInterface
     */
    public function getCompany();



}

