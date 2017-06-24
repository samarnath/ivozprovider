<?php

namespace Core\Domain\Model\BrandURL;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class BrandURLDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $klearTheme = '';

    /**
     * @var string
     */
    private $urlType;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var integer
     */
    private $logoFileSize;

    /**
     * @var string
     */
    private $logoMimeType;

    /**
     * @var string
     */
    private $logoBaseName;

    /**
     * @var string
     */
    private $userTheme = '';

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
            'url' => $this->getUrl(),
            'klearTheme' => $this->getKlearTheme(),
            'urlType' => $this->getUrlType(),
            'name' => $this->getName(),
            'logoFileSize' => $this->getLogoFileSize(),
            'logoMimeType' => $this->getLogoMimeType(),
            'logoBaseName' => $this->getLogoBaseName(),
            'userTheme' => $this->getUserTheme(),
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
            ->setUrl(isset($data['url']) ? $data['url'] : null)
            ->setKlearTheme(isset($data['klearTheme']) ? $data['klearTheme'] : null)
            ->setUrlType(isset($data['urlType']) ? $data['urlType'] : null)
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setLogoFileSize(isset($data['logoFileSize']) ? $data['logoFileSize'] : null)
            ->setLogoMimeType(isset($data['logoMimeType']) ? $data['logoMimeType'] : null)
            ->setLogoBaseName(isset($data['logoBaseName']) ? $data['logoBaseName'] : null)
            ->setUserTheme(isset($data['userTheme']) ? $data['userTheme'] : null)
            ->setBrandId(isset($data['brandId']) ? $data['brandId'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Core\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
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
     * @return BrandURLDTO
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
     * @param string $url
     *
     * @return BrandURLDTO
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
     * @param string $klearTheme
     *
     * @return BrandURLDTO
     */
    public function setKlearTheme($klearTheme = null)
    {
        $this->klearTheme = $klearTheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getKlearTheme()
    {
        return $this->klearTheme;
    }

    /**
     * @param string $urlType
     *
     * @return BrandURLDTO
     */
    public function setUrlType($urlType)
    {
        $this->urlType = $urlType;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrlType()
    {
        return $this->urlType;
    }

    /**
     * @param string $name
     *
     * @return BrandURLDTO
     */
    public function setName($name = null)
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
     * @param integer $logoFileSize
     *
     * @return BrandURLDTO
     */
    public function setLogoFileSize($logoFileSize = null)
    {
        $this->logoFileSize = $logoFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLogoFileSize()
    {
        return $this->logoFileSize;
    }

    /**
     * @param string $logoMimeType
     *
     * @return BrandURLDTO
     */
    public function setLogoMimeType($logoMimeType = null)
    {
        $this->logoMimeType = $logoMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoMimeType()
    {
        return $this->logoMimeType;
    }

    /**
     * @param string $logoBaseName
     *
     * @return BrandURLDTO
     */
    public function setLogoBaseName($logoBaseName = null)
    {
        $this->logoBaseName = $logoBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoBaseName()
    {
        return $this->logoBaseName;
    }

    /**
     * @param string $userTheme
     *
     * @return BrandURLDTO
     */
    public function setUserTheme($userTheme = null)
    {
        $this->userTheme = $userTheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserTheme()
    {
        return $this->userTheme;
    }

    /**
     * @param integer $brandId
     *
     * @return BrandURLDTO
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

