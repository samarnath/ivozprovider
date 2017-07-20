<?php

namespace Core\Infrastructure\Model\Lifecycle;

use Core\Application\Command\CreateEntityFromDTO;
use Core\Application\Command\UpdateEntityFromDTO;
use Core\Application\DataTransferObjectInterface;
use Core\Domain\Model\EntityInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;

class HandlerChain
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var array
     */
    protected $services;

    /**
     * @var CreateEntityFromDTO
     */
    protected $createEntityFromDTO;

    /**
     * @var UpdateEntityFromDTO
     */
    protected $entityUpdater;

    public function __construct
    (
        EntityManagerInterface $em,
        CreateEntityFromDTO $createEntityFromDTO,
        UpdateEntityFromDTO $entityUpdater
    ) {
        $this->em = $em;
        $this->createEntityFromDTO = $createEntityFromDTO;
        $this->entityUpdater = $entityUpdater;
        $this->services = array();
    }

    public function addService(LifecycleEventHandlerInterface $service)
    {
        $this->services[] = $service;
    }

    public function execute($entity)
    {
        /**
         * @todo extract this into it's own class
         * @param DataTransferObjectInterface $dto
         * @param EntityInterface|null $entity
         * @return EntityInterface|mixed
         */
        $entityPersister =
            function (DataTransferObjectInterface $dto, EntityInterface $entity = null) {
                if ($dto->getId()) {
                    $entityClass = substr(get_class($dto), 0, -3);
                    $entity = $this
                        ->createEntityFromDTO
                        ->execute($entityClass, $dto);
                } else {
                    $this->entityUpdater->execute($entity, $dto);
                }
                $this->em->persist($entity);

                return $entity;
            };

        foreach ($this->services as $service) {

            $service->execute($entity, $entityPersister);
            $this->em->flush();
        }
    }
}