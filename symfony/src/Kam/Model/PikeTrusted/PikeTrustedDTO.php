<?php

namespace Kam\Model\PikeTrusted;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class PikeTrustedDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @column src_ip
     * @var string
     */
    public $srcIp;

    /**
     * @var string
     */
    public $proto;

    /**
     * @column from_pattern
     * @var string
     */
    public $fromPattern;

    /**
     * @column ruri_pattern
     * @var string
     */
    public $ruriPattern;

    /**
     * @var string
     */
    public $tag;

    /**
     * @var integer
     */
    public $priority = '0';

    /**
     * @return array
     */
    public function __toArray()
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

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setSrcIp(isset($data['srcIp']) ? $data['srcIp'] : null)
            ->setProto(isset($data['proto']) ? $data['proto'] : null)
            ->setFromPattern(isset($data['fromPattern']) ? $data['fromPattern'] : null)
            ->setRuriPattern(isset($data['ruriPattern']) ? $data['ruriPattern'] : null)
            ->setTag(isset($data['tag']) ? $data['tag'] : null)
            ->setPriority(isset($data['priority']) ? $data['priority'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PikeTrustedDTO
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
     * @param string $srcIp
     *
     * @return PikeTrustedDTO
     */
    public function setSrcIp($srcIp = null)
    {
        $this->srcIp = $srcIp;

        return $this;
    }

    /**
     * @return string
     */
    public function getSrcIp()
    {
        return $this->srcIp;
    }

    /**
     * @param string $proto
     *
     * @return PikeTrustedDTO
     */
    public function setProto($proto = null)
    {
        $this->proto = $proto;

        return $this;
    }

    /**
     * @return string
     */
    public function getProto()
    {
        return $this->proto;
    }

    /**
     * @param string $fromPattern
     *
     * @return PikeTrustedDTO
     */
    public function setFromPattern($fromPattern = null)
    {
        $this->fromPattern = $fromPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromPattern()
    {
        return $this->fromPattern;
    }

    /**
     * @param string $ruriPattern
     *
     * @return PikeTrustedDTO
     */
    public function setRuriPattern($ruriPattern = null)
    {
        $this->ruriPattern = $ruriPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuriPattern()
    {
        return $this->ruriPattern;
    }

    /**
     * @param string $tag
     *
     * @return PikeTrustedDTO
     */
    public function setTag($tag = null)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param integer $priority
     *
     * @return PikeTrustedDTO
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }
}

