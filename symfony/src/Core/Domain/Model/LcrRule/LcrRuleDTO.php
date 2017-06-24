<?php

namespace Core\Domain\Model\LcrRule;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class LcrRuleDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @column lcr_id
     * @var integer
     */
    private $lcrId = '1';

    /**
     * @var string
     */
    private $prefix;

    /**
     * @column from_uri
     * @var string
     */
    private $fromUri;

    /**
     * @column request_uri
     * @var string
     */
    private $requestUri;

    /**
     * @var integer
     */
    private $stopper = '0';

    /**
     * @var integer
     */
    private $enabled = '1';

    /**
     * @var string
     */
    private $tag;

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var mixed
     */
    private $routingPatternId;

    /**
     * @var mixed
     */
    private $outgoingRoutingId;

    /**
     * @var mixed
     */
    private $routingPattern;

    /**
     * @var mixed
     */
    private $outgoingRouting;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'lcrId' => $this->getLcrId(),
            'prefix' => $this->getPrefix(),
            'fromUri' => $this->getFromUri(),
            'requestUri' => $this->getRequestUri(),
            'stopper' => $this->getStopper(),
            'enabled' => $this->getEnabled(),
            'tag' => $this->getTag(),
            'description' => $this->getDescription(),
            'routingPatternId' => $this->getRoutingPatternId(),
            'outgoingRoutingId' => $this->getOutgoingRoutingId()
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
            ->setLcrId(isset($data['lcrId']) ? $data['lcrId'] : null)
            ->setPrefix(isset($data['prefix']) ? $data['prefix'] : null)
            ->setFromUri(isset($data['fromUri']) ? $data['fromUri'] : null)
            ->setRequestUri(isset($data['requestUri']) ? $data['requestUri'] : null)
            ->setStopper(isset($data['stopper']) ? $data['stopper'] : null)
            ->setEnabled(isset($data['enabled']) ? $data['enabled'] : null)
            ->setTag(isset($data['tag']) ? $data['tag'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setRoutingPatternId(isset($data['routingPatternId']) ? $data['routingPatternId'] : null)
            ->setOutgoingRoutingId(isset($data['outgoingRoutingId']) ? $data['outgoingRoutingId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->routingPattern = $transformer->transform('Core\\Domain\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
        $this->outgoingRouting = $transformer->transform('Core\\Domain\\Model\\OutgoingRouting\\OutgoingRouting', $this->getOutgoingRoutingId());
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
     * @return LcrRuleDTO
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
     * @param integer $lcrId
     *
     * @return LcrRuleDTO
     */
    public function setLcrId($lcrId)
    {
        $this->lcrId = $lcrId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLcrId()
    {
        return $this->lcrId;
    }

    /**
     * @param string $prefix
     *
     * @return LcrRuleDTO
     */
    public function setPrefix($prefix = null)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $fromUri
     *
     * @return LcrRuleDTO
     */
    public function setFromUri($fromUri = null)
    {
        $this->fromUri = $fromUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromUri()
    {
        return $this->fromUri;
    }

    /**
     * @param string $requestUri
     *
     * @return LcrRuleDTO
     */
    public function setRequestUri($requestUri = null)
    {
        $this->requestUri = $requestUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @param integer $stopper
     *
     * @return LcrRuleDTO
     */
    public function setStopper($stopper)
    {
        $this->stopper = $stopper;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStopper()
    {
        return $this->stopper;
    }

    /**
     * @param integer $enabled
     *
     * @return LcrRuleDTO
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param string $tag
     *
     * @return LcrRuleDTO
     */
    public function setTag($tag)
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
     * @param string $description
     *
     * @return LcrRuleDTO
     */
    public function setDescription($description)
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
     * @param integer $routingPatternId
     *
     * @return LcrRuleDTO
     */
    public function setRoutingPatternId($routingPatternId)
    {
        $this->routingPatternId = $routingPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRoutingPatternId()
    {
        return $this->routingPatternId;
    }

    /**
     * @return \Core\Domain\Model\RoutingPattern\RoutingPattern
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * @param integer $outgoingRoutingId
     *
     * @return LcrRuleDTO
     */
    public function setOutgoingRoutingId($outgoingRoutingId)
    {
        $this->outgoingRoutingId = $outgoingRoutingId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingRoutingId()
    {
        return $this->outgoingRoutingId;
    }

    /**
     * @return \Core\Domain\Model\OutgoingRouting\OutgoingRouting
     */
    public function getOutgoingRouting()
    {
        return $this->outgoingRouting;
    }
}

