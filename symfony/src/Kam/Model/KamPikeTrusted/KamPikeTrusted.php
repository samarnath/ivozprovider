<?php

namespace Kam\Model\KamPikeTrusted;

use Assert\Assertion;
use Kam\Application\DTO\KamPikeTrustedDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * KamPikeTrusted
 */
class KamPikeTrusted implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @column src_ip
     * @var string
     */
    protected $srcIp;

    /**
     * @var string
     */
    protected $proto;

    /**
     * @column from_pattern
     * @var string
     */
    protected $fromPattern;

    /**
     * @column ruri_pattern
     * @var string
     */
    protected $ruriPattern;

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var integer
     */
    protected $priority = '0';


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($priority)
    {
        $this->setPriority($priority);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return KamPikeTrustedDTO
     */
    public static function createDTO()
    {
        return new KamPikeTrustedDTO();
    }

    /**
     * Factory method
     * @param KamPikeTrustedDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamPikeTrustedDTO::class);

        $self = new self(
            $dto->getPriority()
        );

        return $self
            ->setSrcIp($dto->getSrcIp())
            ->setProto($dto->getProto())
            ->setFromPattern($dto->getFromPattern())
            ->setRuriPattern($dto->getRuriPattern())
            ->setTag($dto->getTag());
    }

    /**
     * @param KamPikeTrustedDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamPikeTrustedDTO::class);

        $this
            ->setSrcIp($dto->getSrcIp())
            ->setProto($dto->getProto())
            ->setFromPattern($dto->getFromPattern())
            ->setRuriPattern($dto->getRuriPattern())
            ->setTag($dto->getTag())
            ->setPriority($dto->getPriority());


        return $this;
    }

    /**
     * @return KamPikeTrustedDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setSrcIp($this->getSrcIp())
            ->setProto($this->getProto())
            ->setFromPattern($this->getFromPattern())
            ->setRuriPattern($this->getRuriPattern())
            ->setTag($this->getTag())
            ->setPriority($this->getPriority());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'srcIp' => $this->getSrcIp(),
            'proto' => $this->getProto(),
            'fromPattern' => $this->getFromPattern(),
            'ruriPattern' => $this->getRuriPattern(),
            'tag' => $this->getTag(),
            'priority' => $this->getPriority()
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
     * Set srcIp
     *
     * @param string $srcIp
     *
     * @return KamPikeTrusted
     */
    protected function setSrcIp($srcIp = null)
    {
        if (!is_null($srcIp)) {
            Assertion::maxLength($srcIp, 50);
        }

        $this->srcIp = $srcIp;

        return $this;
    }

    /**
     * Get srcIp
     *
     * @return string
     */
    public function getSrcIp()
    {
        return $this->srcIp;
    }

    /**
     * Set proto
     *
     * @param string $proto
     *
     * @return KamPikeTrusted
     */
    protected function setProto($proto = null)
    {
        if (!is_null($proto)) {
            Assertion::maxLength($proto, 4);
        }

        $this->proto = $proto;

        return $this;
    }

    /**
     * Get proto
     *
     * @return string
     */
    public function getProto()
    {
        return $this->proto;
    }

    /**
     * Set fromPattern
     *
     * @param string $fromPattern
     *
     * @return KamPikeTrusted
     */
    protected function setFromPattern($fromPattern = null)
    {
        if (!is_null($fromPattern)) {
            Assertion::maxLength($fromPattern, 64);
        }

        $this->fromPattern = $fromPattern;

        return $this;
    }

    /**
     * Get fromPattern
     *
     * @return string
     */
    public function getFromPattern()
    {
        return $this->fromPattern;
    }

    /**
     * Set ruriPattern
     *
     * @param string $ruriPattern
     *
     * @return KamPikeTrusted
     */
    protected function setRuriPattern($ruriPattern = null)
    {
        if (!is_null($ruriPattern)) {
            Assertion::maxLength($ruriPattern, 64);
        }

        $this->ruriPattern = $ruriPattern;

        return $this;
    }

    /**
     * Get ruriPattern
     *
     * @return string
     */
    public function getRuriPattern()
    {
        return $this->ruriPattern;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return KamPikeTrusted
     */
    protected function setTag($tag = null)
    {
        if (!is_null($tag)) {
            Assertion::maxLength($tag, 64);
        }

        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return KamPikeTrusted
     */
    protected function setPriority($priority)
    {
        Assertion::notNull($priority);
        Assertion::integerish($priority);

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }



    // @codeCoverageIgnoreEnd
}

