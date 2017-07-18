<?php
namespace Core\Infrastructure\Model\Lifecycle;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class LoadSubscriber implements EventSubscriber
{
    use EntityClassToServiceNameTrait;

    public function getSubscribedEvents()
    {
        return array(
            'postLoad'
        );
    }

    public function postLoad(LifecycleEventArgs $args)
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