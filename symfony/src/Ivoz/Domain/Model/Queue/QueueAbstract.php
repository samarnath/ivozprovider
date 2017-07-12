<?php

namespace Ivoz\Domain\Model\Queue;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * QueueAbstract
 */
abstract class QueueAbstract
{
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
     * @var \Ivoz\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $periodicAnnounceLocution;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $timeoutLocution;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $timeoutExtension;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $timeoutVoiceMailUser;

    /**
     * @var \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    protected $fullLocution;

    /**
     * @var \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    protected $fullExtension;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
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

    abstract public function __wakeup();

    /**
     * @return QueueDTO
     */
    public static function createDTO()
    {
        return new QueueDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueDTO
         */
        Assertion::isInstanceOf($dto, QueueDTO::class);

        $self = new static();

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
            ->setFullVoiceMailUser($dto->getFullVoiceMailUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueDTO
         */
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
     * Set name
     *
     * @param string $name
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @param \Ivoz\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    protected function setCompany(\Ivoz\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set periodicAnnounceLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $periodicAnnounceLocution
     *
     * @return self
     */
    protected function setPeriodicAnnounceLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $periodicAnnounceLocution = null)
    {
        $this->periodicAnnounceLocution = $periodicAnnounceLocution;

        return $this;
    }

    /**
     * Get periodicAnnounceLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getPeriodicAnnounceLocution()
    {
        return $this->periodicAnnounceLocution;
    }

    /**
     * Set timeoutLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $timeoutLocution
     *
     * @return self
     */
    protected function setTimeoutLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $timeoutLocution = null)
    {
        $this->timeoutLocution = $timeoutLocution;

        return $this;
    }

    /**
     * Get timeoutLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getTimeoutLocution()
    {
        return $this->timeoutLocution;
    }

    /**
     * Set timeoutExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $timeoutExtension
     *
     * @return self
     */
    protected function setTimeoutExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $timeoutExtension = null)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * Get timeoutExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * Set timeoutVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $timeoutVoiceMailUser
     *
     * @return self
     */
    protected function setTimeoutVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $timeoutVoiceMailUser = null)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * Get timeoutVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * Set fullLocution
     *
     * @param \Ivoz\Domain\Model\Locution\LocutionInterface $fullLocution
     *
     * @return self
     */
    protected function setFullLocution(\Ivoz\Domain\Model\Locution\LocutionInterface $fullLocution = null)
    {
        $this->fullLocution = $fullLocution;

        return $this;
    }

    /**
     * Get fullLocution
     *
     * @return \Ivoz\Domain\Model\Locution\LocutionInterface
     */
    public function getFullLocution()
    {
        return $this->fullLocution;
    }

    /**
     * Set fullExtension
     *
     * @param \Ivoz\Domain\Model\Extension\ExtensionInterface $fullExtension
     *
     * @return self
     */
    protected function setFullExtension(\Ivoz\Domain\Model\Extension\ExtensionInterface $fullExtension = null)
    {
        $this->fullExtension = $fullExtension;

        return $this;
    }

    /**
     * Get fullExtension
     *
     * @return \Ivoz\Domain\Model\Extension\ExtensionInterface
     */
    public function getFullExtension()
    {
        return $this->fullExtension;
    }

    /**
     * Set fullVoiceMailUser
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $fullVoiceMailUser
     *
     * @return self
     */
    protected function setFullVoiceMailUser(\Ivoz\Domain\Model\User\UserInterface $fullVoiceMailUser = null)
    {
        $this->fullVoiceMailUser = $fullVoiceMailUser;

        return $this;
    }

    /**
     * Get fullVoiceMailUser
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getFullVoiceMailUser()
    {
        return $this->fullVoiceMailUser;
    }



    // @codeCoverageIgnoreEnd
}

