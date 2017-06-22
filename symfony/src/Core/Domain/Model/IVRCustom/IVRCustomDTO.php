<?php

namespace Core\Domain\Model\IVRCustom;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class IVRCustomDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $timeout;

    /**
     * @var integer
     */
    private $maxDigits;

    /**
     * @var integer
     */
    private $noAnswerTimeout = '10';

    /**
     * @var string
     */
    private $timeoutTargetType;

    /**
     * @var string
     */
    private $timeoutNumberValue;

    /**
     * @var string
     */
    private $errorTargetType;

    /**
     * @var string
     */
    private $errorNumberValue;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $welcomeLocutionId;

    /**
     * @var mixed
     */
    private $noAnswerLocutionId;

    /**
     * @var mixed
     */
    private $errorLocutionId;

    /**
     * @var mixed
     */
    private $successLocutionId;

    /**
     * @var mixed
     */
    private $timeoutExtensionId;

    /**
     * @var mixed
     */
    private $errorExtensionId;

    /**
     * @var mixed
     */
    private $timeoutVoiceMailUserId;

    /**
     * @var mixed
     */
    private $errorVoiceMailUserId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $welcomeLocution;

    /**
     * @var mixed
     */
    private $noAnswerLocution;

    /**
     * @var mixed
     */
    private $errorLocution;

    /**
     * @var mixed
     */
    private $successLocution;

    /**
     * @var mixed
     */
    private $timeoutExtension;

    /**
     * @var mixed
     */
    private $errorExtension;

    /**
     * @var mixed
     */
    private $timeoutVoiceMailUser;

    /**
     * @var mixed
     */
    private $errorVoiceMailUser;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'timeout' => $this->getTimeout(),
            'maxDigits' => $this->getMaxDigits(),
            'noAnswerTimeout' => $this->getNoAnswerTimeout(),
            'timeoutTargetType' => $this->getTimeoutTargetType(),
            'timeoutNumberValue' => $this->getTimeoutNumberValue(),
            'errorTargetType' => $this->getErrorTargetType(),
            'errorNumberValue' => $this->getErrorNumberValue(),
            'companyId' => $this->getCompanyId(),
            'welcomeLocutionId' => $this->getWelcomeLocutionId(),
            'noAnswerLocutionId' => $this->getNoAnswerLocutionId(),
            'errorLocutionId' => $this->getErrorLocutionId(),
            'successLocutionId' => $this->getSuccessLocutionId(),
            'timeoutExtensionId' => $this->getTimeoutExtensionId(),
            'errorExtensionId' => $this->getErrorExtensionId(),
            'timeoutVoiceMailUserId' => $this->getTimeoutVoiceMailUserId(),
            'errorVoiceMailUserId' => $this->getErrorVoiceMailUserId()
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
            ->setTimeout(isset($data['timeout']) ? $data['timeout'] : null)
            ->setMaxDigits(isset($data['maxDigits']) ? $data['maxDigits'] : null)
            ->setNoAnswerTimeout(isset($data['noAnswerTimeout']) ? $data['noAnswerTimeout'] : null)
            ->setTimeoutTargetType(isset($data['timeoutTargetType']) ? $data['timeoutTargetType'] : null)
            ->setTimeoutNumberValue(isset($data['timeoutNumberValue']) ? $data['timeoutNumberValue'] : null)
            ->setErrorTargetType(isset($data['errorTargetType']) ? $data['errorTargetType'] : null)
            ->setErrorNumberValue(isset($data['errorNumberValue']) ? $data['errorNumberValue'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setWelcomeLocutionId(isset($data['welcomeLocutionId']) ? $data['welcomeLocutionId'] : null)
            ->setNoAnswerLocutionId(isset($data['noAnswerLocutionId']) ? $data['noAnswerLocutionId'] : null)
            ->setErrorLocutionId(isset($data['errorLocutionId']) ? $data['errorLocutionId'] : null)
            ->setSuccessLocutionId(isset($data['successLocutionId']) ? $data['successLocutionId'] : null)
            ->setTimeoutExtensionId(isset($data['timeoutExtensionId']) ? $data['timeoutExtensionId'] : null)
            ->setErrorExtensionId(isset($data['errorExtensionId']) ? $data['errorExtensionId'] : null)
            ->setTimeoutVoiceMailUserId(isset($data['timeoutVoiceMailUserId']) ? $data['timeoutVoiceMailUserId'] : null)
            ->setErrorVoiceMailUserId(isset($data['errorVoiceMailUserId']) ? $data['errorVoiceMailUserId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\CompanyInterface', $this->getCompanyId());
        $this->welcomeLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\LocutionInterface', $this->getWelcomeLocutionId());
        $this->noAnswerLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\LocutionInterface', $this->getNoAnswerLocutionId());
        $this->errorLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\LocutionInterface', $this->getErrorLocutionId());
        $this->successLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\LocutionInterface', $this->getSuccessLocutionId());
        $this->timeoutExtension = $transformer->transform('Core\\Domain\\Model\\Extension\\ExtensionInterface', $this->getTimeoutExtensionId());
        $this->errorExtension = $transformer->transform('Core\\Domain\\Model\\Extension\\ExtensionInterface', $this->getErrorExtensionId());
        $this->timeoutVoiceMailUser = $transformer->transform('Core\\Domain\\Model\\User\\UserInterface', $this->getTimeoutVoiceMailUserId());
        $this->errorVoiceMailUser = $transformer->transform('Core\\Domain\\Model\\User\\UserInterface', $this->getErrorVoiceMailUserId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return IVRCustomDTO
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
     * @return IVRCustomDTO
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
     * @param integer $timeout
     *
     * @return IVRCustomDTO
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param integer $maxDigits
     *
     * @return IVRCustomDTO
     */
    public function setMaxDigits($maxDigits)
    {
        $this->maxDigits = $maxDigits;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxDigits()
    {
        return $this->maxDigits;
    }

    /**
     * @param integer $noAnswerTimeout
     *
     * @return IVRCustomDTO
     */
    public function setNoAnswerTimeout($noAnswerTimeout = null)
    {
        $this->noAnswerTimeout = $noAnswerTimeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNoAnswerTimeout()
    {
        return $this->noAnswerTimeout;
    }

    /**
     * @param string $timeoutTargetType
     *
     * @return IVRCustomDTO
     */
    public function setTimeoutTargetType($timeoutTargetType = null)
    {
        $this->timeoutTargetType = $timeoutTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeoutTargetType()
    {
        return $this->timeoutTargetType;
    }

    /**
     * @param string $timeoutNumberValue
     *
     * @return IVRCustomDTO
     */
    public function setTimeoutNumberValue($timeoutNumberValue = null)
    {
        $this->timeoutNumberValue = $timeoutNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeoutNumberValue()
    {
        return $this->timeoutNumberValue;
    }

    /**
     * @param string $errorTargetType
     *
     * @return IVRCustomDTO
     */
    public function setErrorTargetType($errorTargetType = null)
    {
        $this->errorTargetType = $errorTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorTargetType()
    {
        return $this->errorTargetType;
    }

    /**
     * @param string $errorNumberValue
     *
     * @return IVRCustomDTO
     */
    public function setErrorNumberValue($errorNumberValue = null)
    {
        $this->errorNumberValue = $errorNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorNumberValue()
    {
        return $this->errorNumberValue;
    }

    /**
     * @param integer $companyId
     *
     * @return IVRCustomDTO
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
     * @return \Core\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $welcomeLocutionId
     *
     * @return IVRCustomDTO
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
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * @param integer $noAnswerLocutionId
     *
     * @return IVRCustomDTO
     */
    public function setNoAnswerLocutionId($noAnswerLocutionId)
    {
        $this->noAnswerLocutionId = $noAnswerLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNoAnswerLocutionId()
    {
        return $this->noAnswerLocutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getNoAnswerLocution()
    {
        return $this->noAnswerLocution;
    }

    /**
     * @param integer $errorLocutionId
     *
     * @return IVRCustomDTO
     */
    public function setErrorLocutionId($errorLocutionId)
    {
        $this->errorLocutionId = $errorLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getErrorLocutionId()
    {
        return $this->errorLocutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getErrorLocution()
    {
        return $this->errorLocution;
    }

    /**
     * @param integer $successLocutionId
     *
     * @return IVRCustomDTO
     */
    public function setSuccessLocutionId($successLocutionId)
    {
        $this->successLocutionId = $successLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSuccessLocutionId()
    {
        return $this->successLocutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getSuccessLocution()
    {
        return $this->successLocution;
    }

    /**
     * @param integer $timeoutExtensionId
     *
     * @return IVRCustomDTO
     */
    public function setTimeoutExtensionId($timeoutExtensionId)
    {
        $this->timeoutExtensionId = $timeoutExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutExtensionId()
    {
        return $this->timeoutExtensionId;
    }

    /**
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * @param integer $errorExtensionId
     *
     * @return IVRCustomDTO
     */
    public function setErrorExtensionId($errorExtensionId)
    {
        $this->errorExtensionId = $errorExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getErrorExtensionId()
    {
        return $this->errorExtensionId;
    }

    /**
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getErrorExtension()
    {
        return $this->errorExtension;
    }

    /**
     * @param integer $timeoutVoiceMailUserId
     *
     * @return IVRCustomDTO
     */
    public function setTimeoutVoiceMailUserId($timeoutVoiceMailUserId)
    {
        $this->timeoutVoiceMailUserId = $timeoutVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutVoiceMailUserId()
    {
        return $this->timeoutVoiceMailUserId;
    }

    /**
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * @param integer $errorVoiceMailUserId
     *
     * @return IVRCustomDTO
     */
    public function setErrorVoiceMailUserId($errorVoiceMailUserId)
    {
        $this->errorVoiceMailUserId = $errorVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getErrorVoiceMailUserId()
    {
        return $this->errorVoiceMailUserId;
    }

    /**
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getErrorVoiceMailUser()
    {
        return $this->errorVoiceMailUser;
    }
}

