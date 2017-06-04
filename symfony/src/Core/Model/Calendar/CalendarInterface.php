<?php

namespace Core\Model\Calendar;



interface CalendarInterface
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

