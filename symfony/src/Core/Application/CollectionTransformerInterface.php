<?php
namespace Core\Application;

interface CollectionTransformerInterface
{
    /**
     * @param string $entityName
     * @param \Core\Application\DataTransferObjectInterface[] $dtos
     * @return \Core\Domain\Model\EntityInterface[]
     */
    public function transform($entityName, array $dtos = null);
}