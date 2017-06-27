<?php

namespace Core\Domain\Model\XMLRPCLog;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * XMLRPCLog
 */
class XMLRPCLog extends XMLRPCLogAbstract implements XMLRPCLogInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct(
        $proxy,
        $module,
        $method,
        $mapperName,
        $startDate
    ) {
        $this->setProxy($proxy);
        $this->setModule($module);
        $this->setMethod($method);
        $this->setMapperName($mapperName);
        $this->setStartDate($startDate);
    }

    public function __wakeup()
    {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
    }

    /**
     * @return XMLRPCLogDTO
     */
    public static function createDTO()
    {
        return new XMLRPCLogDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto XMLRPCLogDTO
         */
        Assertion::isInstanceOf($dto, XMLRPCLogDTO::class);

        $self = new self(
            $dto->getProxy(),
            $dto->getModule(),
            $dto->getMethod(),
            $dto->getMapperName(),
            $dto->getStartDate());

        return $self
            ->setExecDate($dto->getExecDate())
            ->setFinishDate($dto->getFinishDate())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto XMLRPCLogDTO
         */
        Assertion::isInstanceOf($dto, XMLRPCLogDTO::class);

        $this
            ->setProxy($dto->getProxy())
            ->setModule($dto->getModule())
            ->setMethod($dto->getMethod())
            ->setMapperName($dto->getMapperName())
            ->setStartDate($dto->getStartDate())
            ->setExecDate($dto->getExecDate())
            ->setFinishDate($dto->getFinishDate());


        return $this;
    }

    /**
     * @return XMLRPCLogDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setProxy($this->getProxy())
            ->setModule($this->getModule())
            ->setMethod($this->getMethod())
            ->setMapperName($this->getMapperName())
            ->setStartDate($this->getStartDate())
            ->setExecDate($this->getExecDate())
            ->setFinishDate($this->getFinishDate())
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'proxy' => $this->getProxy(),
            'module' => $this->getModule(),
            'method' => $this->getMethod(),
            'mapperName' => $this->getMapperName(),
            'startDate' => $this->getStartDate(),
            'execDate' => $this->getExecDate(),
            'finishDate' => $this->getFinishDate(),
            'id' => $this->getId()
        ];
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


}

