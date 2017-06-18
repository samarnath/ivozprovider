<?php

namespace Core\Domain\Model\FaxesInOut;



interface FaxesInOutInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


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
     * Get fileFileSize
     *
     * @return integer
     */
    public function getFileFileSize();


    /**
     * Get fileMimeType
     *
     * @return string
     */
    public function getFileMimeType();


    /**
     * Get fileBaseName
     *
     * @return string
     */
    public function getFileBaseName();


    /**
     * Get fax
     *
     * @return \Core\Domain\Model\Fax\FaxInterface
     */
    public function getFax();



}

