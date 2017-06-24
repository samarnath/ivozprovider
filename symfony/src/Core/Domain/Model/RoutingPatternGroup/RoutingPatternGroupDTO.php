<?php

namespace Core\Domain\Model\RoutingPatternGroup;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class RoutingPatternGroupDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var array|null
     */
    private $relPatterns = null;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'relPatternsId' => $this->getRelPatternsId(),
            'brandId' => $this->getBrandId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setRelPatterns(isset($data['relPatterns']) ? $data['relPatterns'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $items = $this->getRelPatterns();
        $this->relPatterns = [];
        foreach ($items as $item) {
            $this->relPatterns[] = $transformer->transform(
                'Core\\Domain\\Model\\RoutingPatternGroupsRelPattern\\RoutingPatternGroupsRelPattern',
                $item
            );
        }

        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->relPatterns = $transformer->transform(
            'Core\\Domain\\Model\\RoutingPatternGroupsRelPattern\\RoutingPatternGroupsRelPattern',
            $this->relPatterns
        );
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
     * @return \Core\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }
}

