<?php

namespace Core\Model\MusicOnHold;

use Assert\Assertion;
use Core\Application\DTO\MusicOnHoldDTO;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * MusicOnHold
 */
class MusicOnHold implements EntityInterface
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
     * @comment FSO:keepExtension
     * @var integer
     */
    protected $originalFileFileSize;

    /**
     * @var string
     */
    protected $originalFileMimeType;

    /**
     * @var string
     */
    protected $originalFileBaseName;

    /**
     * @comment FSO:keepExtension|storeInBaseFolder
     * @var integer
     */
    protected $encodedFileFileSize;

    /**
     * @var string
     */
    protected $encodedFileMimeType;

    /**
     * @var string
     */
    protected $encodedFileBaseName;

    /**
     * @comment enum:pending|encoding|ready|error
     * @var string
     */
    protected $status;

    /**
     * @var \Core\Model\Company\Company
     */
    protected $company;


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
     * @return MusicOnHoldDTO
     */
    public static function createDTO()
    {
        return new MusicOnHoldDTO();
    }

    /**
     * Factory method
     * @param MusicOnHoldDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, MusicOnHoldDTO::class);

        $self = new self(
            $dto->getName()
        );

        return $self
            ->setOriginalFileFileSize($dto->getOriginalFileFileSize())
            ->setOriginalFileMimeType($dto->getOriginalFileMimeType())
            ->setOriginalFileBaseName($dto->getOriginalFileBaseName())
            ->setEncodedFileFileSize($dto->getEncodedFileFileSize())
            ->setEncodedFileMimeType($dto->getEncodedFileMimeType())
            ->setEncodedFileBaseName($dto->getEncodedFileBaseName())
            ->setStatus($dto->getStatus())
            ->setCompany($dto->getCompany());
    }

    /**
     * @param MusicOnHoldDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, MusicOnHoldDTO::class);

        $this
            ->setName($dto->getName())
            ->setOriginalFileFileSize($dto->getOriginalFileFileSize())
            ->setOriginalFileMimeType($dto->getOriginalFileMimeType())
            ->setOriginalFileBaseName($dto->getOriginalFileBaseName())
            ->setEncodedFileFileSize($dto->getEncodedFileFileSize())
            ->setEncodedFileMimeType($dto->getEncodedFileMimeType())
            ->setEncodedFileBaseName($dto->getEncodedFileBaseName())
            ->setStatus($dto->getStatus())
            ->setCompany($dto->getCompany());


        return $this;
    }

    /**
     * @return MusicOnHoldDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setOriginalFileFileSize($this->getOriginalFileFileSize())
            ->setOriginalFileMimeType($this->getOriginalFileMimeType())
            ->setOriginalFileBaseName($this->getOriginalFileBaseName())
            ->setEncodedFileFileSize($this->getEncodedFileFileSize())
            ->setEncodedFileMimeType($this->getEncodedFileMimeType())
            ->setEncodedFileBaseName($this->getEncodedFileBaseName())
            ->setStatus($this->getStatus())
            ->setCompanyId($this->getCompany() ? $this->getCompany()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'originalFileFileSize' => $this->getOriginalFileFileSize(),
            'originalFileMimeType' => $this->getOriginalFileMimeType(),
            'originalFileBaseName' => $this->getOriginalFileBaseName(),
            'encodedFileFileSize' => $this->getEncodedFileFileSize(),
            'encodedFileMimeType' => $this->getEncodedFileMimeType(),
            'encodedFileBaseName' => $this->getEncodedFileBaseName(),
            'status' => $this->getStatus(),
            'companyId' => $this->getCompany() ? $this->getCompany()->getId() : null
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
     * @return MusicOnHold
     */
    protected function setName($name)
    {
        Assertion::notNull($name);
        Assertion::maxLength($name, 50);

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
     * Set originalFileFileSize
     *
     * @param integer $originalFileFileSize
     *
     * @return MusicOnHold
     */
    protected function setOriginalFileFileSize($originalFileFileSize = null)
    {
        if (!is_null($originalFileFileSize)) {
            if (!is_null($originalFileFileSize)) {
                Assertion::integerish($originalFileFileSize);
                Assertion::greaterOrEqualThan($originalFileFileSize, 0);
            }
        }

        $this->originalFileFileSize = $originalFileFileSize;

        return $this;
    }

    /**
     * Get originalFileFileSize
     *
     * @return integer
     */
    public function getOriginalFileFileSize()
    {
        return $this->originalFileFileSize;
    }

    /**
     * Set originalFileMimeType
     *
     * @param string $originalFileMimeType
     *
     * @return MusicOnHold
     */
    protected function setOriginalFileMimeType($originalFileMimeType = null)
    {
        if (!is_null($originalFileMimeType)) {
            Assertion::maxLength($originalFileMimeType, 80);
        }

        $this->originalFileMimeType = $originalFileMimeType;

        return $this;
    }

    /**
     * Get originalFileMimeType
     *
     * @return string
     */
    public function getOriginalFileMimeType()
    {
        return $this->originalFileMimeType;
    }

    /**
     * Set originalFileBaseName
     *
     * @param string $originalFileBaseName
     *
     * @return MusicOnHold
     */
    protected function setOriginalFileBaseName($originalFileBaseName = null)
    {
        if (!is_null($originalFileBaseName)) {
            Assertion::maxLength($originalFileBaseName, 255);
        }

        $this->originalFileBaseName = $originalFileBaseName;

        return $this;
    }

    /**
     * Get originalFileBaseName
     *
     * @return string
     */
    public function getOriginalFileBaseName()
    {
        return $this->originalFileBaseName;
    }

    /**
     * Set encodedFileFileSize
     *
     * @param integer $encodedFileFileSize
     *
     * @return MusicOnHold
     */
    protected function setEncodedFileFileSize($encodedFileFileSize = null)
    {
        if (!is_null($encodedFileFileSize)) {
            if (!is_null($encodedFileFileSize)) {
                Assertion::integerish($encodedFileFileSize);
                Assertion::greaterOrEqualThan($encodedFileFileSize, 0);
            }
        }

        $this->encodedFileFileSize = $encodedFileFileSize;

        return $this;
    }

    /**
     * Get encodedFileFileSize
     *
     * @return integer
     */
    public function getEncodedFileFileSize()
    {
        return $this->encodedFileFileSize;
    }

    /**
     * Set encodedFileMimeType
     *
     * @param string $encodedFileMimeType
     *
     * @return MusicOnHold
     */
    protected function setEncodedFileMimeType($encodedFileMimeType = null)
    {
        if (!is_null($encodedFileMimeType)) {
            Assertion::maxLength($encodedFileMimeType, 80);
        }

        $this->encodedFileMimeType = $encodedFileMimeType;

        return $this;
    }

    /**
     * Get encodedFileMimeType
     *
     * @return string
     */
    public function getEncodedFileMimeType()
    {
        return $this->encodedFileMimeType;
    }

    /**
     * Set encodedFileBaseName
     *
     * @param string $encodedFileBaseName
     *
     * @return MusicOnHold
     */
    protected function setEncodedFileBaseName($encodedFileBaseName = null)
    {
        if (!is_null($encodedFileBaseName)) {
            Assertion::maxLength($encodedFileBaseName, 255);
        }

        $this->encodedFileBaseName = $encodedFileBaseName;

        return $this;
    }

    /**
     * Get encodedFileBaseName
     *
     * @return string
     */
    public function getEncodedFileBaseName()
    {
        return $this->encodedFileBaseName;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return MusicOnHold
     */
    protected function setStatus($status = null)
    {
        if (!is_null($status)) {
            Assertion::maxLength($status, 20);
        Assertion::choice($status, array (
          0 => '    pending',
          1 => '    encoding',
          2 => '    ready',
          3 => '    error',
        ));
        }

        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set company
     *
     * @param \Core\Model\Company\Company $company
     *
     * @return MusicOnHold
     */
    protected function setCompany(\Core\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Core\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

