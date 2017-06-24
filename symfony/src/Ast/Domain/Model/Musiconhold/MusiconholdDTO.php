<?php

namespace Ast\Domain\Model\Musiconhold;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class MusiconholdDTO implements DataTransferObjectInterface
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
    private $mode;

    /**
     * @var string
     */
    private $directory;

    /**
     * @var string
     */
    private $application;

    /**
     * @var string
     */
    private $digit;

    /**
     * @var string
     */
    private $sort;

    /**
     * @var string
     */
    private $format;

    /**
     * @var \DateTime
     */
    private $stamp;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'mode' => $this->getMode(),
            'directory' => $this->getDirectory(),
            'application' => $this->getApplication(),
            'digit' => $this->getDigit(),
            'sort' => $this->getSort(),
            'format' => $this->getFormat(),
            'stamp' => $this->getStamp()
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
            ->setMode(isset($data['mode']) ? $data['mode'] : null)
            ->setDirectory(isset($data['directory']) ? $data['directory'] : null)
            ->setApplication(isset($data['application']) ? $data['application'] : null)
            ->setDigit(isset($data['digit']) ? $data['digit'] : null)
            ->setSort(isset($data['sort']) ? $data['sort'] : null)
            ->setFormat(isset($data['format']) ? $data['format'] : null)
            ->setStamp(isset($data['stamp']) ? $data['stamp'] : null);
    }
     */

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

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
     * @return MusiconholdDTO
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
     * @return MusiconholdDTO
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
     * @param string $mode
     *
     * @return MusiconholdDTO
     */
    public function setMode($mode = null)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $directory
     *
     * @return MusiconholdDTO
     */
    public function setDirectory($directory = null)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * @param string $application
     *
     * @return MusiconholdDTO
     */
    public function setApplication($application = null)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param string $digit
     *
     * @return MusiconholdDTO
     */
    public function setDigit($digit = null)
    {
        $this->digit = $digit;

        return $this;
    }

    /**
     * @return string
     */
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * @param string $sort
     *
     * @return MusiconholdDTO
     */
    public function setSort($sort = null)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $format
     *
     * @return MusiconholdDTO
     */
    public function setFormat($format = null)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param \DateTime $stamp
     *
     * @return MusiconholdDTO
     */
    public function setStamp($stamp = null)
    {
        $this->stamp = $stamp;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }
}

