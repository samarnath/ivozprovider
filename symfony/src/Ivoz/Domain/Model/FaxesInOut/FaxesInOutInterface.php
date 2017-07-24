<?php

namespace Ivoz\Domain\Model\FaxesInOut;

use Core\Domain\Model\EntityInterface;

interface FaxesInOutInterface extends EntityInterface
{
    /**
     * Get calldate
     *
     * @return \DateTime
     */
    public function getCalldate();


    /**
     * Get src
     *
     * @return string
     */
    public function getSrc();


    /**
     * Get dst
     *
     * @return string
     */
    public function getDst();


    /**
     * Get type
     *
     * @return string
     */
    public function getType();


    /**
     * Get pages
     *
     * @return string
     */
    public function getPages();


    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();


    /**
     * Get fax
     *
     * @return \Ivoz\Domain\Model\Fax\FaxInterface
     */
    public function getFax();


    /**
     * Get file
     *
     * @return File
     */
    public function getFile();

}

