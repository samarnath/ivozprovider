<?php

namespace Core\Application\DTO;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class AstQueueDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @column periodic_announce
     * @var string
     */
    public $periodicAnnounce;

    /**
     * @column periodic_announce_frequency
     * @var integer
     */
    public $periodicAnnounceFrequency;

    /**
     * @var integer
     */
    public $timeout;

    /**
     * @var string
     */
    public $autopause = 'no';

    /**
     * @var string
     */
    public $ringinuse = 'no';

    /**
     * @var integer
     */
    public $wrapuptime;

    /**
     * @var integer
     */
    public $maxlen;

    /**
     * @var string
     */
    public $strategy;

    /**
     * @var integer
     */
    public $weight;

    /**
     * @var mixed
     */
    public $queueId;

    /**
     * @var mixed
     */
    public $queue;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'name' => $this->getName(),
            'periodicAnnounce' => $this->getPeriodicAnnounce(),
            'periodicAnnounceFrequency' => $this->getPeriodicAnnounceFrequency(),
            'timeout' => $this->getTimeout(),
            'autopause' => $this->getAutopause(),
            'ringinuse' => $this->getRinginuse(),
            'wrapuptime' => $this->getWrapuptime(),
            'maxlen' => $this->getMaxlen(),
            'strategy' => $this->getStrategy(),
            'weight' => $this->getWeight(),
            'queueId' => $this->getQueueId()
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
            ->setName(isset($data['name']) ? $data['name'] : null)
            ->setPeriodicAnnounce(isset($data['periodicAnnounce']) ? $data['periodicAnnounce'] : null)
            ->setPeriodicAnnounceFrequency(isset($data['periodicAnnounceFrequency']) ? $data['periodicAnnounceFrequency'] : null)
            ->setTimeout(isset($data['timeout']) ? $data['timeout'] : null)
            ->setAutopause(isset($data['autopause']) ? $data['autopause'] : null)
            ->setRinginuse(isset($data['ringinuse']) ? $data['ringinuse'] : null)
            ->setWrapuptime(isset($data['wrapuptime']) ? $data['wrapuptime'] : null)
            ->setMaxlen(isset($data['maxlen']) ? $data['maxlen'] : null)
            ->setStrategy(isset($data['strategy']) ? $data['strategy'] : null)
            ->setWeight(isset($data['weight']) ? $data['weight'] : null)
            ->setQueueId(isset($data['queueId']) ? $data['queueId'] : null);
    }

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->queue = $transformer->transform('Core\\Model\\Queue\\Queue', $this->getQueueId());
    }

    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return AstQueueDTO
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
     * @param string $periodicAnnounce
     *
     * @return AstQueueDTO
     */
    public function setPeriodicAnnounce($periodicAnnounce = null)
    {
        $this->periodicAnnounce = $periodicAnnounce;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeriodicAnnounce()
    {
        return $this->periodicAnnounce;
    }

    /**
     * @param integer $periodicAnnounceFrequency
     *
     * @return AstQueueDTO
     */
    public function setPeriodicAnnounceFrequency($periodicAnnounceFrequency = null)
    {
        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * @param integer $timeout
     *
     * @return AstQueueDTO
     */
    public function setTimeout($timeout = null)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param string $autopause
     *
     * @return AstQueueDTO
     */
    public function setAutopause($autopause)
    {
        $this->autopause = $autopause;

        return $this;
    }

    /**
     * @return string
     */
    public function getAutopause()
    {
        return $this->autopause;
    }

    /**
     * @param string $ringinuse
     *
     * @return AstQueueDTO
     */
    public function setRinginuse($ringinuse)
    {
        $this->ringinuse = $ringinuse;

        return $this;
    }

    /**
     * @return string
     */
    public function getRinginuse()
    {
        return $this->ringinuse;
    }

    /**
     * @param integer $wrapuptime
     *
     * @return AstQueueDTO
     */
    public function setWrapuptime($wrapuptime = null)
    {
        $this->wrapuptime = $wrapuptime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWrapuptime()
    {
        return $this->wrapuptime;
    }

    /**
     * @param integer $maxlen
     *
     * @return AstQueueDTO
     */
    public function setMaxlen($maxlen = null)
    {
        $this->maxlen = $maxlen;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxlen()
    {
        return $this->maxlen;
    }

    /**
     * @param string $strategy
     *
     * @return AstQueueDTO
     */
    public function setStrategy($strategy = null)
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param integer $weight
     *
     * @return AstQueueDTO
     */
    public function setWeight($weight = null)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param integer $queueId
     *
     * @return AstQueueDTO
     */
    public function setQueueId($queueId)
    {
        $this->queueId = $queueId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * @return \Core\Model\Queue\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }
}

