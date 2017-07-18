<?php

namespace Ivoz\Domain\Model\ExternalCallFilterWhiteList;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilterWhiteListAbstract
 */
abstract class ExternalCallFilterWhiteListAbstract
{
    /**
     * @var \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    protected $filter;

    /**
     * @var \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    protected $matchlist;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    abstract public function __wakeup();

    /**
     * @return ExternalCallFilterWhiteListDTO
     */
    public static function createDTO()
    {
        return new ExternalCallFilterWhiteListDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterWhiteListDTO
         */
        Assertion::isInstanceOf($dto, ExternalCallFilterWhiteListDTO::class);

        $self = new static();

        return $self
            ->setFilter($dto->getFilter())
            ->setMatchlist($dto->getMatchlist())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterWhiteListDTO
         */
        Assertion::isInstanceOf($dto, ExternalCallFilterWhiteListDTO::class);

        $this
            ->setFilter($dto->getFilter())
            ->setMatchlist($dto->getMatchlist());


        return $this;
    }

    /**
     * @return ExternalCallFilterWhiteListDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setFilterId($this->getFilter() ? $this->getFilter()->getId() : null)
            ->setMatchlistId($this->getMatchlist() ? $this->getMatchlist()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'filterId' => $this->getFilter() ? $this->getFilter()->getId() : null,
            'matchlistId' => $this->getMatchlist() ? $this->getMatchlist()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set filter
     *
     * @param \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $filter
     *
     * @return self
     */
    protected function setFilter(\Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set matchlist
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchlist
     *
     * @return self
     */
    protected function setMatchlist(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchlist)
    {
        $this->matchlist = $matchlist;

        return $this;
    }

    /**
     * Get matchlist
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchlist()
    {
        return $this->matchlist;
    }



    // @codeCoverageIgnoreEnd
}

