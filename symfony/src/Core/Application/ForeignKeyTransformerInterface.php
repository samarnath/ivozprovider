<?php
namespace Core\Application;

use Core\Model\EntityInterface;

interface ForeignKeyTransformerInterface
{
    /**
     * @param string $entityName
     * @param mixed $key
     * @return EntityInterface
     */
    public function transform($entityName, $key);
}