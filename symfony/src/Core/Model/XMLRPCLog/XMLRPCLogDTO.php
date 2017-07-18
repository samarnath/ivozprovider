<?php

namespace Core\Model\XMLRPCLog;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class XMLRPCLogDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $proxy;

    /**
     * @var string
     */
    public $module;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $mapperName;

    /**
     * @var \DateTime
     */
    public $startDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    public $execDate;

    /**
     * @var \DateTime
     */
    public $finishDate;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'proxy' => $this->getProxy(),
            'module' => $this->getModule(),
            'method' => $this->getMethod(),
            'mapperName' => $this->getMapperName(),
            'startDate' => $this->getStartDate(),
            'execDate' => $this->getExecDate(),
            'finishDate' => $this->getFinishDate()
        ];
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $dto = new self();
        return $dto
            ->setId(isset($data['id']) ? $data['id'] : null)
            ->setProxy(isset($data['proxy']) ? $data['proxy'] : null)
            ->setModule(isset($data['module']) ? $data['module'] : null)
            ->setMethod(isset($data['method']) ? $data['method'] : null)
            ->setMapperName(isset($data['mapperName']) ? $data['mapperName'] : null)
            ->setStartDate(isset($data['startDate']) ? $data['startDate'] : null)
            ->setExecDate(isset($data['execDate']) ? $data['execDate'] : null)
            ->setFinishDate(isset($data['finishDate']) ? $data['finishDate'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return XMLRPCLogDTO
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
     * @param string $proxy
     *
     * @return XMLRPCLogDTO
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param string $module
     *
     * @return XMLRPCLogDTO
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param string $method
     *
     * @return XMLRPCLogDTO
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $mapperName
     *
     * @return XMLRPCLogDTO
     */
    public function setMapperName($mapperName)
    {
        $this->mapperName = $mapperName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMapperName()
    {
        return $this->mapperName;
    }

    /**
     * @param \DateTime $startDate
     *
     * @return XMLRPCLogDTO
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $execDate
     *
     * @return XMLRPCLogDTO
     */
    public function setExecDate($execDate = null)
    {
        $this->execDate = $execDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExecDate()
    {
        return $this->execDate;
    }

    /**
     * @param \DateTime $finishDate
     *
     * @return XMLRPCLogDTO
     */
    public function setFinishDate($finishDate = null)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }
}

