<?php
namespace Core\Infrastructure\Model\Lifecycle;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class PersistSubscriber implements EventSubscriber
{
    use EntityClassToServiceNameTrait;

    protected $serviceContainer;

    public function __construct(ContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'PostPersist',
            'preUpdate',
            'postUpdate'
        );
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->run('pre_persist', $args);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->run('post_persist', $args);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->run('pre_persist', $args);
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->run('post_persist', $args);
    }

    protected function run($eventName, LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityClass = get_class($entity);
        $serviceName = $this->getServiceName($entityClass, $eventName);

        if (!$this->serviceContainer->has($serviceName)) {
            return;
        }

        $service = $this->serviceContainer->get($serviceName);
        $service->execute($entity);
    }

}