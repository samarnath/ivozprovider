<?php

namespace EntityGeneratorBundle\Command;

use Doctrine\Bundle\DoctrineBundle\Command\GenerateEntitiesDoctrineCommand as ParentCommand;
use Doctrine\ORM\Tools\EntityGenerator;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\Tools\EntityRepositoryGenerator;
use Doctrine\Bundle\DoctrineBundle\Mapping\DisconnectedMetadataFactory;
use EntityGeneratorBundle\Tools\DTOGenerator;

/**
 * Generate entity classes from mapping information
 *
 * @author Mikel Madariaga <mikel@irontec.com>
 */
class GenerateDTOCommand extends ParentCommand
{

    protected function configure()
    {
        parent::configure();
         $this
            ->setName('provider:generate:dtos')
            ->setAliases(array('generate:provider:dtos'));
    }

    /**
     * get a ivozprovider entity generator
     *
     * @return EntityGenerator
     */
    protected function getEntityGenerator()
    {
        $entityGenerator = new DTOGenerator();
        $entityGenerator->setGenerateAnnotations(false);
        $entityGenerator->setGenerateStubMethods(true);
        $entityGenerator->setRegenerateEntityIfExists(true);
        $entityGenerator->setUpdateEntityIfExists(true);
        $entityGenerator->setNumSpaces(4);
        $entityGenerator->setAnnotationPrefix('ORM\\');

        return $entityGenerator;
    }
}
