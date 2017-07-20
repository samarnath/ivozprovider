<?php
namespace Kam\Domain\Service\Dispatcher;

use Core\Domain\Model\EntityInterface;
use Kam\Domain\Model\Dispatcher\Dispatcher as KamDispatcher;
use Kam\Domain\Model\Dispatcher\DispatcherRepository as KamDispatcherRepository;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;

class UpdateByApplicationServer implements LifecycleEventHandlerInterface
{
    /**
     * @var KamDispatcherRepository
     */
    protected $dispatcherRepository;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(
        EntityManagerInterface $em,
        KamDispatcherRepository $dispatcherRepository
    ) {
        $this->dispatcherRepository = $dispatcherRepository;
        $this->em = $em;
    }

    /**
     * @var ApplicationServerInterface $entity
     */
    public function execute(EntityInterface $entity, callable $entityPersister)
    {
        /**
         * Replicate ApplicationServer IP into kam_dispatcher
         * @var KamDispatcher $kamDispatcher
         */
        $kamDispatcher = $this->dispatcherRepository->findOneBy([
            'applicationServer' => $entity->getId()
        ]);

        $isNew = is_null($kamDispatcher);

        $kamDispatcherDto = $isNew
            ? KamDispatcher::createDTO()
            : $kamDispatcher->toDTO();

        $kamDispatcherDto
            ->setApplicationServerId($entity->getId())
            ->setSetid(1)
            ->setDestination('sip:' . $entity->getIp() . ":6060")
            ->setDescription($entity->getName());

        $entityPersister($kamDispatcherDto, $kamDispatcher);
    }
}