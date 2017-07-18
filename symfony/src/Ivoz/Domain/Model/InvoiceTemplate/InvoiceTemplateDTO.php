<?php

namespace Ivoz\Domain\Model\InvoiceTemplate;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class InvoiceTemplateDTO implements DataTransferObjectInterface
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
     * @var string
     */
    private $template;

    /**
     * @var string
     */
    private $templateHeader;

    /**
     * @var string
     */
    private $templateFooter;

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
     * @return array
     */
    public function __toArray()
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'template' => $this->getTemplate(),
            'templateHeader' => $this->getTemplateHeader(),
            'templateFooter' => $this->getTemplateFooter(),
            'id' => $this->getId(),
            'brandId' => $this->getBrandId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return InvoiceTemplateDTO
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
     * @return InvoiceTemplateDTO
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
     * @param string $template
     *
     * @return InvoiceTemplateDTO
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $templateHeader
     *
     * @return InvoiceTemplateDTO
     */
    public function setTemplateHeader($templateHeader = null)
    {
        $this->templateHeader = $templateHeader;

        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateHeader()
    {
        return $this->templateHeader;
    }

    /**
     * @param string $templateFooter
     *
     * @return InvoiceTemplateDTO
     */
    public function setTemplateFooter($templateFooter = null)
    {
        $this->templateFooter = $templateFooter;

        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateFooter()
    {
        return $this->templateFooter;
    }

    /**
     * @param integer $id
     *
     * @return InvoiceTemplateDTO
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
     * @return InvoiceTemplateDTO
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
}

