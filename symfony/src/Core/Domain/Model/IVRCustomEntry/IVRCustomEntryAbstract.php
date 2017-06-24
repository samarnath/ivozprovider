<?php

namespace Core\Domain\Model\IVRCustomEntry;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * IVRCustomEntryAbstract
 */
abstract class IVRCustomEntryAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $entry;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $targetType;

    /**
     * @var string
     */
    protected $targetNumberValue;

    /**
     * @var \Core\Domain\Model\IVRCustom\IVRCustomInterface
     */
    protected $IVRCustom;

    /**
     * @var \Core\Domain\Model\Locution\LocutionInterface
     */
    protected $welcomeLocution;

    /**
     * @var \Core\Domain\Model\Extension\ExtensionInterface
     */
    protected $targetExtension;

    /**
     * @var \Core\Domain\Model\User\UserInterface
     */
    protected $targetVoiceMailUser;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($entry, $targetType)
    {
        $this->setEntry($entry);
        $this->setTargetType($targetType);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return IVRCustomEntryDTO
     */
    public static function createDTO()
    {
        return new IVRCustomEntryDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IVRCustomEntryDTO
         */
        Assertion::isInstanceOf($dto, IVRCustomEntryDTO::class);

        $self = new static(
            $dto->getEntry(),
            $dto->getTargetType()
        );

        return $self
            ->setTargetNumberValue($dto->getTargetNumberValue())
            ->setIVRCustom($dto->getIVRCustom())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setTargetExtension($dto->getTargetExtension())
            ->setTargetVoiceMailUser($dto->getTargetVoiceMailUser());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IVRCustomEntryDTO
         */
        Assertion::isInstanceOf($dto, IVRCustomEntryDTO::class);

        $this
            ->setEntry($dto->getEntry())
            ->setTargetType($dto->getTargetType())
            ->setTargetNumberValue($dto->getTargetNumberValue())
            ->setIVRCustom($dto->getIVRCustom())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setTargetExtension($dto->getTargetExtension())
            ->setTargetVoiceMailUser($dto->getTargetVoiceMailUser());


        return $this;
    }

    /**
     * @return IVRCustomEntryDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setEntry($this->getEntry())
            ->setTargetType($this->getTargetType())
            ->setTargetNumberValue($this->getTargetNumberValue())
            ->setIVRCustomId($this->getIVRCustom() ? $this->getIVRCustom()->getId() : null)
            ->setWelcomeLocutionId($this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null)
            ->setTargetExtensionId($this->getTargetExtension() ? $this->getTargetExtension()->getId() : null)
            ->setTargetVoiceMailUserId($this->getTargetVoiceMailUser() ? $this->getTargetVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'entry' => $this->getEntry(),
            'targetType' => $this->getTargetType(),
            'targetNumberValue' => $this->getTargetNumberValue(),
            'iVRCustomId' => $this->getIVRCustom() ? $this->getIVRCustom()->getId() : null,
            'welcomeLocutionId' => $this->getWelcomeLocution() ? $this->getWelcomeLocution()->getId() : null,
            'targetExtensionId' => $this->getTargetExtension() ? $this->getTargetExtension()->getId() : null,
            'targetVoiceMailUserId' => $this->getTargetVoiceMailUser() ? $this->getTargetVoiceMailUser()->getId() : null
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
     * Set entry
     *
     * @param string $entry
     *
     * @return self
     */
    protected function setEntry($entry)
    {
        Assertion::notNull($entry);
        Assertion::maxLength($entry, 40);

        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
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
     * Set targetNumberValue
     *
     * @param string $targetNumberValue
     *
     * @return self
     */
    protected function setTargetNumberValue($targetNumberValue = null)
    {
        if (!is_null($targetNumberValue)) {
            Assertion::maxLength($targetNumberValue, 25);
        }

        $this->targetNumberValue = $targetNumberValue;

        return $this;
    }

    /**
     * Get targetNumberValue
     *
     * @return string
     */
    public function getTargetNumberValue()
    {
        return $this->targetNumberValue;
    }

    /**
     * Set iVRCustom
     *
     * @param \Core\Domain\Model\IVRCustom\IVRCustomInterface $iVRCustom
     *
     * @return self
     */
    protected function setIVRCustom(\Core\Domain\Model\IVRCustom\IVRCustomInterface $iVRCustom)
    {
        $this->IVRCustom = $iVRCustom;

        return $this;
    }

    /**
     * Get iVRCustom
     *
     * @return \Core\Domain\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * Set welcomeLocution
     *
     * @param \Core\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return self
     */
    protected function setWelcomeLocution(\Core\Domain\Model\Locution\LocutionInterface $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Core\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set targetExtension
     *
     * @param \Core\Domain\Model\Extension\ExtensionInterface $targetExtension
     *
     * @return self
     */
    protected function setTargetExtension(\Core\Domain\Model\Extension\ExtensionInterface $targetExtension = null)
    {
        $this->targetExtension = $targetExtension;

        return $this;
    }

    /**
     * Get targetExtension
     *
     * @return \Core\Domain\Model\Extension\ExtensionInterface
     */
    public function getTargetExtension()
    {
        return $this->targetExtension;
    }

    /**
     * Set targetVoiceMailUser
     *
     * @param \Core\Domain\Model\User\UserInterface $targetVoiceMailUser
     *
     * @return self
     */
    protected function setTargetVoiceMailUser(\Core\Domain\Model\User\UserInterface $targetVoiceMailUser = null)
    {
        $this->targetVoiceMailUser = $targetVoiceMailUser;

        return $this;
    }

    /**
     * Get targetVoiceMailUser
     *
     * @return \Core\Domain\Model\User\UserInterface
     */
    public function getTargetVoiceMailUser()
    {
        return $this->targetVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

