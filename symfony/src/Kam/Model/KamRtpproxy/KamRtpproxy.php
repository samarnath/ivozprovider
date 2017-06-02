<?php

namespace Kam\Model\KamRtpproxy;

use Assert\Assertion;
use Kam\Application\DTO\KamRtpproxyDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * KamRtpproxy
 */
class KamRtpproxy implements EntityInterface
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
     * @var \Core\Model\MediaRelaySet\MediaRelaySet
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
     * @return KamRtpproxyDTO
     */
    public static function createDTO()
    {
        return new KamRtpproxyDTO();
    }

    /**
     * Factory method
     * @param KamRtpproxyDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamRtpproxyDTO::class);

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
     * @param KamRtpproxyDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, KamRtpproxyDTO::class);

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
     * @return KamRtpproxyDTO
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
     * @return KamRtpproxy
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
     * @return KamRtpproxy
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
     * @return KamRtpproxy
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
     * @return KamRtpproxy
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
     * @return KamRtpproxy
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
     * @param \Core\Model\MediaRelaySet\MediaRelaySet $mediaRelaySet
     *
     * @return KamRtpproxy
     */
    protected function setMediaRelaySet(\Core\Model\MediaRelaySet\MediaRelaySet $mediaRelaySet = null)
    {
        $this->mediaRelaySet = $mediaRelaySet;

        return $this;
    }

    /**
     * Get mediaRelaySet
     *
     * @return \Core\Model\MediaRelaySet\MediaRelaySet
     */
    public function getMediaRelaySet()
    {
        return $this->mediaRelaySet;
    }



    // @codeCoverageIgnoreEnd
}

