<?php

namespace Ivoz\Domain\Model\MatchListPattern;

use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
class MatchListPatternDTO implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $regexp;

    /**
     * @var string
     */
    private $numbervalue;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $matchListId;

    /**
     * @var mixed
     */
    private $MatchListPatternId;

    /**
     * @var mixed
     */
    private $matchList;

    /**
     * @var mixed
     */
    private $MatchListPattern;

    /**
     * @return array
     */
    public function __toArray()
    {
        return [
            'description' => $this->getDescription(),
            'type' => $this->getType(),
            'regexp' => $this->getRegexp(),
            'numbervalue' => $this->getNumbervalue(),
            'id' => $this->getId(),
            'matchListId' => $this->getMatchListId(),
            'matchListPatternId' => $this->getMatchListPatternId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->matchList = $transformer->transform('Ivoz\\Domain\\Model\\MatchList\\MatchList', $this->getMatchListId());
        $this->matchListPattern = $transformer->transform('Ivoz\\Domain\\Model\\Country\\Country', $this->getMatchListPatternId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $description
     *
     * @return MatchListPatternDTO
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $type
     *
     * @return MatchListPatternDTO
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $regexp
     *
     * @return MatchListPatternDTO
     */
    public function setRegexp($regexp = null)
    {
        $this->regexp = $regexp;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegexp()
    {
        return $this->regexp;
    }

    /**
     * @param string $numbervalue
     *
     * @return MatchListPatternDTO
     */
    public function setNumbervalue($numbervalue = null)
    {
        $this->numbervalue = $numbervalue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumbervalue()
    {
        return $this->numbervalue;
    }

    /**
     * @param integer $id
     *
     * @return MatchListPatternDTO
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
     * @param integer $matchListId
     *
     * @return MatchListPatternDTO
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

    /**
     * @param integer $matchListPatternId
     *
     * @return MatchListPatternDTO
     */
    public function setMatchListPatternId($matchListPatternId)
    {
        $this->MatchListPatternId = $matchListPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchListPatternId()
    {
        return $this->MatchListPatternId;
    }

    /**
     * @return \Ivoz\Domain\Model\Country\Country
     */
    public function getMatchListPattern()
    {
        return $this->MatchListPattern;
    }
}

