<?php
namespace Ivoz\Domain\Service\CompanyService;

use Core\Domain\Model\EntityInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\BrandService\BrandService;
use Ivoz\Domain\Model\Company\Company;
use Ivoz\Domain\Model\Company\CompanyRepository;
use Ivoz\Domain\Model\CompanyService\CompanyServiceRepository;

class RemoveByBrandService implements LifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var CompanyRepository
     */
    protected $companyRepository;

    /**
     * @var CompanyServiceRepository
     */
    protected $companyServiceRepository;

    function __construct(
        EntityManagerInterface $em,
        CompanyRepository $companyRepository,
        CompanyServiceRepository $companyServiceRepository
    ) {
        $this->em = $em;
        $this->companyRepository = $companyRepository;
        $this->companyServiceRepository = $companyServiceRepository;
    }

    /**
     * @param BrandService $entity
     */
    public function execute(EntityInterface $entity, callable $entityPersister)
    {
        $companies = $this->companyRepository->findBy([
            'brand' => $entity->getBrand()->getId()
        ]);

        /**
         * Foreach Company in Service Brand
         * @var Company $company
         */
        foreach ($companies as $company) {

            $companyService = $this->companyServiceRepository->findOneBy([
                'company' => $company->getId(),
                'service' => $entity->getService()->getId()
            ]);

            // Delete custom company service code
            if ($companyService) {
                $this->em->remove($companyService);
            }

        }
    }
}