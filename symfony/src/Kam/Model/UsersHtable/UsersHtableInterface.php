<?php

namespace Kam\Model\UsersHtable;



interface UsersHtableInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get keyName
     *
     * @return string
     */
    public function getKeyName();


    /**
     * Get keyType
     *
     * @return integer
     */
    public function getKeyType();


    /**
     * Get valueType
     *
     * @return integer
     */
    public function getValueType();


    /**
     * Get keyValue
     *
     * @return string
     */
    public function getKeyValue();


    /**
     * Get expires
     *
     * @return integer
     */
    public function getExpires();



}

