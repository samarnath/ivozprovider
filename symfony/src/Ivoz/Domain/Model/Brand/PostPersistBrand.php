<?php
namespace Ivoz\Domain\Model\ApplicationServer;

use Doctrine\ORM\EntityManagerInterface;
use Core\Application\Command\CreateEntityFromDTO;
use Core\Application\Command\UpdateEntityFromDTO;

class PostPersistBrand
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(
        EntityManagerInterface $em,
        CreateEntityFromDTO $createEntityFromDTO,
        UpdateEntityFromDTO $entityUpdater
    ) {
        $this->em = $em;
        $this->createEntityFromDTO = $createEntityFromDTO;
        $this->entityUpdater = $entityUpdater;
    }

    public function execute(BrandInterface $entity)
    {
        if ($entity->hasChange('domainUsers')) {
            $this->_updateDomains($model);
            $this->_updateRetailDomain($model);
            $this->_createDomainAttrs($model);
        }

        if ($entity) {
            $this->_createDefaultRoutes($model);
            $this->_createDefaultServices($model);
        }

        try {
            $this->_sendXmlRcp();
        } catch (\Exception $e) {
            $message = $e->getMessage()."<p>Brand may have been saved.</p>";
            throw new \Exception($message);
        }
    }
}