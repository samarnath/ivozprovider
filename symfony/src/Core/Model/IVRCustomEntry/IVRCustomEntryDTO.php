<?php

namespace Core\Model\IVRCustomEntry;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class IVRCustomEntryDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $entry;

    /**
     * @var string
     */
    public $targetType;

    /**
     * @var string
     */
    public $targetNumberValue;

    /**
     * @var mixed
     */
    public $IVRCustomId;

    /**
     * @var mixed
     */
    public $welcomeLocutionId;

    /**
     * @var mixed
     */
    public $targetExtensionId;

    /**
     * @var mixed
     */
    public $targetVoiceMailUserId;

    /**
     * @var mixed
     */
    public $IVRCustom;

    /**
     * @var mixed
     */
    public $welcomeLocution;

    /**
     * @var mixed
     */
    public $targetExtension;

    /**
     * @var mixed
     */
    public $targetVoiceMailUser;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'entry' => $this->getEntry(),
            'targetType' => $this->getTargetType(),
            'targetNumberValue' => $this->getTargetNumberValue(),
            'iVRCustomId' => $this->getIVRCustomId(),
            'welcomeLocutionId' => $this->getWelcomeLocutionId(),
            'targetExtensionId' => $this->getTargetExtensionId(),
            'targetVoiceMailUserId' => $this->getTargetVoiceMailUserId()
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
            ->setEntry(isset($data['entry']) ? $data['entry'] : null)
            ->setTargetType(isset($data['targetType']) ? $data['targetType'] : null)
            ->setTargetNumberValue(isset($data['targetNumberValue']) ? $data['targetNumberValue'] : null)
            ->setIVRCustomId(isset($data['IVRCustomId']) ? $data['IVRCustomId'] : null)
            ->setWelcomeLocutionId(isset($data['welcomeLocutionId']) ? $data['welcomeLocutionId'] : null)
            ->setTargetExtensionId(isset($data['targetExtensionId']) ? $data['targetExtensionId'] : null)
            ->setTargetVoiceMailUserId(isset($data['targetVoiceMailUserId']) ? $data['targetVoiceMailUserId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->iVRCustom = $transformer->transform('Core\\Model\\IVRCustom\\IVRCustom', $this->getIVRCustomId());
        $this->welcomeLocution = $transformer->transform('Core\\Model\\Locution\\Locution', $this->getWelcomeLocutionId());
        $this->targetExtension = $transformer->transform('Core\\Model\\Extension\\Extension', $this->getTargetExtensionId());
        $this->targetVoiceMailUser = $transformer->transform('Core\\Model\\User\\User', $this->getTargetVoiceMailUserId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return IVRCustomEntryDTO
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
     * @param string $entry
     *
     * @return IVRCustomEntryDTO
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param string $targetType
     *
     * @return IVRCustomEntryDTO
     */
    public function setTargetType($targetType)
    {
        $this->targetType = $targetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * @param string $targetNumberValue
     *
     * @return IVRCustomEntryDTO
     */
    public function setTargetNumberValue($targetNumberValue = null)
    {
        $this->targetNumberValue = $targetNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetNumberValue()
    {
        return $this->targetNumberValue;
    }

    /**
     * @param integer $iVRCustomId
     *
     * @return IVRCustomEntryDTO
     */
    public function setIVRCustomId($iVRCustomId)
    {
        $this->IVRCustomId = $iVRCustomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIVRCustomId()
    {
        return $this->IVRCustomId;
    }

    /**
     * @return \Core\Model\IVRCustom\IVRCustom
     */
    public function getIVRCustom()
    {
        return $this->IVRCustom;
    }

    /**
     * @param integer $welcomeLocutionId
     *
     * @return IVRCustomEntryDTO
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
     * @param integer $targetExtensionId
     *
     * @return IVRCustomEntryDTO
     */
    public function setTargetExtensionId($targetExtensionId)
    {
        $this->targetExtensionId = $targetExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetExtensionId()
    {
        return $this->targetExtensionId;
    }

    /**
     * @return \Core\Model\Extension\Extension
     */
    public function getTargetExtension()
    {
        return $this->targetExtension;
    }

    /**
     * @param integer $targetVoiceMailUserId
     *
     * @return IVRCustomEntryDTO
     */
    public function setTargetVoiceMailUserId($targetVoiceMailUserId)
    {
        $this->targetVoiceMailUserId = $targetVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetVoiceMailUserId()
    {
        return $this->targetVoiceMailUserId;
    }

    /**
     * @return \Core\Model\User\User
     */
    public function getTargetVoiceMailUser()
    {
        return $this->targetVoiceMailUser;
    }
}

