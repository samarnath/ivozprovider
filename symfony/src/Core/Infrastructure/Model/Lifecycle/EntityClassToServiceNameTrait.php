<?php

namespace Core\Infrastructure\Model\Lifecycle;

use Doctrine\Common\Inflector\Inflector;

trait EntityClassToServiceNameTrait
{
    protected function getServiceName($className, $event)
    {
        $classSegments = explode('\\', $className);

        $prefix = $classSegments[0];
        $entity = end($classSegments);
        $snakeCaseEntity = Inflector::tableize($entity);
        $serviceName = $prefix . '.lifecycle.' . $snakeCaseEntity . '.' . $event;

        return strtolower($serviceName);
    }
}