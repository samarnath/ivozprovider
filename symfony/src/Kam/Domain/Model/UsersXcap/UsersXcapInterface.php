<?php

namespace Kam\Domain\Model\UsersXcap;



interface UsersXcapInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get username
     *
     * @return string
     */
    public function getUsername();


    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain();


    /**
     * Get doc
     *
     * @return string
     */
    public function getDoc();


    /**
     * Get docType
     *
     * @return integer
     */
    public function getDocType();


    /**
     * Get etag
     *
     * @return string
     */
    public function getEtag();


    /**
     * Get source
     *
     * @return integer
     */
    public function getSource();


    /**
     * Get docUri
     *
     * @return string
     */
    public function getDocUri();


    /**
     * Get port
     *
     * @return integer
     */
    public function getPort();



}

