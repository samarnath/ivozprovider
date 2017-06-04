<?php

namespace Core\Model\ExternalCallFilter;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ExternalCallFilterDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $holidayTargetType;

    /**
     * @var string
     */
    public $holidayNumberValue;

    /**
     * @var string
     */
    public $outOfScheduleTargetType;

    /**
     * @var string
     */
    public $outOfScheduleNumberValue;

    /**
     * @var string
     */
    public $blackListRegExp;

    /**
     * @var string
     */
    public $whiteListRegExp;

    /**
     * @var mixed
     */
    public $companyId;

    /**
     * @var mixed
     */
    public $welcomeLocutionId;

    /**
     * @var mixed
     */
    public $holidayLocutionId;

    /**
     * @var mixed
     */
    public $outOfScheduleLocutionId;

    /**
     * @var mixed
     */
    public $holidayExtensionId;

    /**
     * @var mixed
     */
    public $outOfScheduleExtensionId;

    /**
     * @var mixed
     */
    public $holidayVoiceMailUserId;

    /**
     * @var mixed
     */
    public $outOfScheduleVoiceMailUserId;

    /**
     * @var mixed
     */
    public $company;

    /**
     * @var mixed
     */
    public $welcomeLocution;

    /**
     * @var mixed
     */
    public $holidayLocution;

    /**
     * @var mixed
     */
    public $outOfScheduleLocution;

    /**
     * @var mixed
     */
    public $holidayExtension;

    /**
     * @var mixed
     */
    public $outOfScheduleExtension;

    /**
     * @var mixed
     */
    public $holidayVoiceMailUser;

    /**
     * @var mixed
     */
    public $outOfScheduleVoiceMailUser;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'holidayTargetType' => $this->getHolidayTargetType(),
            'holidayNumberValue' => $this->getHolidayNumberValue(),
            'outOfScheduleTargetType' => $this->getOutOfScheduleTargetType(),
            'outOfScheduleNumberValue' => $this->getOutOfScheduleNumberValue(),
            'blackListRegExp' => $this->getBlackListRegExp(),
            'whiteListRegExp' => $this->getWhiteListRegExp(),
            'companyId' => $this->getCompanyId(),
            'welcomeLocutionId' => $this->getWelcomeLocutionId(),
            'holidayLocutionId' => $this->getHolidayLocutionId(),
            'outOfScheduleLocutionId' => $this->getOutOfScheduleLocutionId(),
            'holidayExtensionId' => $this->getHolidayExtensionId(),
            'outOfScheduleExtensionId' => $this->getOutOfScheduleExtensionId(),
            'holidayVoiceMailUserId' => $this->getHolidayVoiceMailUserId(),
            'outOfScheduleVoiceMailUserId' => $this->getOutOfScheduleVoiceMailUserId()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setHolidayTargetType(isset($data['holidayTargetType']) ? $data['holidayTargetType'] : null)
            ->setHolidayNumberValue(isset($data['holidayNumberValue']) ? $data['holidayNumberValue'] : null)
            ->setOutOfScheduleTargetType(isset($data['outOfScheduleTargetType']) ? $data['outOfScheduleTargetType'] : null)
            ->setOutOfScheduleNumberValue(isset($data['outOfScheduleNumberValue']) ? $data['outOfScheduleNumberValue'] : null)
            ->setBlackListRegExp(isset($data['blackListRegExp']) ? $data['blackListRegExp'] : null)
            ->setWhiteListRegExp(isset($data['whiteListRegExp']) ? $data['whiteListRegExp'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setWelcomeLocutionId(isset($data['welcomeLocutionId']) ? $data['welcomeLocutionId'] : null)
            ->setHolidayLocutionId(isset($data['holidayLocutionId']) ? $data['holidayLocutionId'] : null)
            ->setOutOfScheduleLocutionId(isset($data['outOfScheduleLocutionId']) ? $data['outOfScheduleLocutionId'] : null)
            ->setHolidayExtensionId(isset($data['holidayExtensionId']) ? $data['holidayExtensionId'] : null)
            ->setOutOfScheduleExtensionId(isset($data['outOfScheduleExtensionId']) ? $data['outOfScheduleExtensionId'] : null)
            ->setHolidayVoiceMailUserId(isset($data['holidayVoiceMailUserId']) ? $data['holidayVoiceMailUserId'] : null)
            ->setOutOfScheduleVoiceMailUserId(isset($data['outOfScheduleVoiceMailUserId']) ? $data['outOfScheduleVoiceMailUserId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Model\\Company\\Company', $this->getCompanyId());
        $this->welcomeLocution = $transformer->transform('Core\\Model\\Locution\\Locution', $this->getWelcomeLocutionId());
        $this->holidayLocution = $transformer->transform('Core\\Model\\Locution\\Locution', $this->getHolidayLocutionId());
        $this->outOfScheduleLocution = $transformer->transform('Core\\Model\\Locution\\Locution', $this->getOutOfScheduleLocutionId());
        $this->holidayExtension = $transformer->transform('Core\\Model\\Extension\\Extension', $this->getHolidayExtensionId());
        $this->outOfScheduleExtension = $transformer->transform('Core\\Model\\Extension\\Extension', $this->getOutOfScheduleExtensionId());
        $this->holidayVoiceMailUser = $transformer->transform('Core\\Model\\User\\User', $this->getHolidayVoiceMailUserId());
        $this->outOfScheduleVoiceMailUser = $transformer->transform('Core\\Model\\User\\User', $this->getOutOfScheduleVoiceMailUserId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ExternalCallFilterDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return ExternalCallFilterDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $holidayTargetType
     *
     * @return ExternalCallFilterDTO
     */
    public function setHolidayTargetType($holidayTargetType = null)
    {
        $this->holidayTargetType = $holidayTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getHolidayTargetType()
    {
        return $this->holidayTargetType;
    }

    /**
     * @param string $holidayNumberValue
     *
     * @return ExternalCallFilterDTO
     */
    public function setHolidayNumberValue($holidayNumberValue = null)
    {
        $this->holidayNumberValue = $holidayNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getHolidayNumberValue()
    {
        return $this->holidayNumberValue;
    }

    /**
     * @param string $outOfScheduleTargetType
     *
     * @return ExternalCallFilterDTO
     */
    public function setOutOfScheduleTargetType($outOfScheduleTargetType = null)
    {
        $this->outOfScheduleTargetType = $outOfScheduleTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutOfScheduleTargetType()
    {
        return $this->outOfScheduleTargetType;
    }

    /**
     * @param string $outOfScheduleNumberValue
     *
     * @return ExternalCallFilterDTO
     */
    public function setOutOfScheduleNumberValue($outOfScheduleNumberValue = null)
    {
        $this->outOfScheduleNumberValue = $outOfScheduleNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutOfScheduleNumberValue()
    {
        return $this->outOfScheduleNumberValue;
    }

    /**
     * @param string $blackListRegExp
     *
     * @return ExternalCallFilterDTO
     */
    public function setBlackListRegExp($blackListRegExp = null)
    {
        $this->blackListRegExp = $blackListRegExp;

        return $this;
    }

    /**
     * @return string
     */
    public function getBlackListRegExp()
    {
        return $this->blackListRegExp;
    }

    /**
     * @param string $whiteListRegExp
     *
     * @return ExternalCallFilterDTO
     */
    public function setWhiteListRegExp($whiteListRegExp = null)
    {
        $this->whiteListRegExp = $whiteListRegExp;

        return $this;
    }

    /**
     * @return string
     */
    public function getWhiteListRegExp()
    {
        return $this->whiteListRegExp;
    }

    /**
     * @param integer $companyId
     *
     * @return ExternalCallFilterDTO
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $welcomeLocutionId
     *
     * @return ExternalCallFilterDTO
     */
    public function setWelcomeLocutionId($welcomeLocutionId)
    {
        $this->welcomeLocutionId = $welcomeLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWelcomeLocutionId()
    {
        return $this->welcomeLocutionId;
    }

    /**
     * @return \Core\Model\Locution\Locution
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * @param integer $holidayLocutionId
     *
     * @return ExternalCallFilterDTO
     */
    public function setHolidayLocutionId($holidayLocutionId)
    {
        $this->holidayLocutionId = $holidayLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayLocutionId()
    {
        return $this->holidayLocutionId;
    }

    /**
     * @return \Core\Model\Locution\Locution
     */
    public function getHolidayLocution()
    {
        return $this->holidayLocution;
    }

    /**
     * @param integer $outOfScheduleLocutionId
     *
     * @return ExternalCallFilterDTO
     */
    public function setOutOfScheduleLocutionId($outOfScheduleLocutionId)
    {
        $this->outOfScheduleLocutionId = $outOfScheduleLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleLocutionId()
    {
        return $this->outOfScheduleLocutionId;
    }

    /**
     * @return \Core\Model\Locution\Locution
     */
    public function getOutOfScheduleLocution()
    {
        return $this->outOfScheduleLocution;
    }

    /**
     * @param integer $holidayExtensionId
     *
     * @return ExternalCallFilterDTO
     */
    public function setHolidayExtensionId($holidayExtensionId)
    {
        $this->holidayExtensionId = $holidayExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayExtensionId()
    {
        return $this->holidayExtensionId;
    }

    /**
     * @return \Core\Model\Extension\Extension
     */
    public function getHolidayExtension()
    {
        return $this->holidayExtension;
    }

    /**
     * @param integer $outOfScheduleExtensionId
     *
     * @return ExternalCallFilterDTO
     */
    public function setOutOfScheduleExtensionId($outOfScheduleExtensionId)
    {
        $this->outOfScheduleExtensionId = $outOfScheduleExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleExtensionId()
    {
        return $this->outOfScheduleExtensionId;
    }

    /**
     * @return \Core\Model\Extension\Extension
     */
    public function getOutOfScheduleExtension()
    {
        return $this->outOfScheduleExtension;
    }

    /**
     * @param integer $holidayVoiceMailUserId
     *
     * @return ExternalCallFilterDTO
     */
    public function setHolidayVoiceMailUserId($holidayVoiceMailUserId)
    {
        $this->holidayVoiceMailUserId = $holidayVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayVoiceMailUserId()
    {
        return $this->holidayVoiceMailUserId;
    }

    /**
     * @return \Core\Model\User\User
     */
    public function getHolidayVoiceMailUser()
    {
        return $this->holidayVoiceMailUser;
    }

    /**
     * @param integer $outOfScheduleVoiceMailUserId
     *
     * @return ExternalCallFilterDTO
     */
    public function setOutOfScheduleVoiceMailUserId($outOfScheduleVoiceMailUserId)
    {
        $this->outOfScheduleVoiceMailUserId = $outOfScheduleVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleVoiceMailUserId()
    {
        return $this->outOfScheduleVoiceMailUserId;
    }

    /**
     * @return \Core\Model\User\User
     */
    public function getOutOfScheduleVoiceMailUser()
    {
        return $this->outOfScheduleVoiceMailUser;
    }
}

