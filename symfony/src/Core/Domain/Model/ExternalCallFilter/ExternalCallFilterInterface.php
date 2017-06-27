<?php

namespace Core\Domain\Model\ExternalCallFilter;



interface ExternalCallFilterInterface
{
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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();


    /**
     * Get welcomeLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution();


    /**
     * Get holidayLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getHolidayLocution();


    /**
     * Get outOfScheduleLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getOutOfScheduleLocution();


    /**
     * Get holidayExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getHolidayExtension();


    /**
     * Get outOfScheduleExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getOutOfScheduleExtension();


    /**
     * Get holidayVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getHolidayVoiceMailUser();


    /**
     * Get outOfScheduleVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getOutOfScheduleVoiceMailUser();



}

