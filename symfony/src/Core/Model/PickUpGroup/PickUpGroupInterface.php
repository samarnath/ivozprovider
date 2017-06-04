<?php

namespace Core\Model\PickUpGroup;



interface PickUpGroupInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();


    /**
     * Get name
     *
     * @return string
     */
    public function getName();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();



}

