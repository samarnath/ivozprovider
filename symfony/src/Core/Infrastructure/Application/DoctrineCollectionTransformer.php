<?php

namespace Core\Infrastructure\Application;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\Collections\ArrayCollection;
use Core\Application\CollectionTransformerInterface;
use Core\Application\DataTransferObjectInterface;
use Core\Model\EntityInterface;

class DoctrineCollectionTransformer implements CollectionTransformerInterface
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
     * @param DataTransferObjectInterface[] | null $dtos
     * @return \IteratorAggregate
     */
    public function transform($entityName, array $dtos = null)
    {
        if (is_null($dtos)) {
            return null;
        }

        $entities = new ArrayCollection();
        $entityReflectionClass = new \ReflectionClass($entityName);
        $entityReflection = $entityReflectionClass->newInstanceWithoutConstructor();

        foreach ($dtos as $dto) {

            if (!$dto instanceof DataTransferObjectInterface) {
                throw new \UnexpectedValueException(
                    'Value must implement DataTransferObjectInterface'
                );
            }

            $entity = $this->getEntity($entityReflection, $dto);
            $entities->add($entity);
        }

        return $entities;
    }

    /**
     * @param EntityInterface $entityReflection
     * @param DataTransferObjectInterface $dto
     *
     * @return EntityInterface
     */
    private function getEntity(EntityInterface $entityReflection, DataTransferObjectInterface $dto)
    {
        if ($dto->getId()) {
            $entity = $this->em->getReference(
                get_class($entityReflection), $dto->getId()
            );

            return $entity;
        }

        return $entityReflection->fromDTO($dto);
    }
}