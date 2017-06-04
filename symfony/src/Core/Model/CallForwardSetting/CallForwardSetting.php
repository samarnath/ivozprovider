<?php

namespace Core\Model\CallForwardSetting;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * CallForwardSetting
 */
class CallForwardSetting implements EntityInterface, CallForwardSettingInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @comment enum:internal|external|both
     * @var string
     */
    protected $callTypeFilter;

    /**
     * @comment enum:inconditional|noAnswer|busy|userNotRegistered
     * @var string
     */
    protected $callForwardType;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $targetType;

    /**
     * @var string
     */
    protected $numberValue;

    /**
     * @var integer
     */
    protected $noAnswerTimeout = '10';

    /**
     * @var \Core\Model\User\User
     */
    protected $user;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $extension;

    /**
     * @var \Core\Model\User\User
     */
    protected $voiceMailUser;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $callTypeFilter,
        $callForwardType,
        $targetType,
        $noAnswerTimeout
    ) {
        $this->setCallTypeFilter($callTypeFilter);
        $this->setCallForwardType($callForwardType);
        $this->setTargetType($targetType);
        $this->setNoAnswerTimeout($noAnswerTimeout);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return CallForwardSettingDTO
     */
    public static function createDTO()
    {
        return new CallForwardSettingDTO();
    }

    /**
     * Factory method
     * @param CallForwardSettingDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CallForwardSettingDTO::class);

        $self = new self(
            $dto->getCallTypeFilter(),
            $dto->getCallForwardType(),
            $dto->getTargetType(),
            $dto->getNoAnswerTimeout()
        );

        return $self
            ->setNumberValue($dto->getNumberValue())
            ->setUser($dto->getUser())
            ->setExtension($dto->getExtension())
            ->setVoiceMailUser($dto->getVoiceMailUser());
    }

    /**
     * @param CallForwardSettingDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, CallForwardSettingDTO::class);

        $this
            ->setCallTypeFilter($dto->getCallTypeFilter())
            ->setCallForwardType($dto->getCallForwardType())
            ->setTargetType($dto->getTargetType())
            ->setNumberValue($dto->getNumberValue())
            ->setNoAnswerTimeout($dto->getNoAnswerTimeout())
            ->setUser($dto->getUser())
            ->setExtension($dto->getExtension())
            ->setVoiceMailUser($dto->getVoiceMailUser());


        return $this;
    }

    /**
     * @return CallForwardSettingDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setCallTypeFilter($this->getCallTypeFilter())
            ->setCallForwardType($this->getCallForwardType())
            ->setTargetType($this->getTargetType())
            ->setNumberValue($this->getNumberValue())
            ->setNoAnswerTimeout($this->getNoAnswerTimeout())
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null)
            ->setExtensionId($this->getExtension() ? $this->getExtension()->getId() : null)
            ->setVoiceMailUserId($this->getVoiceMailUser() ? $this->getVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'callTypeFilter' => $this->getCallTypeFilter(),
            'callForwardType' => $this->getCallForwardType(),
            'targetType' => $this->getTargetType(),
            'numberValue' => $this->getNumberValue(),
            'noAnswerTimeout' => $this->getNoAnswerTimeout(),
            'userId' => $this->getUser() ? $this->getUser()->getId() : null,
            'extensionId' => $this->getExtension() ? $this->getExtension()->getId() : null,
            'voiceMailUserId' => $this->getVoiceMailUser() ? $this->getVoiceMailUser()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set callTypeFilter
     *
     * @param string $callTypeFilter
     *
     * @return CallForwardSetting
     */
    protected function setCallTypeFilter($callTypeFilter)
    {
        Assertion::notNull($callTypeFilter);
        Assertion::maxLength($callTypeFilter, 25);
        Assertion::choice($callTypeFilter, array (
          0 => 'internal',
          1 => 'external',
          2 => 'both',
        ));

        $this->callTypeFilter = $callTypeFilter;

        return $this;
    }

    /**
     * Get callTypeFilter
     *
     * @return string
     */
    public function getCallTypeFilter()
    {
        return $this->callTypeFilter;
    }

    /**
     * Set callForwardType
     *
     * @param string $callForwardType
     *
     * @return CallForwardSetting
     */
    protected function setCallForwardType($callForwardType)
    {
        Assertion::notNull($callForwardType);
        Assertion::maxLength($callForwardType, 25);
        Assertion::choice($callForwardType, array (
          0 => 'inconditional',
          1 => 'noAnswer',
          2 => 'busy',
          3 => 'userNotRegistered',
        ));

        $this->callForwardType = $callForwardType;

        return $this;
    }

    /**
     * Get callForwardType
     *
     * @return string
     */
    public function getCallForwardType()
    {
        return $this->callForwardType;
    }

    /**
     * Set targetType
     *
     * @param string $targetType
     *
     * @return CallForwardSetting
     */
    protected function setTargetType($targetType)
    {
        Assertion::notNull($targetType);
        Assertion::maxLength($targetType, 25);
        Assertion::choice($targetType, array (
          0 => 'number',
          1 => 'extension',
          2 => 'voicemail',
        ));

        $this->targetType = $targetType;

        return $this;
    }

    /**
     * Get targetType
     *
     * @return string
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * Set numberValue
     *
     * @param string $numberValue
     *
     * @return CallForwardSetting
     */
    protected function setNumberValue($numberValue = null)
    {
        if (!is_null($numberValue)) {
            Assertion::maxLength($numberValue, 25);
        }

        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * Set noAnswerTimeout
     *
     * @param integer $noAnswerTimeout
     *
     * @return CallForwardSetting
     */
    protected function setNoAnswerTimeout($noAnswerTimeout)
    {
        Assertion::notNull($noAnswerTimeout);
        Assertion::integerish($noAnswerTimeout);

        $this->noAnswerTimeout = $noAnswerTimeout;

        return $this;
    }

    /**
     * Get noAnswerTimeout
     *
     * @return integer
     */
    public function getNoAnswerTimeout()
    {
        return $this->noAnswerTimeout;
    }

    /**
     * Set user
     *
     * @param \Core\Model\User\User $user
     *
     * @return CallForwardSetting
     */
    protected function setUser(\Core\Model\User\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Core\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set extension
     *
     * @param \Core\Model\Extension\Extension $extension
     *
     * @return CallForwardSetting
     */
    protected function setExtension(\Core\Model\Extension\Extension $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set voiceMailUser
     *
     * @param \Core\Model\User\User $voiceMailUser
     *
     * @return CallForwardSetting
     */
    protected function setVoiceMailUser(\Core\Model\User\User $voiceMailUser = null)
    {
        $this->voiceMailUser = $voiceMailUser;

        return $this;
    }

    /**
     * Get voiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getVoiceMailUser()
    {
        return $this->voiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

