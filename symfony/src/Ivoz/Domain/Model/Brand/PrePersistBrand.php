<?php
namespace Ivoz\Domain\Model\ApplicationServer;

use Doctrine\ORM\EntityManagerInterface;
use Core\Application\Command\CreateEntityFromDTO;
use Core\Application\Command\UpdateEntityFromDTO;
use Ivoz\Domain\Model\Brand\BrandDTO;
use Ivoz\Domain\Model\Brand\BrandInterface;
use Ivoz\Domain\Model\Language\LanguageInterface;
use Ivoz\Domain\Model\Timezone\TimezoneInterface;

class PrePersistBrand
{
    /**
     * @var KamDispatcherRepository
     */
    protected $dispatcherRepository;

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
        $isNew = $this->em->contains($entity);
        if ($isNew) {
            /**
             * @var $dto BrandDTO
             */
            $dto = $entity->toDTO();
            // Create sane defaults for hidden fields

//            if (!$model->hasChange('nif')) $model->setNif('12345678-Z');
//            if (!$model->hasChange('postalAddress')) $model->setPostalAddress('Postal address');
//            if (!$model->hasChange('postalCode')) $model->setPostalCode('ZIP');
//            if (!$model->hasChange('town')) $model->setTown('Town');
//            if (!$model->hasChange('country')) $model->setCountry('Country');
//            if (!$model->hasChange('province')) $model->setProvince('Province');

            if (!$entity->hasChangedField('defaultTimezone')) {
                $dto->setDefaultTimezoneId(145);
            }

            if (!$entity->hasChangedField('language')) {
                $dto->setLanguageId(1);
            }

            if (!$entity->hasChangedField('registryData')) {
                $dto->setRegistryData('');
            }

            $this->entityUpdater->execute($entity, $dto);
        }
    }
}