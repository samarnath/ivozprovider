<?php

namespace Core\Application\Command;

use Core\Domain\Model\EntityInterface;
use Core\Application\DataTransferObjectInterface;
use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

class UpdateEntityFromDTO
{
    /**
     * @var ForeignKeyTransformerInterface
     */
    private $fkTransformer;

    /**
     * @var CollectionTransformerInterface
     */
    private $collectionTransformer;

    public function __construct(
        ForeignKeyTransformerInterface $fkTransformer,
        CollectionTransformerInterface $collectionTransformer
    ) {
        $this->fkTransformer = $fkTransformer;
        $this->collectionTransformer = $collectionTransformer;
    }

    public function execute(EntityInterface $entity, DataTransferObjectInterface $dto)
    {
        //Ensure that we don't propagate applied changes
        $dto = clone $dto;
        $dto->transformForeignKeys($this->fkTransformer);
        $dto->transformCollections($this->collectionTransformer);

        $entity->updateFromDTO($dto);
    }
}