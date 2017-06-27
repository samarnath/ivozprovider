<?php

namespace Kam\Domain\Model\UsersMissedCall;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * UsersMissedCall
 */
class UsersMissedCall extends UsersMissedCallAbstract implements UsersMissedCallInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $method,
        $fromTag,
        $toTag,
        $callid,
        $sipCode,
        $sipReason,
        $localtime
    ) {
        $this->setMethod($method);
        $this->setFromTag($fromTag);
        $this->setToTag($toTag);
        $this->setCallid($callid);
        $this->setSipCode($sipCode);
        $this->setSipReason($sipReason);
        $this->setLocaltime($localtime);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return UsersMissedCallDTO
     */
    public static function createDTO()
    {
        return new UsersMissedCallDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersMissedCallDTO
         */
        Assertion::isInstanceOf($dto, UsersMissedCallDTO::class);

        $self = new self(
            $dto->getMethod(),
            $dto->getFromTag(),
            $dto->getToTag(),
            $dto->getCallid(),
            $dto->getSipCode(),
            $dto->getSipReason(),
            $dto->getLocaltime());

        return $self
            ->setSrcIp($dto->getSrcIp())
            ->setFromUser($dto->getFromUser())
            ->setFromDomain($dto->getFromDomain())
            ->setRuriUser($dto->getRuriUser())
            ->setRuriDomain($dto->getRuriDomain())
            ->setCseq($dto->getCseq())
            ->setUtctime($dto->getUtctime())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersMissedCallDTO
         */
        Assertion::isInstanceOf($dto, UsersMissedCallDTO::class);

        $this
            ->setMethod($dto->getMethod())
            ->setFromTag($dto->getFromTag())
            ->setToTag($dto->getToTag())
            ->setCallid($dto->getCallid())
            ->setSipCode($dto->getSipCode())
            ->setSipReason($dto->getSipReason())
            ->setSrcIp($dto->getSrcIp())
            ->setFromUser($dto->getFromUser())
            ->setFromDomain($dto->getFromDomain())
            ->setRuriUser($dto->getRuriUser())
            ->setRuriDomain($dto->getRuriDomain())
            ->setCseq($dto->getCseq())
            ->setLocaltime($dto->getLocaltime())
            ->setUtctime($dto->getUtctime());


        return $this;
    }

    /**
     * @return UsersMissedCallDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setMethod($this->getMethod())
            ->setFromTag($this->getFromTag())
            ->setToTag($this->getToTag())
            ->setCallid($this->getCallid())
            ->setSipCode($this->getSipCode())
            ->setSipReason($this->getSipReason())
            ->setSrcIp($this->getSrcIp())
            ->setFromUser($this->getFromUser())
            ->setFromDomain($this->getFromDomain())
            ->setRuriUser($this->getRuriUser())
            ->setRuriDomain($this->getRuriDomain())
            ->setCseq($this->getCseq())
            ->setLocaltime($this->getLocaltime())
            ->setUtctime($this->getUtctime())
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'method' => $this->getMethod(),
            'fromTag' => $this->getFromTag(),
            'toTag' => $this->getToTag(),
            'callid' => $this->getCallid(),
            'sipCode' => $this->getSipCode(),
            'sipReason' => $this->getSipReason(),
            'srcIp' => $this->getSrcIp(),
            'fromUser' => $this->getFromUser(),
            'fromDomain' => $this->getFromDomain(),
            'ruriUser' => $this->getRuriUser(),
            'ruriDomain' => $this->getRuriDomain(),
            'cseq' => $this->getCseq(),
            'localtime' => $this->getLocaltime(),
            'utctime' => $this->getUtctime(),
            'id' => $this->getId()
        ];
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


}

