<?php
namespace Ivoz\Domain\Service;

use Core\Domain\Model\EntityInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use IvozProvider\Gearmand\Jobs\Xmlrpc;

class RequestProxyTrunksDispatcherReload implements LifecycleEventHandlerInterface
{
    /**
     * @var KamDispatcherRepository
     */
    protected $dispatcherRepository;

    /**
     * @var Xmlrpc
     */
    protected $xmlrpc;

    public function __construct(
        Xmlrpc $xmlrpc
    ) {
        $this->xmlrpc = $xmlrpc;
    }

    public function execute(EntityInterface $entity, callable $entityPersister)
    {
        try {

            $proxyServers = array(
                'proxytrunks' => 'dispatcher.reload',
            );
            $this->xmlrpc->setProxyServers($proxyServers);
            $this->xmlrpc->send();

        } catch (\Exception $e) {
            $message = $e->getMessage() . '<p>Application Server may have been deleted.</p>';
            throw new \Exception($message);
        }

    }
}