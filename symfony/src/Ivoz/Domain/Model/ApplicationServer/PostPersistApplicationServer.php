<?php
namespace Ivoz\Application\ApplicationServer;

use Kam\Domain\Model\Dispatcher as KamDispatcher;
use Kam\Domain\Model\Dispatcher\DispatcherRepository as KamDispatcherRepository;
use IvozProvider\Gearmand\Jobs\Xmlrpc;
use Doctrine\Common\Persistence\ObjectManager;
use Ivoz\Domain\Model\ApplicationServer\ApplicationServerInterface;

class PostPersistApplicationServer
{
    protected $dispatcherRepository;
    protected $xmlrpc;
    protected $em;

    public function __construct(
        KamDispatcherRepository $dispatcherRepository,
        Xmlrpc $xmlrpc,
        ObjectManager $em
    ) {
        $this->dispatcherRepository = $dispatcherRepository;
        $this->xmlrpc = $xmlrpc;
        $this->em = $em;
    }


    public function execute(ApplicationServerInterface)
    {

        
    }
}