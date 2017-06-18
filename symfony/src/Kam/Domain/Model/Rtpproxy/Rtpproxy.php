<?php

namespace Kam\Domain\Model\Rtpproxy;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * Rtpproxy
 */
class Rtpproxy
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $setid = '0';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var integer
     */
    protected $flags = '0';

    /**
     * @var integer
     */
    protected $weight = '1';

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \Core\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    protected $mediaRelaySet;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($setid, $url, $flags, $weight)
    {
        $this->setSetid($setid);
        $this->setUrl($url);
        $this->setFlags($flags);
        $this->setWeight($weight);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return RtpproxyDTO
     */
    public static function createDTO()
    {
        return new RtpproxyDTO();
    }

    /**
     * Factory method
     * @param RtpproxyDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RtpproxyDTO::class);

        $self = new self(
            $dto->getSetid(),
            $dto->getUrl(),
            $dto->getFlags(),
            $dto->getWeight()
        );

        return $self
            ->setDescription($dto->getDescription())
            ->setMediaRelaySet($dto->getMediaRelaySet());
    }

    /**
     * @param RtpproxyDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, RtpproxyDTO::class);

        $this
            ->setSetid($dto->getSetid())
            ->setUrl($dto->getUrl())
            ->setFlags($dto->getFlags())
            ->setWeight($dto->getWeight())
            ->setDescription($dto->getDescription())
            ->setMediaRelaySet($dto->getMediaRelaySet());


        return $this;
    }

    /**
     * @return RtpproxyDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setSetid($this->getSetid())
            ->setUrl($this->getUrl())
            ->setFlags($this->getFlags())
            ->setWeight($this->getWeight())
            ->setDescription($this->getDescription())
            ->setMediaRelaySetId($this->getMediaRelaySet() ? $this->getMediaRelaySet()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'setid' => $this->getSetid(),
            'url' => $this->getUrl(),
            'flags' => $this->getFlags(),
            'weight' => $this->getWeight(),
            'description' => $this->getDescription(),
            'mediaRelaySetId' => $this->getMediaRelaySet() ? $this->getMediaRelaySet()->getId() : null
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
     * Set setid
     *
     * @param string $setid
     *
     * @return Rtpproxy
     */
    protected function setSetid($setid)
    {
        Assertion::notNull($setid);
        Assertion::maxLength($setid, 32);

        $this->setid = $setid;

        return $this;
    }

    /**
     * Get setid
     *
     * @return string
     */
    public function getSetid()
    {
        return $this->setid;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Rtpproxy
     */
    protected function setUrl($url)
    {
        Assertion::notNull($url);
        Assertion::maxLength($url, 128);

        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set flags
     *
     * @param integer $flags
     *
     * @return Rtpproxy
     */
    protected function setFlags($flags)
    {
        Assertion::notNull($flags);
        Assertion::integerish($flags);
        Assertion::greaterOrEqualThan($flags, 0);

        $this->flags = $flags;

        return $this;
    }

    /**
     * Get flags
     *
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Rtpproxy
     */
    protected function setWeight($weight)
    {
        Assertion::notNull($weight);
        Assertion::integerish($weight);
        Assertion::greaterOrEqualThan($weight, 0);

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
     * Set description
     *
     * @param string $description
     *
     * @return Rtpproxy
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 200);
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set mediaRelaySet
     *
     * @param \Core\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySet
     *
     * @return Rtpproxy
     */
    protected function setMediaRelaySet(\Core\Domain\Model\MediaRelaySet\MediaRelaySetInterface $mediaRelaySet = null)
    {
        $this->mediaRelaySet = $mediaRelaySet;

        return $this;
    }

    /**
     * Get mediaRelaySet
     *
     * @return \Core\Domain\Model\MediaRelaySet\MediaRelaySetInterface
     */
    public function getMediaRelaySet()
    {
        return $this->mediaRelaySet;
    }



    // @codeCoverageIgnoreEnd
}

