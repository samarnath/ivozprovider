<?php

namespace Ivoz\Domain\Model\BrandURL;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * BrandURLAbstract
 */
abstract class BrandURLAbstract
{
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
     * @var string
     */
    protected $userTheme = '';

    /**
     * @var Logo
     */
    protected $logo;

    /**
     * @var \Ivoz\Domain\Model\Brand\BrandInterface
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
    public function __construct($url, $urlType, Logo $logo)
    {
        $this->setUrl($url);
        $this->setUrlType($urlType);
        $this->setLogo($logo);
    }

    abstract public function __wakeup();

    /**
     * @return BrandURLDTO
     */
    public static function createDTO()
    {
        return new BrandURLDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandURLDTO
         */
        Assertion::isInstanceOf($dto, BrandURLDTO::class);

        $logo = new Logo(
            $dto->getLogoFileSize(),
            $dto->getLogoMimeType(),
            $dto->getLogoBaseName()
        );

        $self = new static(
            $dto->getUrl(),
            $dto->getUrlType(),
            $logo
        );

        return $self
            ->setKlearTheme($dto->getKlearTheme())
            ->setName($dto->getName())
            ->setUserTheme($dto->getUserTheme())
            ->setBrand($dto->getBrand())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandURLDTO
         */
        Assertion::isInstanceOf($dto, BrandURLDTO::class);

        $logo = new Logo(
            $dto->getLogoFileSize(),
            $dto->getLogoMimeType(),
            $dto->getLogoBaseName()
        );

        $this
            ->setUrl($dto->getUrl())
            ->setKlearTheme($dto->getKlearTheme())
            ->setUrlType($dto->getUrlType())
            ->setName($dto->getName())
            ->setUserTheme($dto->getUserTheme())
            ->setLogo($logo)
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return BrandURLDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setUrl($this->getUrl())
            ->setKlearTheme($this->getKlearTheme())
            ->setUrlType($this->getUrlType())
            ->setName($this->getName())
            ->setUserTheme($this->getUserTheme())
            ->setLogoFileSize($this->getLogo()->getFileSize())
            ->setLogoMimeType($this->getLogo()->getMimeType())
            ->setLogoBaseName($this->getLogo()->getBaseName())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'url' => $this->getUrl(),
            'klearTheme' => $this->getKlearTheme(),
            'urlType' => $this->getUrlType(),
            'name' => $this->getName(),
            'userTheme' => $this->getUserTheme(),
            'fileSize' => $this->getLogo()->getFileSize(),
            'mimeType' => $this->getLogo()->getMimeType(),
            'baseName' => $this->getLogo()->getBaseName(),
            'brandId' => $this->getBrand() ? $this->getBrand()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set url
     *
     * @param string $url
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * Set userTheme
     *
     * @param string $userTheme
     *
     * @return self
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
     * @param \Ivoz\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set logo
     *
     * @param Logo $logo
     *
     * @return self
     */
    protected function setLogo(Logo $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return Logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    // @codeCoverageIgnoreEnd
}

