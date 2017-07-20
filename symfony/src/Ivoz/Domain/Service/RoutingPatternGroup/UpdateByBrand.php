<?php
namespace Ivoz\Domain\Service\RoutingPatternGroup;

use Core\Domain\Model\EntityInterface;
use Core\Domain\Service\LifecycleEventHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Ivoz\Domain\Model\Brand\Brand;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupDTO;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroup;
use Ivoz\Domain\Model\Country\Country;
use Ivoz\Domain\Model\RoutingPatternGroup\RoutingPatternGroupRepository;
use Ivoz\Domain\Model\Country\CountryRepository;
use Ivoz\Domain\Model\RoutingPattern\RoutingPatternDTO;
use Ivoz\Domain\Model\RoutingPattern\RoutingPattern;
use Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPattern;
use Ivoz\Domain\Model\RoutingPatternGroupsRelPattern\RoutingPatternGroupsRelPatternDTO;

class UpdateByBrand implements LifecycleEventHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var RoutingPatternGroupRepository
     */
    protected $routingPatternGroupRepository;

    /**
     * @var CountryRepository
     */
    protected $countryRepository;

    public function __construct(
        EntityManagerInterface $em,
        RoutingPatternGroupRepository $routingPatternGroupRepository,
        CountryRepository $countryRepository
    ) {
        $this->em = $em;
        $this->routingPatternGroupRepository = $routingPatternGroupRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * @param Brand $entity
     */
    public function execute(EntityInterface $entity, callable $entityPersister)
    {
        $isNew = $this->em->contains($entity);
        if (!$isNew) {
            return;
        }
        $countries = $this->countryRepository->findAll();

        /**
         * @var Country $country
         */
        foreach ($countries as $country) {

            /**
             * @var RoutingPatternDTO $routingPattern
             */
            $routingPatternDto = RoutingPattern::createDTO();
            $routingPatternDto
                ->setNameEs($country->getNameEs())
                ->setNameEn($country->getNameEn())
                ->setDescriptionEs('')
                ->setDescriptionEn('')
                ->setRegExp($country->getCallingCode())
                ->setBrandId($entity->getId());

            $entityPersister($routingPatternDto);

            if (!$country->getZone()) {
                continue;
            }

            $routingPatternGroup = $this->routingPatternGroupRepository->findOneBy([
                'brandId' => $entity->getId(),
                'name' => $country->getZone()
            ]);

            if (empty($routingPatternGroups)) {

                /**
                 * @var RoutingPatternGroupDto $routingPatternGroupDto
                 */
                $routingPatternGroupDto = RoutingPatternGroup::createDTO();
                $routingPatternGroupDto
                    ->setName($country->getZone())
                    ->setBrandId($entity->getId());

                $routingPatternGroup = $entityPersister($routingPatternGroupDto);
            }

            /**
             * @var RoutingPatternGroupsRelPatternDTO $routingPatternGroupsRelPatternDto
             */
            $routingPatternGroupsRelPatternDto = RoutingPatternGroupsRelPattern::createDTO();
            $routingPatternGroupsRelPatternDto
                ->setRoutingPatternId($routingPattern->getId())
                ->setRoutingPatternGroupid($routingPatternGroup->getId());

            $entityPersister($routingPatternGroupsRelPatternDto);
        }
    }
}