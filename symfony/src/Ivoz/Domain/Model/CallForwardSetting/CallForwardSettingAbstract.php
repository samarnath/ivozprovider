<?php

namespace Ivoz\Domain\Model\CallForwardSetting;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * CallForwardSettingAbstract
 */
abstract class CallForwardSettingAbstract
{
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
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $user;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $extension;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
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

    abstract public function __wakeup();

    /**
     * @return CallForwardSettingDTO
     */
    public static function createDTO()
    {
        return new CallForwardSettingDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallForwardSettingDTO
         */
        Assertion::isInstanceOf($dto, CallForwardSettingDTO::class);

        $self = new static(
            $dto->getCallTypeFilter(),
            $dto->getCallForwardType(),
            $dto->getTargetType(),
            $dto->getNoAnswerTimeout());

        return $self
            ->setNumberValue($dto->getNumberValue())
            ->setUser($dto->getUser())
            ->setExtension($dto->getExtension())
            ->setVoiceMailUser($dto->getVoiceMailUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallForwardSettingDTO
         */
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
     * Set callTypeFilter
     *
     * @param string $callTypeFilter
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    protected function setUser(\Ivoz\Domain\Model\User\UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set extension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    protected function setExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set voiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $voiceMailUser
     *
     * @return self
     */
    protected function setVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $voiceMailUser = null)
    {
        $this->voiceMailUser = $voiceMailUser;

        return $this;
    }

    /**
     * Get voiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getVoiceMailUser()
    {
        return $this->voiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

