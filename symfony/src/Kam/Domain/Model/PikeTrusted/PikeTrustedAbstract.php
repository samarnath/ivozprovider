<?php

namespace Kam\Domain\Model\PikeTrusted;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PikeTrustedAbstract
 */
abstract class PikeTrustedAbstract
{
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

    abstract public function __wakeup();

    /**
     * @return PikeTrustedDTO
     */
    public static function createDTO()
    {
        return new PikeTrustedDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PikeTrustedDTO
         */
        Assertion::isInstanceOf($dto, PikeTrustedDTO::class);

        $self = new static(
            $dto->getPriority());

        return $self
            ->setSrcIp($dto->getSrcIp())
            ->setProto($dto->getProto())
            ->setFromPattern($dto->getFromPattern())
            ->setRuriPattern($dto->getRuriPattern())
            ->setTag($dto->getTag())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PikeTrustedDTO
         */
        Assertion::isInstanceOf($dto, PikeTrustedDTO::class);

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
     * @return PikeTrustedDTO
     */
    public function toDTO()
    {
        return self::createDTO()
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
     * Set srcIp
     *
     * @param string $srcIp
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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

