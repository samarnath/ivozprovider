<?php

namespace Core\Domain\Model\Queue;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class QueueDTO implements DataTransferObjectInterface
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
    private $maxWaitTime;

    /**
     * @var string
     */
    private $timeoutTargetType;

    /**
     * @var string
     */
    private $timeoutNumberValue;

    /**
     * @var integer
     */
    private $maxlen;

    /**
     * @var string
     */
    private $fullTargetType;

    /**
     * @var string
     */
    private $fullNumberValue;

    /**
     * @var integer
     */
    private $periodicAnnounceFrequency;

    /**
     * @var integer
     */
    private $memberCallRest;

    /**
     * @var integer
     */
    private $memberCallTimeout;

    /**
     * @var string
     */
    private $strategy;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $periodicAnnounceLocutionId;

    /**
     * @var mixed
     */
    private $timeoutLocutionId;

    /**
     * @var mixed
     */
    private $timeoutExtensionId;

    /**
     * @var mixed
     */
    private $timeoutVoiceMailUserId;

    /**
     * @var mixed
     */
    private $fullLocutionId;

    /**
     * @var mixed
     */
    private $fullExtensionId;

    /**
     * @var mixed
     */
    private $fullVoiceMailUserId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $periodicAnnounceLocution;

    /**
     * @var mixed
     */
    private $timeoutLocution;

    /**
     * @var mixed
     */
    private $timeoutExtension;

    /**
     * @var mixed
     */
    private $timeoutVoiceMailUser;

    /**
     * @var mixed
     */
    private $fullLocution;

    /**
     * @var mixed
     */
    private $fullExtension;

    /**
     * @var mixed
     */
    private $fullVoiceMailUser;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'maxWaitTime' => $this->getMaxWaitTime(),
            'timeoutTargetType' => $this->getTimeoutTargetType(),
            'timeoutNumberValue' => $this->getTimeoutNumberValue(),
            'maxlen' => $this->getMaxlen(),
            'fullTargetType' => $this->getFullTargetType(),
            'fullNumberValue' => $this->getFullNumberValue(),
            'periodicAnnounceFrequency' => $this->getPeriodicAnnounceFrequency(),
            'memberCallRest' => $this->getMemberCallRest(),
            'memberCallTimeout' => $this->getMemberCallTimeout(),
            'strategy' => $this->getStrategy(),
            'weight' => $this->getWeight(),
            'companyId' => $this->getCompanyId(),
            'periodicAnnounceLocutionId' => $this->getPeriodicAnnounceLocutionId(),
            'timeoutLocutionId' => $this->getTimeoutLocutionId(),
            'timeoutExtensionId' => $this->getTimeoutExtensionId(),
            'timeoutVoiceMailUserId' => $this->getTimeoutVoiceMailUserId(),
            'fullLocutionId' => $this->getFullLocutionId(),
            'fullExtensionId' => $this->getFullExtensionId(),
            'fullVoiceMailUserId' => $this->getFullVoiceMailUserId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setMaxWaitTime(isset($data['maxWaitTime']) ? $data['maxWaitTime'] : null)
            ->setTimeoutTargetType(isset($data['timeoutTargetType']) ? $data['timeoutTargetType'] : null)
            ->setTimeoutNumberValue(isset($data['timeoutNumberValue']) ? $data['timeoutNumberValue'] : null)
            ->setMaxlen(isset($data['maxlen']) ? $data['maxlen'] : null)
            ->setFullTargetType(isset($data['fullTargetType']) ? $data['fullTargetType'] : null)
            ->setFullNumberValue(isset($data['fullNumberValue']) ? $data['fullNumberValue'] : null)
            ->setPeriodicAnnounceFrequency(isset($data['periodicAnnounceFrequency']) ? $data['periodicAnnounceFrequency'] : null)
            ->setMemberCallRest(isset($data['memberCallRest']) ? $data['memberCallRest'] : null)
            ->setMemberCallTimeout(isset($data['memberCallTimeout']) ? $data['memberCallTimeout'] : null)
            ->setStrategy(isset($data['strategy']) ? $data['strategy'] : null)
            ->setWeight(isset($data['weight']) ? $data['weight'] : null)
            ->setCompanyId(isset($data['companyId']) ? $data['companyId'] : null)
            ->setPeriodicAnnounceLocutionId(isset($data['periodicAnnounceLocutionId']) ? $data['periodicAnnounceLocutionId'] : null)
            ->setTimeoutLocutionId(isset($data['timeoutLocutionId']) ? $data['timeoutLocutionId'] : null)
            ->setTimeoutExtensionId(isset($data['timeoutExtensionId']) ? $data['timeoutExtensionId'] : null)
            ->setTimeoutVoiceMailUserId(isset($data['timeoutVoiceMailUserId']) ? $data['timeoutVoiceMailUserId'] : null)
            ->setFullLocutionId(isset($data['fullLocutionId']) ? $data['fullLocutionId'] : null)
            ->setFullExtensionId(isset($data['fullExtensionId']) ? $data['fullExtensionId'] : null)
            ->setFullVoiceMailUserId(isset($data['fullVoiceMailUserId']) ? $data['fullVoiceMailUserId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Core\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->periodicAnnounceLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\Locution', $this->getPeriodicAnnounceLocutionId());
        $this->timeoutLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\Locution', $this->getTimeoutLocutionId());
        $this->timeoutExtension = $transformer->transform('Core\\Domain\\Model\\Extension\\Extension', $this->getTimeoutExtensionId());
        $this->timeoutVoiceMailUser = $transformer->transform('Core\\Domain\\Model\\User\\User', $this->getTimeoutVoiceMailUserId());
        $this->fullLocution = $transformer->transform('Core\\Domain\\Model\\Locution\\Locution', $this->getFullLocutionId());
        $this->fullExtension = $transformer->transform('Core\\Domain\\Model\\Extension\\Extension', $this->getFullExtensionId());
        $this->fullVoiceMailUser = $transformer->transform('Core\\Domain\\Model\\User\\User', $this->getFullVoiceMailUserId());
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
     * @return QueueDTO
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
     * @return QueueDTO
     */
    public function setName($name = null)
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
     * @param integer $maxWaitTime
     *
     * @return QueueDTO
     */
    public function setMaxWaitTime($maxWaitTime = null)
    {
        $this->maxWaitTime = $maxWaitTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxWaitTime()
    {
        return $this->maxWaitTime;
    }

    /**
     * @param string $timeoutTargetType
     *
     * @return QueueDTO
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
     * @return QueueDTO
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
     * @param integer $maxlen
     *
     * @return QueueDTO
     */
    public function setMaxlen($maxlen = null)
    {
        $this->maxlen = $maxlen;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxlen()
    {
        return $this->maxlen;
    }

    /**
     * @param string $fullTargetType
     *
     * @return QueueDTO
     */
    public function setFullTargetType($fullTargetType = null)
    {
        $this->fullTargetType = $fullTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullTargetType()
    {
        return $this->fullTargetType;
    }

    /**
     * @param string $fullNumberValue
     *
     * @return QueueDTO
     */
    public function setFullNumberValue($fullNumberValue = null)
    {
        $this->fullNumberValue = $fullNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullNumberValue()
    {
        return $this->fullNumberValue;
    }

    /**
     * @param integer $periodicAnnounceFrequency
     *
     * @return QueueDTO
     */
    public function setPeriodicAnnounceFrequency($periodicAnnounceFrequency = null)
    {
        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * @param integer $memberCallRest
     *
     * @return QueueDTO
     */
    public function setMemberCallRest($memberCallRest = null)
    {
        $this->memberCallRest = $memberCallRest;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMemberCallRest()
    {
        return $this->memberCallRest;
    }

    /**
     * @param integer $memberCallTimeout
     *
     * @return QueueDTO
     */
    public function setMemberCallTimeout($memberCallTimeout = null)
    {
        $this->memberCallTimeout = $memberCallTimeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMemberCallTimeout()
    {
        return $this->memberCallTimeout;
    }

    /**
     * @param string $strategy
     *
     * @return QueueDTO
     */
    public function setStrategy($strategy = null)
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param integer $weight
     *
     * @return QueueDTO
     */
    public function setWeight($weight = null)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param integer $companyId
     *
     * @return QueueDTO
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
     * @return \Core\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $periodicAnnounceLocutionId
     *
     * @return QueueDTO
     */
    public function setPeriodicAnnounceLocutionId($periodicAnnounceLocutionId)
    {
        $this->periodicAnnounceLocutionId = $periodicAnnounceLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodicAnnounceLocutionId()
    {
        return $this->periodicAnnounceLocutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\Locution
     */
    public function getPeriodicAnnounceLocution()
    {
        return $this->periodicAnnounceLocution;
    }

    /**
     * @param integer $timeoutLocutionId
     *
     * @return QueueDTO
     */
    public function setTimeoutLocutionId($timeoutLocutionId)
    {
        $this->timeoutLocutionId = $timeoutLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutLocutionId()
    {
        return $this->timeoutLocutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\Locution
     */
    public function getTimeoutLocution()
    {
        return $this->timeoutLocution;
    }

    /**
     * @param integer $timeoutExtensionId
     *
     * @return QueueDTO
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
     * @return \Core\Domain\Model\Extension\Extension
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * @param integer $timeoutVoiceMailUserId
     *
     * @return QueueDTO
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
     * @return \Core\Domain\Model\User\User
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * @param integer $fullLocutionId
     *
     * @return QueueDTO
     */
    public function setFullLocutionId($fullLocutionId)
    {
        $this->fullLocutionId = $fullLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullLocutionId()
    {
        return $this->fullLocutionId;
    }

    /**
     * @return \Core\Domain\Model\Locution\Locution
     */
    public function getFullLocution()
    {
        return $this->fullLocution;
    }

    /**
     * @param integer $fullExtensionId
     *
     * @return QueueDTO
     */
    public function setFullExtensionId($fullExtensionId)
    {
        $this->fullExtensionId = $fullExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullExtensionId()
    {
        return $this->fullExtensionId;
    }

    /**
     * @return \Core\Domain\Model\Extension\Extension
     */
    public function getFullExtension()
    {
        return $this->fullExtension;
    }

    /**
     * @param integer $fullVoiceMailUserId
     *
     * @return QueueDTO
     */
    public function setFullVoiceMailUserId($fullVoiceMailUserId)
    {
        $this->fullVoiceMailUserId = $fullVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullVoiceMailUserId()
    {
        return $this->fullVoiceMailUserId;
    }

    /**
     * @return \Core\Domain\Model\User\User
     */
    public function getFullVoiceMailUser()
    {
        return $this->fullVoiceMailUser;
    }
}

