<?php

namespace Core\Model\Language;



interface LanguageInterface
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



}

