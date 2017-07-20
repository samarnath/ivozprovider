<?php
namespace Core\Domain\Service;

use Core\Domain\Model\EntityInterface;

interface LifecycleEventHandlerInterface
{
    public function execute(EntityInterface $entity, callable $entityPersister);
}