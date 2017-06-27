<?php

namespace Core\Domain\Model\FaxesInOut;



interface FaxesInOutInterface
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
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax();


    /**
     * Get file
     *
     * @return File
     */
    public function getFile();

}

