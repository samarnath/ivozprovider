<?php

namespace Core\Model\Service;



interface ServiceInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn();


    /**
     * Get nameEs
     *
     * @return string
     */
    public function getNameEs();


    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();


    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn();


    /**
     * Get descriptionEs
     *
     * @return string
     */
    public function getDescriptionEs();


    /**
     * Get defaultCode
     *
     * @return string
     */
    public function getDefaultCode();


    /**
     * Get extraArgs
     *
     * @return boolean
     */
    public function getExtraArgs();



}

