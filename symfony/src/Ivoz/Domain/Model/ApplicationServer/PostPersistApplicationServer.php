<?php
namespace Ivoz\Domain\Model\ApplicationServer;

use Kam\Domain\Model\Dispatcher\Dispatcher as KamDispatcher;
use Kam\Domain\Model\Dispatcher\DispatcherRepository as KamDispatcherRepository;
use IvozProvider\Gearmand\Jobs\Xmlrpc;
use Doctrine\ORM\EntityManagerInterface;
use Core\Application\Command\CreateEntityFromDTO;
use Core\Application\Command\UpdateEntityFromDTO;

class PostPersistApplicationServer
{
    /**
     * @var KamDispatcherRepository
     */
    protected $dispatcherRepository;

    /**
     * @var Xmlrpc
     */
    protected $xmlrpc;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var CreateEntityFromDTO
     */
    protected $createEntityFromDTO;

    /**
     * @var UpdateEntityFromDTO
     */
    protected $entityUpdater;

    public function __construct(
        KamDispatcherRepository $dispatcherRepository,
        Xmlrpc $xmlrpc,
        EntityManagerInterface $em,
        CreateEntityFromDTO $createEntityFromDTO,
        UpdateEntityFromDTO $entityUpdater
    ) {
        $this->dispatcherRepository = $dispatcherRepository;
        $this->xmlrpc = $xmlrpc;
        $this->em = $em;
        $this->createEntityFromDTO = $createEntityFromDTO;
        $this->entityUpdater = $entityUpdater;
    }

    public function execute(ApplicationServerInterface $entity)
    {
        /**
         * @var KamDispatcher $kamDispatcher
         */
        // Replicate ApplicationServer IP into kam_dispatcher
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
//            ->setDestination('sip:' . $model->getIp() . ":6060")
            ->setDescription($entity->getName());

        if ($isNew) {
            $this->createEntityFromDTO->execute(KamDispatcher::class, $kamDispatcherDto);
        } else {
            $this->entityUpdater->execute($kamDispatcher, $kamDispatcherDto);
        }

        $this->em->persist($kamDispatcher);
        $this->em->flush();
    }
}