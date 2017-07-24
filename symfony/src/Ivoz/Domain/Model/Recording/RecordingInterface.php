<?php

namespace Ivoz\Domain\Model\Recording;

use Core\Domain\Model\EntityInterface;

interface RecordingInterface extends EntityInterface
{
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
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get recordedFile
     *
     * @return RecordedFile
     */
    public function getRecordedFile();

}

