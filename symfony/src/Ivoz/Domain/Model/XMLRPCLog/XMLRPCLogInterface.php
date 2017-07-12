<?php

namespace Ivoz\Domain\Model\XMLRPCLog;



interface XMLRPCLogInterface
{
    /**
     * Get proxy
     *
     * @return string
     */
    public function getProxy();


    /**
     * Get module
     *
     * @return string
     */
    public function getModule();


    /**
     * Get method
     *
     * @return string
     */
    public function getMethod();


    /**
     * Get mapperName
     *
     * @return string
     */
    public function getMapperName();


    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate();


    /**
     * Get execDate
     *
     * @return \DateTime
     */
    public function getExecDate();


    /**
     * Get finishDate
     *
     * @return \DateTime
     */
    public function getFinishDate();



}

