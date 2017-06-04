<?php

namespace Kam\Model\Rtpproxy;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class RtpproxyDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $setid = '0';

    /**
     * @var string
     */
    public $url;

    /**
     * @var integer
     */
    public $flags = '0';

    /**
     * @var integer
     */
    public $weight = '1';

    /**
     * @var string
     */
    public $description;

    /**
     * @var mixed
     */
    public $mediaRelaySetId;

    /**
     * @var mixed
     */
    public $mediaRelaySet;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'setid' => $this->getSetid(),
            'url' => $this->getUrl(),
            'flags' => $this->getFlags(),
            'weight' => $this->getWeight(),
            'description' => $this->getDescription(),
            'mediaRelaySetId' => $this->getMediaRelaySetId()
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
            ->setSetid(isset($data['setid']) ? $data['setid'] : null)
            ->setUrl(isset($data['url']) ? $data['url'] : null)
            ->setFlags(isset($data['flags']) ? $data['flags'] : null)
            ->setWeight(isset($data['weight']) ? $data['weight'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setMediaRelaySetId(isset($data['mediaRelaySetId']) ? $data['mediaRelaySetId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->mediaRelaySet = $transformer->transform('Core\\Model\\MediaRelaySet\\MediaRelaySet', $this->getMediaRelaySetId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return RtpproxyDTO
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
     * @param string $setid
     *
     * @return RtpproxyDTO
     */
    public function setSetid($setid)
    {
        $this->setid = $setid;

        return $this;
    }

    /**
     * @return string
     */
    public function getSetid()
    {
        return $this->setid;
    }

    /**
     * @param string $url
     *
     * @return RtpproxyDTO
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param integer $flags
     *
     * @return RtpproxyDTO
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $weight
     *
     * @return RtpproxyDTO
     */
    public function setWeight($weight)
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
     * @param string $description
     *
     * @return RtpproxyDTO
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $mediaRelaySetId
     *
     * @return RtpproxyDTO
     */
    public function setMediaRelaySetId($mediaRelaySetId)
    {
        $this->mediaRelaySetId = $mediaRelaySetId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMediaRelaySetId()
    {
        return $this->mediaRelaySetId;
    }

    /**
     * @return \Core\Model\MediaRelaySet\MediaRelaySet
     */
    public function getMediaRelaySet()
    {
        return $this->mediaRelaySet;
    }
}

