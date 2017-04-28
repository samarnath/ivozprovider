<?php

namespace Core\Application;

use Core\Application\ForeignKeyTransformerInterface;
use Core\Application\CollectionTransformerInterface;

interface DataTransferObjectInterface
{
    public function __toArray();

    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer);

    public function transformCollections(CollectionTransformerInterface $transformer);
}
