<?php
namespace Kam\Domain\Service\UsersDomainAttr as KamUsersDomainAttr;

use Core\Domain\Model\EntityInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\Brand;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttrRepository;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttr;
use Kam\Domain\Model\UsersDomainAttr\UsersDomainAttrDTO;

class UpdateByBrand implements LifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var DomainRepository
     */
    protected $usersDomainAttrRepository;

    public function __construct(
        EntityManagerInterface $em,
        UsersDomainAttrRepository $usersDomainAttrRepository
    ) {
        $this->em = $em;
        $this->usersDomainAttrRepository = $usersDomainAttrRepository;
    }

    /**
     * @param Brand $entity
     */
    public function execute(EntityInterface $entity, callable $entityPersister)
    {
        $domainName = $entity->getDomainUsers();

        if (!empty($domainName)) {

            $domainsAttr = $this->usersDomainAttrRepository->findBy([
                'did' => $domainName,
                'name' => 'brandId'
            ]);

            if (empty($domainsAttr)) {
                $domainAttr = new \IvozProvider\Model\KamUsersDomainAttrs();

                /**
                 * @var UsersDomainAttrDTO $domainAttr
                 */
                $domainAttr = UsersDomainAttr::createDTO();

                /**
                 * @todo setDid expects CompanyInterface and that's wrong
                 */
//                $domainAttr
//                    ->setDid($domainName)
//                    ->setName('brandId')
//                    ->setType('0')
//                    ->setValue($model->getPrimaryKey())
//                    ->save();
            }
        }
    }
}