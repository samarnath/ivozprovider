<?php

namespace Ivoz\Domain\Model\ExternalCallFilterBlackList;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class ExternalCallFilterBlackListDTO implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $filterId;

    /**
     * @var mixed
     */
    private $matchListId;

    /**
     * @var mixed
     */
    private $filter;

    /**
     * @var mixed
     */
    private $matchList;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'id' => $this->getId(),
            'filterId' => $this->getFilterId(),
            'matchListId' => $this->getMatchListId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->filter = $transformer->transform('Ivoz\\Domain\\Model\\ExternalCallFilter\\ExternalCallFilter', $this->getFilterId());
        $this->matchList = $transformer->transform('Ivoz\\Domain\\Model\\MatchList\\MatchList', $this->getMatchListId());
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
     * @return ExternalCallFilterBlackListDTO
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
     * @param integer $filterId
     *
     * @return ExternalCallFilterBlackListDTO
     */
    public function setFilterId($filterId)
    {
        $this->filterId = $filterId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFilterId()
    {
        return $this->filterId;
    }

    /**
     * @return \Ivoz\Domain\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param integer $matchListId
     *
     * @return ExternalCallFilterBlackListDTO
     */
    public function setMatchListId($matchListId)
    {
        $this->matchListId = $matchListId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchListId()
    {
        return $this->matchListId;
    }

    /**
     * @return \Ivoz\Domain\Model\MatchList\MatchList
     */
    public function getMatchList()
    {
        return $this->matchList;
    }
}

