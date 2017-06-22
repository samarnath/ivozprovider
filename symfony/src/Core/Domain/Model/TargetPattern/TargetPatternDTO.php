<?php

namespace Core\Domain\Model\TargetPattern;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class TargetPatternDTO implements DataTransferObjectInterface
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
     * @column name_en
     * @var string
     */
    private $nameEn;

    /**
     * @column name_es
     * @var string
     */
    private $nameEs;

    /**
     * @var string
     */
    private $description;

    /**
     * @column description_en
     * @var string
     */
    private $descriptionEn;

    /**
     * @column description_es
     * @var string
     */
    private $descriptionEs;

    /**
     * @var string
     */
    private $regExp;

    /**
     * @var mixed
     */
    private $brandId;

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
            'nameEn' => $this->getNameEn(),
            'nameEs' => $this->getNameEs(),
            'description' => $this->getDescription(),
            'descriptionEn' => $this->getDescriptionEn(),
            'descriptionEs' => $this->getDescriptionEs(),
            'regExp' => $this->getRegExp(),
            'brandId' => $this->getBrandId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setNameEn(isset($data['nameEn']) ? $data['nameEn'] : null)
            ->setNameEs(isset($data['nameEs']) ? $data['nameEs'] : null)
            ->setDescription(isset($data['description']) ? $data['description'] : null)
            ->setDescriptionEn(isset($data['descriptionEn']) ? $data['descriptionEn'] : null)
            ->setDescriptionEs(isset($data['descriptionEs']) ? $data['descriptionEs'] : null)
            ->setRegExp(isset($data['regExp']) ? $data['regExp'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\BrandInterface', $this->getBrandId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return TargetPatternDTO
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
     * @return TargetPatternDTO
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
     * @param string $nameEn
     *
     * @return TargetPatternDTO
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * @param string $nameEs
     *
     * @return TargetPatternDTO
     */
    public function setNameEs($nameEs)
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * @param string $description
     *
     * @return TargetPatternDTO
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
     * @param string $descriptionEn
     *
     * @return TargetPatternDTO
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * @param string $descriptionEs
     *
     * @return TargetPatternDTO
     */
    public function setDescriptionEs($descriptionEs)
    {
        $this->descriptionEs = $descriptionEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionEs()
    {
        return $this->descriptionEs;
    }

    /**
     * @param string $regExp
     *
     * @return TargetPatternDTO
     */
    public function setRegExp($regExp)
    {
        $this->regExp = $regExp;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * @param integer $brandId
     *
     * @return TargetPatternDTO
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
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }
}

