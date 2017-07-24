<?php

namespace Core\Domain\Model;

use Core\Application\DataTransferObjectInterface;

/**
 * Entity interface
 *
 * @author Mikel Madariaga <mikel@irontec.com>
 */
interface EntityInterface
{
    public function getId();

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     */
    public static function fromDTO(DataTransferObjectInterface $dto);

    /**
     * @return self
     */
    public function updateFromDTO(DataTransferObjectInterface $dto);

    /**
     * DTO casting
     * @return DataTransferObjectInterface
     * @refactor rename this to __toDTO
     */
    public function toDTO();

    /**
     * @return DataTransferObjectInterface
     */
    public static function createDTO();
}
