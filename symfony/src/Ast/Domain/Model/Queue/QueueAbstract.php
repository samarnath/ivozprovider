<?php

namespace Ast\Domain\Model\Queue;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * QueueAbstract
 */
abstract class QueueAbstract
{
    /**
     * @column periodic_announce
     * @var string
     */
    protected $periodicAnnounce;

    /**
     * @column periodic_announce_frequency
     * @var integer
     */
    protected $periodicAnnounceFrequency;

    /**
     * @var integer
     */
    protected $timeout;

    /**
     * @var string
     */
    protected $autopause = 'no';

    /**
     * @var string
     */
    protected $ringinuse = 'no';

    /**
     * @var integer
     */
    protected $wrapuptime;

    /**
     * @var integer
     */
    protected $maxlen;

    /**
     * @var string
     */
    protected $strategy;

    /**
     * @var integer
     */
    protected $weight;

    /**
     * @var \Ivoz\Domain\Model\Queue\QueueInterface
     */
    protected $queue;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($autopause, $ringinuse)
    {
        $this->setAutopause($autopause);
        $this->setRinginuse($ringinuse);
    }

    abstract public function __wakeup();

    /**
     * @return QueueDTO
     */
    public static function createDTO()
    {
        return new QueueDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueDTO
         */
        Assertion::isInstanceOf($dto, QueueDTO::class);

        $self = new static(
            $dto->getAutopause(),
            $dto->getRinginuse());

        return $self
            ->setPeriodicAnnounce($dto->getPeriodicAnnounce())
            ->setPeriodicAnnounceFrequency($dto->getPeriodicAnnounceFrequency())
            ->setTimeout($dto->getTimeout())
            ->setWrapuptime($dto->getWrapuptime())
            ->setMaxlen($dto->getMaxlen())
            ->setStrategy($dto->getStrategy())
            ->setWeight($dto->getWeight())
            ->setQueue($dto->getQueue())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueDTO
         */
        Assertion::isInstanceOf($dto, QueueDTO::class);

        $this
            ->setPeriodicAnnounce($dto->getPeriodicAnnounce())
            ->setPeriodicAnnounceFrequency($dto->getPeriodicAnnounceFrequency())
            ->setTimeout($dto->getTimeout())
            ->setAutopause($dto->getAutopause())
            ->setRinginuse($dto->getRinginuse())
            ->setWrapuptime($dto->getWrapuptime())
            ->setMaxlen($dto->getMaxlen())
            ->setStrategy($dto->getStrategy())
            ->setWeight($dto->getWeight())
            ->setQueue($dto->getQueue());


        return $this;
    }

    /**
     * @return QueueDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setPeriodicAnnounce($this->getPeriodicAnnounce())
            ->setPeriodicAnnounceFrequency($this->getPeriodicAnnounceFrequency())
            ->setTimeout($this->getTimeout())
            ->setAutopause($this->getAutopause())
            ->setRinginuse($this->getRinginuse())
            ->setWrapuptime($this->getWrapuptime())
            ->setMaxlen($this->getMaxlen())
            ->setStrategy($this->getStrategy())
            ->setWeight($this->getWeight())
            ->setQueueId($this->getQueue() ? $this->getQueue()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'periodicAnnounce' => $this->getPeriodicAnnounce(),
            'periodicAnnounceFrequency' => $this->getPeriodicAnnounceFrequency(),
            'timeout' => $this->getTimeout(),
            'autopause' => $this->getAutopause(),
            'ringinuse' => $this->getRinginuse(),
            'wrapuptime' => $this->getWrapuptime(),
            'maxlen' => $this->getMaxlen(),
            'strategy' => $this->getStrategy(),
            'weight' => $this->getWeight(),
            'queueId' => $this->getQueue() ? $this->getQueue()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set periodicAnnounce
     *
     * @param string $periodicAnnounce
     *
     * @return self
     */
    protected function setPeriodicAnnounce($periodicAnnounce = null)
    {
        if (!is_null($periodicAnnounce)) {
            Assertion::maxLength($periodicAnnounce, 128);
        }

        $this->periodicAnnounce = $periodicAnnounce;

        return $this;
    }

    /**
     * Get periodicAnnounce
     *
     * @return string
     */
    public function getPeriodicAnnounce()
    {
        return $this->periodicAnnounce;
    }

    /**
     * Set periodicAnnounceFrequency
     *
     * @param integer $periodicAnnounceFrequency
     *
     * @return self
     */
    protected function setPeriodicAnnounceFrequency($periodicAnnounceFrequency = null)
    {
        if (!is_null($periodicAnnounceFrequency)) {
            if (!is_null($periodicAnnounceFrequency)) {
                Assertion::integerish($periodicAnnounceFrequency);
            }
        }

        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;

        return $this;
    }

    /**
     * Get periodicAnnounceFrequency
     *
     * @return integer
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * Set timeout
     *
     * @param integer $timeout
     *
     * @return self
     */
    protected function setTimeout($timeout = null)
    {
        if (!is_null($timeout)) {
            if (!is_null($timeout)) {
                Assertion::integerish($timeout);
            }
        }

        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get timeout
     *
     * @return integer
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set autopause
     *
     * @param string $autopause
     *
     * @return self
     */
    protected function setAutopause($autopause)
    {
        Assertion::notNull($autopause);

        $this->autopause = $autopause;

        return $this;
    }

    /**
     * Get autopause
     *
     * @return string
     */
    public function getAutopause()
    {
        return $this->autopause;
    }

    /**
     * Set ringinuse
     *
     * @param string $ringinuse
     *
     * @return self
     */
    protected function setRinginuse($ringinuse)
    {
        Assertion::notNull($ringinuse);

        $this->ringinuse = $ringinuse;

        return $this;
    }

    /**
     * Get ringinuse
     *
     * @return string
     */
    public function getRinginuse()
    {
        return $this->ringinuse;
    }

    /**
     * Set wrapuptime
     *
     * @param integer $wrapuptime
     *
     * @return self
     */
    protected function setWrapuptime($wrapuptime = null)
    {
        if (!is_null($wrapuptime)) {
            if (!is_null($wrapuptime)) {
                Assertion::integerish($wrapuptime);
            }
        }

        $this->wrapuptime = $wrapuptime;

        return $this;
    }

    /**
     * Get wrapuptime
     *
     * @return integer
     */
    public function getWrapuptime()
    {
        return $this->wrapuptime;
    }

    /**
     * Set maxlen
     *
     * @param integer $maxlen
     *
     * @return self
     */
    protected function setMaxlen($maxlen = null)
    {
        if (!is_null($maxlen)) {
            if (!is_null($maxlen)) {
                Assertion::integerish($maxlen);
            }
        }

        $this->maxlen = $maxlen;

        return $this;
    }

    /**
     * Get maxlen
     *
     * @return integer
     */
    public function getMaxlen()
    {
        return $this->maxlen;
    }

    /**
     * Set strategy
     *
     * @param string $strategy
     *
     * @return self
     */
    protected function setStrategy($strategy = null)
    {
        if (!is_null($strategy)) {
        }

        $this->strategy = $strategy;

        return $this;
    }

    /**
     * Get strategy
     *
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    protected function setWeight($weight = null)
    {
        if (!is_null($weight)) {
            if (!is_null($weight)) {
                Assertion::integerish($weight);
            }
        }

        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set queue
     *
     * @param \Ivoz\Domain\Model\Queue\QueueInterface $queue
     *
     * @return self
     */
    protected function setQueue(\Ivoz\Domain\Model\Queue\QueueInterface $queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Ivoz\Domain\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }



    // @codeCoverageIgnoreEnd
}

