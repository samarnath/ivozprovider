<?php

namespace Kam\Model\TrunksAddres;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * TrunksAddres
 */
class TrunksAddres implements EntityInterface, TrunksAddresInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $grp = '1';

    /**
     * @column ip_addr
     * @var string
     */
    protected $ipAddr;

    /**
     * @var integer
     */
    protected $mask = '32';

    /**
     * @var integer
     */
    protected $port = '0';

    /**
     * @var string
     */
    protected $tag;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($grp, $mask, $port)
    {
        $this->setGrp($grp);
        $this->setMask($mask);
        $this->setPort($port);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return TrunksAddresDTO
     */
    public static function createDTO()
    {
        return new TrunksAddresDTO();
    }

    /**
     * Factory method
     * @param TrunksAddresDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TrunksAddresDTO::class);

        $self = new self(
            $dto->getGrp(),
            $dto->getMask(),
            $dto->getPort()
        );

        return $self
            ->setIpAddr($dto->getIpAddr())
            ->setTag($dto->getTag());
    }

    /**
     * @param TrunksAddresDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, TrunksAddresDTO::class);

        $this
            ->setGrp($dto->getGrp())
            ->setIpAddr($dto->getIpAddr())
            ->setMask($dto->getMask())
            ->setPort($dto->getPort())
            ->setTag($dto->getTag());


        return $this;
    }

    /**
     * @return TrunksAddresDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setGrp($this->getGrp())
            ->setIpAddr($this->getIpAddr())
            ->setMask($this->getMask())
            ->setPort($this->getPort())
            ->setTag($this->getTag());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'grp' => $this->getGrp(),
            'ipAddr' => $this->getIpAddr(),
            'mask' => $this->getMask(),
            'port' => $this->getPort(),
            'tag' => $this->getTag()
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
     * Set grp
     *
     * @param integer $grp
     *
     * @return TrunksAddres
     */
    protected function setGrp($grp)
    {
        Assertion::notNull($grp);
        Assertion::integerish($grp);
        Assertion::greaterOrEqualThan($grp, 0);

        $this->grp = $grp;

        return $this;
    }

    /**
     * Get grp
     *
     * @return integer
     */
    public function getGrp()
    {
        return $this->grp;
    }

    /**
     * Set ipAddr
     *
     * @param string $ipAddr
     *
     * @return TrunksAddres
     */
    protected function setIpAddr($ipAddr = null)
    {
        if (!is_null($ipAddr)) {
            Assertion::maxLength($ipAddr, 50);
        }

        $this->ipAddr = $ipAddr;

        return $this;
    }

    /**
     * Get ipAddr
     *
     * @return string
     */
    public function getIpAddr()
    {
        return $this->ipAddr;
    }

    /**
     * Set mask
     *
     * @param integer $mask
     *
     * @return TrunksAddres
     */
    protected function setMask($mask)
    {
        Assertion::notNull($mask);
        Assertion::integerish($mask);

        $this->mask = $mask;

        return $this;
    }

    /**
     * Get mask
     *
     * @return integer
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Set port
     *
     * @param integer $port
     *
     * @return TrunksAddres
     */
    protected function setPort($port)
    {
        Assertion::notNull($port);
        Assertion::integerish($port);

        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return TrunksAddres
     */
    protected function setTag($tag = null)
    {
        if (!is_null($tag)) {
            Assertion::maxLength($tag, 64);
        }

        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }



    // @codeCoverageIgnoreEnd
}

