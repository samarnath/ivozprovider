<?php

namespace Core\Model\ExternalCallFilter;



interface ExternalCallFilterInterface
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
     * Get holidayTargetType
     *
     * @return string
     */
    public function getHolidayTargetType();


    /**
     * Get holidayNumberValue
     *
     * @return string
     */
    public function getHolidayNumberValue();


    /**
     * Get outOfScheduleTargetType
     *
     * @return string
     */
    public function getOutOfScheduleTargetType();


    /**
     * Get outOfScheduleNumberValue
     *
     * @return string
     */
    public function getOutOfScheduleNumberValue();


    /**
     * Get blackListRegExp
     *
     * @return string
     */
    public function getBlackListRegExp();


    /**
     * Get whiteListRegExp
     *
     * @return string
     */
    public function getWhiteListRegExp();


    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getWelcomeLocution();


    /**
     * Get holidayLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getHolidayLocution();


    /**
     * Get outOfScheduleLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getOutOfScheduleLocution();


    /**
     * Get holidayExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getHolidayExtension();


    /**
     * Get outOfScheduleExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getOutOfScheduleExtension();


    /**
     * Get holidayVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getHolidayVoiceMailUser();


    /**
     * Get outOfScheduleVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getOutOfScheduleVoiceMailUser();



}

