<?php

namespace Core\Model\FriendsPattern;

use Assert\Assertion;
use Core\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FriendsPattern
 */
class FriendsPattern implements EntityInterface, FriendsPatternInterface
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
     * @var string
     */
    protected $regExp;

    /**
     * @var \Core\Model\Friend\Friend
     */
    protected $friend;


    /**
     * Changelog tracking purpose
     * @var array
     */
    protected $_initialValues = [];

    /**
     * Constructor
     */
    public function __construct($name, $regExp)
    {
        $this->setName($name);
        $this->setRegExp($regExp);
    }

     public function __wakeup()
     {
        if ($this->id) {
            $this->_initialValues = $this->__toArray();
        }
        // Do nothing: Doctrines requirement
     }

    /**
     * @return FriendsPatternDTO
     */
    public static function createDTO()
    {
        return new FriendsPatternDTO();
    }

    /**
     * Factory method
     * @param FriendsPatternDTO $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FriendsPatternDTO::class);

        $self = new self(
            $dto->getName(),
            $dto->getRegExp()
        );

        return $self
            ->setFriend($dto->getFriend());
    }

    /**
     * @param FriendsPatternDTO $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        Assertion::isInstanceOf($dto, FriendsPatternDTO::class);

        $this
            ->setName($dto->getName())
            ->setRegExp($dto->getRegExp())
            ->setFriend($dto->getFriend());


        return $this;
    }

    /**
     * @return FriendsPatternDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setId($this->getId())
            ->setName($this->getName())
            ->setRegExp($this->getRegExp())
            ->setFriendId($this->getFriend() ? $this->getFriend()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'regExp' => $this->getRegExp(),
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null
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
     * @return FriendsPattern
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
     * Set regExp
     *
     * @param string $regExp
     *
     * @return FriendsPattern
     */
    protected function setRegExp($regExp)
    {
        Assertion::notNull($regExp);
        Assertion::maxLength($regExp, 255);

        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * Set friend
     *
     * @param \Core\Model\Friend\Friend $friend
     *
     * @return FriendsPattern
     */
    protected function setFriend(\Core\Model\Friend\Friend $friend)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Core\Model\Friend\Friend
     */
    public function getFriend()
    {
        return $this->friend;
    }



    // @codeCoverageIgnoreEnd
}

