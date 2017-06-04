<?php

namespace Core\Model\Queue;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Queue
 */
class Queue implements EntityInterface, QueueInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $maxWaitTime;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $timeoutTargetType;

    /**
     * @var string
     */
    protected $timeoutNumberValue;

    /**
     * @var integer
     */
    protected $maxlen;

    /**
     * @comment enum:number|extension|voicemail
     * @var string
     */
    protected $fullTargetType;

    /**
     * @var string
     */
    protected $fullNumberValue;

    /**
     * @var integer
     */
    protected $periodicAnnounceFrequency;

    /**
     * @var integer
     */
    protected $memberCallRest;

    /**
     * @var integer
     */
    protected $memberCallTimeout;

    /**
     * @var string
     */
    protected $strategy;

    /**
     * @var integer
     */
    protected $weight;

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $periodicAnnounceLocution;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $timeoutLocution;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $timeoutExtension;

    /**
     * @var \Core\Model\User\User
     */
    protected $timeoutVoiceMailUser;

    /**
     * @var \Core\Model\Locution\Locution
     */
    protected $fullLocution;

    /**
     * @var \Core\Model\Extension\Extension
     */
    protected $fullExtension;

    /**
     * @var \Core\Model\User\User
     */
    protected $fullVoiceMailUser;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return QueueDTO
     */
    public static function createDTO()
    {
        return new QueueDTO();
    }

    /**
     * Factory method
     * @param QueueDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, QueueDTO::class);

        $self = new self();

        return $self
            ->setName($dto->getName())
            ->setMaxWaitTime($dto->getMaxWaitTime())
            ->setTimeoutTargetType($dto->getTimeoutTargetType())
            ->setTimeoutNumberValue($dto->getTimeoutNumberValue())
            ->setMaxlen($dto->getMaxlen())
            ->setFullTargetType($dto->getFullTargetType())
            ->setFullNumberValue($dto->getFullNumberValue())
            ->setPeriodicAnnounceFrequency($dto->getPeriodicAnnounceFrequency())
            ->setMemberCallRest($dto->getMemberCallRest())
            ->setMemberCallTimeout($dto->getMemberCallTimeout())
            ->setStrategy($dto->getStrategy())
            ->setWeight($dto->getWeight())
            ->setCompany($dto->getCompany())
            ->setPeriodicAnnounceLocution($dto->getPeriodicAnnounceLocution())
            ->setTimeoutLocution($dto->getTimeoutLocution())
            ->setTimeoutExtension($dto->getTimeoutExtension())
            ->setTimeoutVoiceMailUser($dto->getTimeoutVoiceMailUser())
            ->setFullLocution($dto->getFullLocution())
            ->setFullExtension($dto->getFullExtension())
            ->setFullVoiceMailUser($dto->getFullVoiceMailUser());
    }

    /**
     * @param QueueDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, QueueDTO::class);

        $this
            ->setName($dto->getName())
            ->setMaxWaitTime($dto->getMaxWaitTime())
            ->setTimeoutTargetType($dto->getTimeoutTargetType())
            ->setTimeoutNumberValue($dto->getTimeoutNumberValue())
            ->setMaxlen($dto->getMaxlen())
            ->setFullTargetType($dto->getFullTargetType())
            ->setFullNumberValue($dto->getFullNumberValue())
            ->setPeriodicAnnounceFrequency($dto->getPeriodicAnnounceFrequency())
            ->setMemberCallRest($dto->getMemberCallRest())
            ->setMemberCallTimeout($dto->getMemberCallTimeout())
            ->setStrategy($dto->getStrategy())
            ->setWeight($dto->getWeight())
            ->setCompany($dto->getCompany())
            ->setPeriodicAnnounceLocution($dto->getPeriodicAnnounceLocution())
            ->setTimeoutLocution($dto->getTimeoutLocution())
            ->setTimeoutExtension($dto->getTimeoutExtension())
            ->setTimeoutVoiceMailUser($dto->getTimeoutVoiceMailUser())
            ->setFullLocution($dto->getFullLocution())
            ->setFullExtension($dto->getFullExtension())
            ->setFullVoiceMailUser($dto->getFullVoiceMailUser());


        return $this;
    }

    /**
     * @return QueueDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setMaxWaitTime($this->getMaxWaitTime())
            ->setTimeoutTargetType($this->getTimeoutTargetType())
            ->setTimeoutNumberValue($this->getTimeoutNumberValue())
            ->setMaxlen($this->getMaxlen())
            ->setFullTargetType($this->getFullTargetType())
            ->setFullNumberValue($this->getFullNumberValue())
            ->setPeriodicAnnounceFrequency($this->getPeriodicAnnounceFrequency())
            ->setMemberCallRest($this->getMemberCallRest())
            ->setMemberCallTimeout($this->getMemberCallTimeout())
            ->setStrategy($this->getStrategy())
            ->setWeight($this->getWeight())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null)
            ->setPeriodicAnnounceLocutionId($this->getPeriodicAnnounceLocution() ? $this->getPeriodicAnnounceLocution()->getId() : null)
            ->setTimeoutLocutionId($this->getTimeoutLocution() ? $this->getTimeoutLocution()->getId() : null)
            ->setTimeoutExtensionId($this->getTimeoutExtension() ? $this->getTimeoutExtension()->getId() : null)
            ->setTimeoutVoiceMailUserId($this->getTimeoutVoiceMailUser() ? $this->getTimeoutVoiceMailUser()->getId() : null)
            ->setFullLocutionId($this->getFullLocution() ? $this->getFullLocution()->getId() : null)
            ->setFullExtensionId($this->getFullExtension() ? $this->getFullExtension()->getId() : null)
            ->setFullVoiceMailUserId($this->getFullVoiceMailUser() ? $this->getFullVoiceMailUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null,
            'periodicAnnounceLocutionId' => $this->getPeriodicAnnounceLocution() ? $this->getPeriodicAnnounceLocution()->getId() : null,
            'timeoutLocutionId' => $this->getTimeoutLocution() ? $this->getTimeoutLocution()->getId() : null,
            'timeoutExtensionId' => $this->getTimeoutExtension() ? $this->getTimeoutExtension()->getId() : null,
            'timeoutVoiceMailUserId' => $this->getTimeoutVoiceMailUser() ? $this->getTimeoutVoiceMailUser()->getId() : null,
            'fullLocutionId' => $this->getFullLocution() ? $this->getFullLocution()->getId() : null,
            'fullExtensionId' => $this->getFullExtension() ? $this->getFullExtension()->getId() : null,
            'fullVoiceMailUserId' => $this->getFullVoiceMailUser() ? $this->getFullVoiceMailUser()->getId() : null
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
     * Set name
     *
     * @param string $name
     *
     * @return Queue
     */
    protected function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 128);
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set maxWaitTime
     *
     * @param integer $maxWaitTime
     *
     * @return Queue
     */
    protected function setMaxWaitTime($maxWaitTime = null)
    {
        if (!is_null($maxWaitTime)) {
            if (!is_null($maxWaitTime)) {
                Assertion::integerish($maxWaitTime);
            }
        }

        $this->maxWaitTime = $maxWaitTime;

        return $this;
    }

    /**
     * Get maxWaitTime
     *
     * @return integer
     */
    public function getMaxWaitTime()
    {
        return $this->maxWaitTime;
    }

    /**
     * Set timeoutTargetType
     *
     * @param string $timeoutTargetType
     *
     * @return Queue
     */
    protected function setTimeoutTargetType($timeoutTargetType = null)
    {
        if (!is_null($timeoutTargetType)) {
            Assertion::maxLength($timeoutTargetType, 25);
        Assertion::choice($timeoutTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->timeoutTargetType = $timeoutTargetType;

        return $this;
    }

    /**
     * Get timeoutTargetType
     *
     * @return string
     */
    public function getTimeoutTargetType()
    {
        return $this->timeoutTargetType;
    }

    /**
     * Set timeoutNumberValue
     *
     * @param string $timeoutNumberValue
     *
     * @return Queue
     */
    protected function setTimeoutNumberValue($timeoutNumberValue = null)
    {
        if (!is_null($timeoutNumberValue)) {
            Assertion::maxLength($timeoutNumberValue, 25);
        }

        $this->timeoutNumberValue = $timeoutNumberValue;

        return $this;
    }

    /**
     * Get timeoutNumberValue
     *
     * @return string
     */
    public function getTimeoutNumberValue()
    {
        return $this->timeoutNumberValue;
    }

    /**
     * Set maxlen
     *
     * @param integer $maxlen
     *
     * @return Queue
     */
    protected function setMaxlen($maxlen = null)
    {
        if (!is_null($maxlen)) {
            if (!is_null($maxlen)) {
                Assertion::integerish($maxlen);
            }
        }

        $this->maxlen = $maxlen;

        return $this;
    }

    /**
     * Get maxlen
     *
     * @return integer
     */
    public function getMaxlen()
    {
        return $this->maxlen;
    }

    /**
     * Set fullTargetType
     *
     * @param string $fullTargetType
     *
     * @return Queue
     */
    protected function setFullTargetType($fullTargetType = null)
    {
        if (!is_null($fullTargetType)) {
            Assertion::maxLength($fullTargetType, 25);
        Assertion::choice($fullTargetType, array (
          0 => '    number',
          1 => '    extension',
          2 => '    voicemail',
        ));
        }

        $this->fullTargetType = $fullTargetType;

        return $this;
    }

    /**
     * Get fullTargetType
     *
     * @return string
     */
    public function getFullTargetType()
    {
        return $this->fullTargetType;
    }

    /**
     * Set fullNumberValue
     *
     * @param string $fullNumberValue
     *
     * @return Queue
     */
    protected function setFullNumberValue($fullNumberValue = null)
    {
        if (!is_null($fullNumberValue)) {
            Assertion::maxLength($fullNumberValue, 25);
        }

        $this->fullNumberValue = $fullNumberValue;

        return $this;
    }

    /**
     * Get fullNumberValue
     *
     * @return string
     */
    public function getFullNumberValue()
    {
        return $this->fullNumberValue;
    }

    /**
     * Set periodicAnnounceFrequency
     *
     * @param integer $periodicAnnounceFrequency
     *
     * @return Queue
     */
    protected function setPeriodicAnnounceFrequency($periodicAnnounceFrequency = null)
    {
        if (!is_null($periodicAnnounceFrequency)) {
            if (!is_null($periodicAnnounceFrequency)) {
                Assertion::integerish($periodicAnnounceFrequency);
            }
        }

        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;

        return $this;
    }

    /**
     * Get periodicAnnounceFrequency
     *
     * @return integer
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * Set memberCallRest
     *
     * @param integer $memberCallRest
     *
     * @return Queue
     */
    protected function setMemberCallRest($memberCallRest = null)
    {
        if (!is_null($memberCallRest)) {
            if (!is_null($memberCallRest)) {
                Assertion::integerish($memberCallRest);
            }
        }

        $this->memberCallRest = $memberCallRest;

        return $this;
    }

    /**
     * Get memberCallRest
     *
     * @return integer
     */
    public function getMemberCallRest()
    {
        return $this->memberCallRest;
    }

    /**
     * Set memberCallTimeout
     *
     * @param integer $memberCallTimeout
     *
     * @return Queue
     */
    protected function setMemberCallTimeout($memberCallTimeout = null)
    {
        if (!is_null($memberCallTimeout)) {
            if (!is_null($memberCallTimeout)) {
                Assertion::integerish($memberCallTimeout);
            }
        }

        $this->memberCallTimeout = $memberCallTimeout;

        return $this;
    }

    /**
     * Get memberCallTimeout
     *
     * @return integer
     */
    public function getMemberCallTimeout()
    {
        return $this->memberCallTimeout;
    }

    /**
     * Set strategy
     *
     * @param string $strategy
     *
     * @return Queue
     */
    protected function setStrategy($strategy = null)
    {
        if (!is_null($strategy)) {
        }

        $this->strategy = $strategy;

        return $this;
    }

    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Queue
     */
    protected function setWeight($weight = null)
    {
        if (!is_null($weight)) {
            if (!is_null($weight)) {
                Assertion::integerish($weight);
            }
        }

        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return Queue
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set periodicAnnounceLocution
     *
     * @param \Core\Model\Locution\Locution $periodicAnnounceLocution
     *
     * @return Queue
     */
    protected function setPeriodicAnnounceLocution(\Core\Model\Locution\Locution $periodicAnnounceLocution = null)
    {
        $this->periodicAnnounceLocution = $periodicAnnounceLocution;

        return $this;
    }

    /**
     * Get periodicAnnounceLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getPeriodicAnnounceLocution()
    {
        return $this->periodicAnnounceLocution;
    }

    /**
     * Set timeoutLocution
     *
     * @param \Core\Model\Locution\Locution $timeoutLocution
     *
     * @return Queue
     */
    protected function setTimeoutLocution(\Core\Model\Locution\Locution $timeoutLocution = null)
    {
        $this->timeoutLocution = $timeoutLocution;

        return $this;
    }

    /**
     * Get timeoutLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getTimeoutLocution()
    {
        return $this->timeoutLocution;
    }

    /**
     * Set timeoutExtension
     *
     * @param \Core\Model\Extension\Extension $timeoutExtension
     *
     * @return Queue
     */
    protected function setTimeoutExtension(\Core\Model\Extension\Extension $timeoutExtension = null)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * Get timeoutExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * Set timeoutVoiceMailUser
     *
     * @param \Core\Model\User\User $timeoutVoiceMailUser
     *
     * @return Queue
     */
    protected function setTimeoutVoiceMailUser(\Core\Model\User\User $timeoutVoiceMailUser = null)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * Set fullLocution
     *
     * @param \Core\Model\Locution\Locution $fullLocution
     *
     * @return Queue
     */
    protected function setFullLocution(\Core\Model\Locution\Locution $fullLocution = null)
    {
        $this->fullLocution = $fullLocution;

        return $this;
    }

    /**
     * Get fullLocution
     *
     * @return \Core\Model\Locution\Locution
     */
    public function getFullLocution()
    {
        return $this->fullLocution;
    }

    /**
     * Set fullExtension
     *
     * @param \Core\Model\Extension\Extension $fullExtension
     *
     * @return Queue
     */
    protected function setFullExtension(\Core\Model\Extension\Extension $fullExtension = null)
    {
        $this->fullExtension = $fullExtension;

        return $this;
    }

    /**
     * Get fullExtension
     *
     * @return \Core\Model\Extension\Extension
     */
    public function getFullExtension()
    {
        return $this->fullExtension;
    }

    /**
     * Set fullVoiceMailUser
     *
     * @param \Core\Model\User\User $fullVoiceMailUser
     *
     * @return Queue
     */
    protected function setFullVoiceMailUser(\Core\Model\User\User $fullVoiceMailUser = null)
    {
        $this->fullVoiceMailUser = $fullVoiceMailUser;

        return $this;
    }

    /**
     * Get fullVoiceMailUser
     *
     * @return \Core\Model\User\User
     */
    public function getFullVoiceMailUser()
    {
        return $this->fullVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

