<?php

namespace Core\Infrastructure\Application;

use Core\Application\ForeignKeyTransformerInterface;
use Core\Model\EntityInterface;
use Doctrine\ORM\EntityManager;

class DoctrineForeignKeyTransformer implements ForeignKeyTransformerInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $entityName
     * @param mixed $key
     * @return EntityInterface
     */
    public function transform($entityName, $key)
    {
        if (is_null($key)) {

            return null;
        }

        return $this->em->getReference($entityName, $key);
    }
}