<?php

namespace Core\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityRepository;
use Core\Model\Invoice\InvoiceRepository;

/**
 * InvoiceDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvoiceDoctrineRepository extends EntityRepository implements InvoiceRepository
{
}
