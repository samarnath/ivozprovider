<?php

namespace Core\Domain\Model\FriendsPattern;

use Assert\Assertion;
use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;

/**
 * FriendsPattern
 */
class FriendsPattern extends FriendsPatternAbstract implements FriendsPatternInterface, EntityInterface
{
    /**
     * @var integer
     */
    protected $id;


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
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FriendsPatternDTO
         */
        Assertion::isInstanceOf($dto, FriendsPatternDTO::class);

        $self = new self(
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
            ->setId($this->getId())
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
            'id' => $this->getId(),
            'friendId' => $this->getFriend() ? $this->getFriend()->getId() : null
        ];
    }


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
     * Set friend
     *
     * @param \Core\Domain\Model\Friend\FriendInterface $friend
     *
     * @return self
     */
    protected function setFriend(\Core\Domain\Model\Friend\FriendInterface $friend)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Core\Domain\Model\Friend\FriendInterface
     */
    public function getFriend()
    {
        return $this->friend;
    }


}

