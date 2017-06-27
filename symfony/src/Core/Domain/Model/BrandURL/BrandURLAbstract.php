<?php

namespace Core\Domain\Model\BrandURL;

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
     * @var \Core\Domain\Model\BrandURL\Logo
     */
    protected $logo;

    /**
     * @var \Core\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    abstract public function __wakeup();

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
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
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

