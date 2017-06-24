<?php

namespace Core\Domain\Model\IVRCustomEntry;

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
    private $id;

    /**
     * @var string
     */
    private $entry;

    /**
     * @var string
     */
    private $targetType;

    /**
     * @var string
     */
    private $targetNumberValue;

    /**
     * @var mixed
     */
    private $IVRCustomId;

    /**
     * @var mixed
     */
    private $welcomeLocutionId;

    /**
     * @var mixed
     */
    private $targetExtensionId;

    /**
     * @var mixed
     */
    private $targetVoiceMailUserId;

    /**
     * @var mixed
     */
    private $IVRCustom;

    /**
     * @var mixed
     */
    private $welcomeLocution;

    /**
     * @var mixed
     */
    private $targetExtension;

    /**
     * @var mixed
     */
    private $targetVoiceMailUser;

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
     * @deprecated
     *
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
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->iVRCustom = $transformer->transform('Core\\Domain\\Model\\IVRCustom\\IVRCustom', $this->getIVRCustomId());
        $this->welcomeLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\Locution', $this->getWelcomeLocutionId());
        $this->targetExtension = $transformer->transform('Core\\Domain\\Model\\Extension\\Extension', $this->getTargetExtensionId());
        $this->targetVoiceMailUser = $transformer->transform('Core\\Domain\\Model\\User\\User', $this->getTargetVoiceMailUserId());
    }

    /**
     * {@inheritDoc}
     */
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
     * @return \Core\Domain\Model\IVRCustom\IVRCustom
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
     * @return \Core\Domain\Model\Locution\Locution
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
     * @return \Core\Domain\Model\Extension\Extension
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
     * @return \Core\Domain\Model\User\User
     */
    public function getTargetVoiceMailUser()
    {
        return $this->targetVoiceMailUser;
    }
}

