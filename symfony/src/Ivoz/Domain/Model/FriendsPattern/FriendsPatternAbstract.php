<?php

namespace Ivoz\Domain\Model\FriendsPattern;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * FriendsPatternAbstract
 */
abstract class FriendsPatternAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $regExp;

    /**
     * @var \Ivoz\Domain\Model\Friend\FriendInterface
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

    abstract public function __wakeup();

    /**
     * @return FriendsPatternDTO
     */
    public static function createDTO()
    {
        return new FriendsPatternDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FriendsPatternDTO
         */
        Assertion::isInstanceOf($dto, FriendsPatternDTO::class);

        $self = new static(
            $dto->getName(),
            $dto->getRegExp());

        return $self
            ->setFriend($dto->getFriend())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FriendsPatternDTO
         */
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
            'name' => $this->getName(),
            'regExp' => $this->getRegExp(),
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
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
     * @return self
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
     * @param \Ivoz\Domain\Model\Friend\FriendInterface $friend
     *
     * @return self
     */
    protected function setFriend(\Ivoz\Domain\Model\Friend\FriendInterface $friend)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Ivoz\Domain\Model\Friend\FriendInterface
     */
    public function getFriend()
    {
        return $this->friend;
    }



    // @codeCoverageIgnoreEnd
}

