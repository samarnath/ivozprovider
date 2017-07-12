<?php

namespace Ivoz\Domain\Model\PickUpRelUser;

use Assert\Assertion;
use Core\Application\DataTransferObjectInterface;

/**
 * PickUpRelUserAbstract
 */
abstract class PickUpRelUserAbstract
{
    /**
     * @var \Ivoz\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    protected $pickUpGroup;

    /**
     * @var \Ivoz\Domain\Model\User\UserInterface
     */
    protected $user;


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
     * @return PickUpRelUserDTO
     */
    public static function createDTO()
    {
        return new PickUpRelUserDTO();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PickUpRelUserDTO
         */
        Assertion::isInstanceOf($dto, PickUpRelUserDTO::class);

        $self = new static();

        return $self
            ->setPickUpGroup($dto->getPickUpGroup())
            ->setUser($dto->getUser())
        ;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PickUpRelUserDTO
         */
        Assertion::isInstanceOf($dto, PickUpRelUserDTO::class);

        $this
            ->setPickUpGroup($dto->getPickUpGroup())
            ->setUser($dto->getUser());


        return $this;
    }

    /**
     * @return PickUpRelUserDTO
     */
    public function toDTO()
    {
        return self::createDTO()
            ->setPickUpGroupId($this->getPickUpGroup() ? $this->getPickUpGroup()->getId() : null)
            ->setUserId($this->getUser() ? $this->getUser()->getId() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'pickUpGroupId' => $this->getPickUpGroup() ? $this->getPickUpGroup()->getId() : null,
            'userId' => $this->getUser() ? $this->getUser()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set pickUpGroup
     *
     * @param \Ivoz\Domain\Model\PickUpGroup\PickUpGroupInterface $pickUpGroup
     *
     * @return self
     */
    protected function setPickUpGroup(\Ivoz\Domain\Model\PickUpGroup\PickUpGroupInterface $pickUpGroup)
    {
        $this->pickUpGroup = $pickUpGroup;

        return $this;
    }

    /**
     * Get pickUpGroup
     *
     * @return \Ivoz\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup()
    {
        return $this->pickUpGroup;
    }

    /**
     * Set user
     *
     * @param \Ivoz\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    protected function setUser(\Ivoz\Domain\Model\User\UserInterface $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ivoz\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }



    // @codeCoverageIgnoreEnd
}

