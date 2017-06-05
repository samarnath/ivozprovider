<?php

namespace Core\Model\IVRCustomEntry;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * IVRCustomEntry
 */
class IVRCustomEntry implements EntityInterface, IVRCustomEntryInterface
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
     * @var \Core\Model\IVRCustom\IVRCustomInterface
     */
    protected $IVRCustom;

    /**
     * @var \Core\Model\Locution\LocutionInterface
     */
    protected $welcomeLocution;

    /**
     * @var \Core\Model\Extension\ExtensionInterface
     */
    protected $targetExtension;

    /**
     * @var \Core\Model\User\UserInterface
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
     * @param IVRCustomEntryDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, IVRCustomEntryDTO::class);

        $self = new self(
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
     * @param IVRCustomEntryDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
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
        return self::createDTO()
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
     * @return IVRCustomEntry
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
     * @return IVRCustomEntry
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
     * @return IVRCustomEntry
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
     * @param \Core\Model\IVRCustom\IVRCustomInterface $iVRCustom
     *
     * @return IVRCustomEntry
     */
    protected function setIVRCustom(\Core\Model\IVRCustom\IVRCustomInterface $iVRCustom)
    {
        $this->IVRCustom = $iVRCustom;

        return $this;
    }

    /**
     * Get iVRCustom
     *
     * @return \Core\Model\IVRCustom\IVRCustomInterface
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * Set welcomeLocution
     *
     * @param \Core\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return IVRCustomEntry
     */
    protected function setWelcomeLocution(\Core\Model\Locution\LocutionInterface $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Core\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set targetExtension
     *
     * @param \Core\Model\Extension\ExtensionInterface $targetExtension
     *
     * @return IVRCustomEntry
     */
    protected function setTargetExtension(\Core\Model\Extension\ExtensionInterface $targetExtension = null)
    {
        $this->targetExtension = $targetExtension;

        return $this;
    }

    /**
     * Get targetExtension
     *
     * @return \Core\Model\Extension\ExtensionInterface
     */
    public function getTargetExtension()
    {
        return $this->targetExtension;
    }

    /**
     * Set targetVoiceMailUser
     *
     * @param \Core\Model\User\UserInterface $targetVoiceMailUser
     *
     * @return IVRCustomEntry
     */
    protected function setTargetVoiceMailUser(\Core\Model\User\UserInterface $targetVoiceMailUser = null)
    {
        $this->targetVoiceMailUser = $targetVoiceMailUser;

        return $this;
    }

    /**
     * Get targetVoiceMailUser
     *
     * @return \Core\Model\User\UserInterface
     */
    public function getTargetVoiceMailUser()
    {
        return $this->targetVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

