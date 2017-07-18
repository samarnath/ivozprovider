<?php

namespace Ivoz\Domain\Model\MatchListPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * MatchListPatternAbstract
 */
abstract class MatchListPatternAbstract
{
    /**
     * @var string
     */
    protected $description;

    /**
     * @comment enum:number|regexp
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $regexp;

    /**
     * @var string
     */
    protected $numbervalue;

    /**
     * @var \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    protected $matchList;

    /**
     * @var \Ivoz\Domain\Model\Country\CountryInterface
     */
    protected $MatchListPattern;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($type)
    {
        $this->setType($type);
    }

    abstract public function __wakeup();

    /**
     * @return MatchListPatternDTO
     */
    public static function createDTO()
    {
        return new MatchListPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MatchListPatternDTO
         */
        Assertion::isInstanceOf($dto, MatchListPatternDTO::class);

        $self = new static(
            $dto->getType());

        return $self
            ->setDescription($dto->getDescription())
            ->setRegexp($dto->getRegexp())
            ->setNumbervalue($dto->getNumbervalue())
            ->setMatchList($dto->getMatchList())
            ->setMatchListPattern($dto->getMatchListPattern())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MatchListPatternDTO
         */
        Assertion::isInstanceOf($dto, MatchListPatternDTO::class);

        $this
            ->setDescription($dto->getDescription())
            ->setType($dto->getType())
            ->setRegexp($dto->getRegexp())
            ->setNumbervalue($dto->getNumbervalue())
            ->setMatchList($dto->getMatchList())
            ->setMatchListPattern($dto->getMatchListPattern());


        return $this;
    }

    /**
     * @return MatchListPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setDescription($this->getDescription())
            ->setType($this->getType())
            ->setRegexp($this->getRegexp())
            ->setNumbervalue($this->getNumbervalue())
            ->setMatchListId($this->getMatchList() ? $this->getMatchList()->getId() : null)
            ->setMatchListPatternId($this->getMatchListPattern() ? $this->getMatchListPattern()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'description' => $this->getDescription(),
            'type' => $this->getType(),
            'regexp' => $this->getRegexp(),
            'numbervalue' => $this->getNumbervalue(),
            'matchListId' => $this->getMatchList() ? $this->getMatchList()->getId() : null,
            'matchListPatternId' => $this->getMatchListPattern() ? $this->getMatchListPattern()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    protected function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 55);
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    protected function setType($type)
    {
        Assertion::notNull($type);
        Assertion::maxLength($type, 10);
        Assertion::choice($type, array (
          0 => 'number',
          1 => 'regexp',
        ));

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set regexp
     *
     * @param string $regexp
     *
     * @return self
     */
    protected function setRegexp($regexp = null)
    {
        if (!is_null($regexp)) {
            Assertion::maxLength($regexp, 255);
        }

        $this->regexp = $regexp;

        return $this;
    }

    /**
     * Get regexp
     *
     * @return string
     */
    public function getRegexp()
    {
        return $this->regexp;
    }

    /**
     * Set numbervalue
     *
     * @param string $numbervalue
     *
     * @return self
     */
    protected function setNumbervalue($numbervalue = null)
    {
        if (!is_null($numbervalue)) {
            Assertion::maxLength($numbervalue, 25);
        }

        $this->numbervalue = $numbervalue;

        return $this;
    }

    /**
     * Get numbervalue
     *
     * @return string
     */
    public function getNumbervalue()
    {
        return $this->numbervalue;
    }

    /**
     * Set matchList
     *
     * @param \Ivoz\Domain\Model\MatchList\MatchListInterface $matchList
     *
     * @return self
     */
    protected function setMatchList(\Ivoz\Domain\Model\MatchList\MatchListInterface $matchList)
    {
        $this->matchList = $matchList;

        return $this;
    }

    /**
     * Get matchList
     *
     * @return \Ivoz\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList()
    {
        return $this->matchList;
    }

    /**
     * Set matchListPattern
     *
     * @param \Ivoz\Domain\Model\Country\CountryInterface $matchListPattern
     *
     * @return self
     */
    protected function setMatchListPattern(\Ivoz\Domain\Model\Country\CountryInterface $matchListPattern = null)
    {
        $this->MatchListPattern = $matchListPattern;

        return $this;
    }

    /**
     * Get matchListPattern
     *
     * @return \Ivoz\Domain\Model\Country\CountryInterface
     */
    public function getMatchListPattern()
    {
        return $this->MatchListPattern;
    }



    // @codeCoverageIgnoreEnd
}

