<?php

namespace Core\Domain\Model\BrandURL;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * BrandURL
 */
class BrandURL implements EntityInterface, BrandURLInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $klearTheme = '';

    /**
     * @comment enum:god|brand|admin|user
     * @var string
     */
    protected $urlType;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @comment FSO
     * @var integer
     */
    protected $logoFileSize;

    /**
     * @var string
     */
    protected $logoMimeType;

    /**
     * @var string
     */
    protected $logoBaseName;

    /**
     * @var string
     */
    protected $userTheme = '';

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($url, $urlType)
    {
        $this->setUrl($url);
        $this->setUrlType($urlType);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return BrandURLDTO
     */
    public static function createDTO()
    {
        return new BrandURLDTO();
    }

    /**
     * Factory method
     * @param BrandURLDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, BrandURLDTO::class);

        $self = new self(
            $dto->getUrl(),
            $dto->getUrlType()
        );

        return $self
            ->setKlearTheme($dto->getKlearTheme())
            ->setName($dto->getName())
            ->setLogoFileSize($dto->getLogoFileSize())
            ->setLogoMimeType($dto->getLogoMimeType())
            ->setLogoBaseName($dto->getLogoBaseName())
            ->setUserTheme($dto->getUserTheme())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param BrandURLDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, BrandURLDTO::class);

        $this
            ->setUrl($dto->getUrl())
            ->setKlearTheme($dto->getKlearTheme())
            ->setUrlType($dto->getUrlType())
            ->setName($dto->getName())
            ->setLogoFileSize($dto->getLogoFileSize())
            ->setLogoMimeType($dto->getLogoMimeType())
            ->setLogoBaseName($dto->getLogoBaseName())
            ->setUserTheme($dto->getUserTheme())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return BrandURLDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setUrl($this->getUrl())
            ->setKlearTheme($this->getKlearTheme())
            ->setUrlType($this->getUrlType())
            ->setName($this->getName())
            ->setLogoFileSize($this->getLogoFileSize())
            ->setLogoMimeType($this->getLogoMimeType())
            ->setLogoBaseName($this->getLogoBaseName())
            ->setUserTheme($this->getUserTheme())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
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
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
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
     * Set url
     *
     * @param string $url
     *
     * @return BrandURL
     */
    protected function setUrl($url)
    {
        Assertion::notNull($url);
        Assertion::maxLength($url, 255);

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
     * Set klearTheme
     *
     * @param string $klearTheme
     *
     * @return BrandURL
     */
    protected function setKlearTheme($klearTheme = null)
    {
        if (!is_null($klearTheme)) {
            Assertion::maxLength($klearTheme, 200);
        }

        $this->klearTheme = $klearTheme;

        return $this;
    }

    /**
     * Get klearTheme
     *
     * @return string
     */
    public function getKlearTheme()
    {
        return $this->klearTheme;
    }

    /**
     * Set urlType
     *
     * @param string $urlType
     *
     * @return BrandURL
     */
    protected function setUrlType($urlType)
    {
        Assertion::notNull($urlType);
        Assertion::maxLength($urlType, 25);
        Assertion::choice($urlType, array (
          0 => 'god',
          1 => 'brand',
          2 => 'admin',
          3 => 'user',
        ));

        $this->urlType = $urlType;

        return $this;
    }

    /**
     * Get urlType
     *
     * @return string
     */
    public function getUrlType()
    {
        return $this->urlType;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return BrandURL
     */
    protected function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 200);
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set logoFileSize
     *
     * @param integer $logoFileSize
     *
     * @return BrandURL
     */
    protected function setLogoFileSize($logoFileSize = null)
    {
        if (!is_null($logoFileSize)) {
            if (!is_null($logoFileSize)) {
                Assertion::integerish($logoFileSize);
                Assertion::greaterOrEqualThan($logoFileSize, 0);
            }
        }

        $this->logoFileSize = $logoFileSize;

        return $this;
    }

    /**
     * Get logoFileSize
     *
     * @return integer
     */
    public function getLogoFileSize()
    {
        return $this->logoFileSize;
    }

    /**
     * Set logoMimeType
     *
     * @param string $logoMimeType
     *
     * @return BrandURL
     */
    protected function setLogoMimeType($logoMimeType = null)
    {
        if (!is_null($logoMimeType)) {
            Assertion::maxLength($logoMimeType, 80);
        }

        $this->logoMimeType = $logoMimeType;

        return $this;
    }

    /**
     * Get logoMimeType
     *
     * @return string
     */
    public function getLogoMimeType()
    {
        return $this->logoMimeType;
    }

    /**
     * Set logoBaseName
     *
     * @param string $logoBaseName
     *
     * @return BrandURL
     */
    protected function setLogoBaseName($logoBaseName = null)
    {
        if (!is_null($logoBaseName)) {
            Assertion::maxLength($logoBaseName, 255);
        }

        $this->logoBaseName = $logoBaseName;

        return $this;
    }

    /**
     * Get logoBaseName
     *
     * @return string
     */
    public function getLogoBaseName()
    {
        return $this->logoBaseName;
    }

    /**
     * Set userTheme
     *
     * @param string $userTheme
     *
     * @return BrandURL
     */
    protected function setUserTheme($userTheme = null)
    {
        if (!is_null($userTheme)) {
            Assertion::maxLength($userTheme, 200);
        }

        $this->userTheme = $userTheme;

        return $this;
    }

    /**
     * Get userTheme
     *
     * @return string
     */
    public function getUserTheme()
    {
        return $this->userTheme;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return BrandURL
     */
    public function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Core\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }



    // @codeCoverageIgnoreEnd
}

