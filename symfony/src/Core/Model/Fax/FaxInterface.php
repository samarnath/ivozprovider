<?php

namespace Core\Model\Fax;



interface FaxInterface
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
     * Get email
     *
     * @return string
     */
    public function getEmail();


    /**
     * Get sendByEmail
     *
     * @return boolean
     */
    public function getSendByEmail();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get outgoingDDI
     *
     * @return \Core\Model\DDI\DDI
     */
    public function getOutgoingDDI();



}

