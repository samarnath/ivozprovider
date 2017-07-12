<?php

namespace Ivoz\Domain\Model\ChangeHistory;



interface ChangeHistoryInterface
{
    /**
     * Get user
     *
     * @return string
     */
    public function getUser();


    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate();


    /**
     * Get action
     *
     * @return string
     */
    public function getAction();


    /**
     * Get table
     *
     * @return string
     */
    public function getTable();


    /**
     * Get objid
     *
     * @return integer
     */
    public function getObjid();


    /**
     * Get field
     *
     * @return string
     */
    public function getField();


    /**
     * Get oldValue
     *
     * @return string
     */
    public function getOldValue();


    /**
     * Get newValue
     *
     * @return string
     */
    public function getNewValue();



}

