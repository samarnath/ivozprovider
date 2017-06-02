<?php

namespace Ast\Model\AstMusiconhold;

use Assert\Assertion;
use Ast\Application\DTO\AstMusiconholdDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * AstMusiconhold
 */
class AstMusiconhold implements EntityInterface
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
    protected $mode;

    /**
     * @var string
     */
    protected $directory;

    /**
     * @var string
     */
    protected $application;

    /**
     * @var string
     */
    protected $digit;

    /**
     * @var string
     */
    protected $sort;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var \DateTime
     */
    protected $stamp;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return AstMusiconholdDTO
     */
    public static function createDTO()
    {
        return new AstMusiconholdDTO();
    }

    /**
     * Factory method
     * @param AstMusiconholdDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, AstMusiconholdDTO::class);

        $self = new self(
            $dto->getName()
        );

        return $self
            ->setMode($dto->getMode())
            ->setDirectory($dto->getDirectory())
            ->setApplication($dto->getApplication())
            ->setDigit($dto->getDigit())
            ->setSort($dto->getSort())
            ->setFormat($dto->getFormat())
            ->setStamp($dto->getStamp());
    }

    /**
     * @param AstMusiconholdDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, AstMusiconholdDTO::class);

        $this
            ->setName($dto->getName())
            ->setMode($dto->getMode())
            ->setDirectory($dto->getDirectory())
            ->setApplication($dto->getApplication())
            ->setDigit($dto->getDigit())
            ->setSort($dto->getSort())
            ->setFormat($dto->getFormat())
            ->setStamp($dto->getStamp());


        return $this;
    }

    /**
     * @return AstMusiconholdDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setMode($this->getMode())
            ->setDirectory($this->getDirectory())
            ->setApplication($this->getApplication())
            ->setDigit($this->getDigit())
            ->setSort($this->getSort())
            ->setFormat($this->getFormat())
            ->setStamp($this->getStamp());
    }

    /**
     * @return array
     */
    protected function __toArray()
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
     * @return AstMusiconhold
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 80);

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
     * Set mode
     *
     * @param string $mode
     *
     * @return AstMusiconhold
     */
    protected function setMode($mode = null)
    {
        if (!is_null($mode)) {
        }

        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set directory
     *
     * @param string $directory
     *
     * @return AstMusiconhold
     */
    protected function setDirectory($directory = null)
    {
        if (!is_null($directory)) {
            Assertion::maxLength($directory, 255);
        }

        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set application
     *
     * @param string $application
     *
     * @return AstMusiconhold
     */
    protected function setApplication($application = null)
    {
        if (!is_null($application)) {
            Assertion::maxLength($application, 255);
        }

        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set digit
     *
     * @param string $digit
     *
     * @return AstMusiconhold
     */
    protected function setDigit($digit = null)
    {
        if (!is_null($digit)) {
            Assertion::maxLength($digit, 1);
        }

        $this->digit = $digit;

        return $this;
    }

    /**
     * Get digit
     *
     * @return string
     */
    public function getDigit()
    {
        return $this->digit;
    }

    /**
     * Set sort
     *
     * @param string $sort
     *
     * @return AstMusiconhold
     */
    protected function setSort($sort = null)
    {
        if (!is_null($sort)) {
            Assertion::maxLength($sort, 10);
        }

        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return AstMusiconhold
     */
    protected function setFormat($format = null)
    {
        if (!is_null($format)) {
            Assertion::maxLength($format, 10);
        }

        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set stamp
     *
     * @param \DateTime $stamp
     *
     * @return AstMusiconhold
     */
    protected function setStamp($stamp = null)
    {
        if (!is_null($stamp)) {
        }

        $this->stamp = $stamp;

        return $this;
    }

    /**
     * Get stamp
     *
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }



    // @codeCoverageIgnoreEnd
}

