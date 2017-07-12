<?php

namespace Ivoz\Domain\Model\RoutingPatternGroup;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class RoutingPatternGroupDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var array|null
     */
    private $relPatterns = null;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'id' => $this->getId(),
            'brandId' => $this->getBrandId(),
            'relPatternsId' => $this->getRelPatternsId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $items = $this->getRelPatterns();
        $this->relPatterns = [];
        foreach ($items as $item) {
            $this->relPatterns[] = $transformer->transform(
                'Ivoz\\Domain\\Model\\RoutingPatternGroupsRelPattern\\RoutingPatternGroupsRelPattern',
                $item
            );
        }

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->relPatterns = $transformer->transform(
            'Ivoz\\Domain\\Model\\RoutingPatternGroupsRelPattern\\RoutingPatternGroupsRelPattern',
            $this->relPatterns
        );
    }

    /**
     * @param string $name
     *
     * @return RoutingPatternGroupDTO
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return RoutingPatternGroupDTO
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
     * @param integer $id
     *
     * @return RoutingPatternGroupDTO
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
     * @param integer $brandId
     *
     * @return RoutingPatternGroupDTO
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Ivoz\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param array $relPatterns
     *
     * @return RoutingPatternGroupDTO
     */
    public function setRelPatterns($relPatterns)
    {
        $this->relPatterns = $relPatterns;

        return $this;
    }

    /**
     * @return array
     */
    public function getRelPatterns()
    {
        return $this->relPatterns;
    }
}

