<?php
namespace Core\Infrastructure\Model\Lifecycle;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class RemoveSubscriber implements EventSubscriber
{
    use EntityClassToServiceNameTrait;

    public function getSubscribedEvents()
    {
        return array(
            'preRemove',
            'postRemove'
        );
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $this->run($args);
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $this->run($args);
    }

    protected function run(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $entityManager = $args->getObjectManager();

        var_dump('here');
        dump($entity);
        dump($entityManager);
        die;
    }
}