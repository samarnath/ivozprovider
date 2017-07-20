<?php
namespace Ivoz\Domain\Service\RetailAccount;

use Core\Domain\Model\EntityInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\Brand;
use Ivoz\Domain\Model\RetailAccount\RetailAccountDTO;

class UpdateByBrand implements LifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var UpdateEntityFromDTO
     */
    protected $entityUpdater;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    /**
     * @param Brand $entity
     */
    public function execute(EntityInterface $entity, callable $entityPersister)
    {
        $retails = $entity->getRetailAccounts();
        foreach ($retails as $retail) {

            /**
             * @var RetailAccountDTO
             */
            $retailDto = $retail->toDto();

            $retailDto->setDomain(
                $entity->getDomainUsers()
            );

            $entityPersister($retailDto, $retail);
        }
    }
}