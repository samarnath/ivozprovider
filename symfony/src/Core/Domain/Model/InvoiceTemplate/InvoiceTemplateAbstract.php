<?php

namespace Core\Domain\Model\InvoiceTemplate;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * InvoiceTemplateAbstract
 */
abstract class InvoiceTemplateAbstract implements EntityInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $templateHeader;

    /**
     * @var string
     */
    protected $templateFooter;

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
    public function __construct($name, $template)
    {
        $this->setName($name);
        $this->setTemplate($template);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return InvoiceTemplateDTO
     */
    public static function createDTO()
    {
        return new InvoiceTemplateDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto InvoiceTemplateDTO
         */
        Assertion::isInstanceOf($dto, InvoiceTemplateDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getTemplate()
        );

        return $self
            ->setDescription($dto->getDescription())
            ->setTemplateHeader($dto->getTemplateHeader())
            ->setTemplateFooter($dto->getTemplateFooter())
            ->setBrand($dto->getBrand());
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return static
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto InvoiceTemplateDTO
         */
        Assertion::isInstanceOf($dto, InvoiceTemplateDTO::class);

        $this
            ->setName($dto->getName())
            ->setDescription($dto->getDescription())
            ->setTemplate($dto->getTemplate())
            ->setTemplateHeader($dto->getTemplateHeader())
            ->setTemplateFooter($dto->getTemplateFooter())
            ->setBrand($dto->getBrand());


        return $this;
    }

    /**
     * @return InvoiceTemplateDTO
     */
    public function toDTO()
    {
        return static::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setDescription($this->getDescription())
            ->setTemplate($this->getTemplate())
            ->setTemplateHeader($this->getTemplateHeader())
            ->setTemplateFooter($this->getTemplateFooter())
            ->setBrandId($this->getBrand() ? $this->getBrand()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'template' => $this->getTemplate(),
            'templateHeader' => $this->getTemplateHeader(),
            'templateFooter' => $this->getTemplateFooter(),
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
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 55);

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
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 300);
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set template
     *
     * @param string $template
     *
     * @return self
     */
    protected function setTemplate($template)
    {
        Assertion::notNull($template);
        Assertion::maxLength($template, 65535);

        $this->template = $template;

        return $this;
    }

    /**
     * Get template
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set templateHeader
     *
     * @param string $templateHeader
     *
     * @return self
     */
    protected function setTemplateHeader($templateHeader = null)
    {
        if (!is_null($templateHeader)) {
            Assertion::maxLength($templateHeader, 65535);
        }

        $this->templateHeader = $templateHeader;

        return $this;
    }

    /**
     * Get templateHeader
     *
     * @return string
     */
    public function getTemplateHeader()
    {
        return $this->templateHeader;
    }

    /**
     * Set templateFooter
     *
     * @param string $templateFooter
     *
     * @return self
     */
    protected function setTemplateFooter($templateFooter = null)
    {
        if (!is_null($templateFooter)) {
            Assertion::maxLength($templateFooter, 65535);
        }

        $this->templateFooter = $templateFooter;

        return $this;
    }

    /**
     * Get templateFooter
     *
     * @return string
     */
    public function getTemplateFooter()
    {
        return $this->templateFooter;
    }

    /**
     * Set brand
     *
     * @param \Core\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    protected function setBrand(\Core\Domain\Model\Brand\BrandInterface $brand)
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

