<?php

namespace EntityGeneratorBundle\Command;

use Doctrine\Bundle\DoctrineBundle\Command\GenerateEntitiesDoctrineCommand as ParentCommand;
use EntityGeneratorBundle\Tools\EntityGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Generate entity classes from mapping information
 *
 * @author Mikel Madariaga <mikel@irontec.com>
 */
class GenerateEntitiesDoctrineCommand extends ParentCommand
{
    use ExecuteGeneratorTrait;

    public function __construct($name = null)
    {
        $this->skipEmbedded = true;
        $this->skipMappedSuperClass = true;

        return parent::__construct($name = null);
    }

    protected function configure()
    {
        $this
            ->setName('provider:generate:entities')
            ->setAliases(array('generate:provider:entities'))
            ->setDescription('Generates entity from your mapping information')
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'A bundle name, a namespace, or a class name'
            )
            ->addOption(
                'path',
                null,
                InputOption::VALUE_REQUIRED,
                'The path where to generate entities when it cannot be guessed',
                'src'
            )
            ->addOption(
                'no-backup',
                null,
                InputOption::VALUE_NONE,
                'Do not backup existing entities files.'
            );
    }

    /**
     * get a ivozprovider entity generator
     *
     * @return EntityGenerator
     */
    protected function getEntityGenerator()
    {
        $entityGenerator = new EntityGenerator();
        $entityGenerator->setGenerateAnnotations(false);
        $entityGenerator->setGenerateStubMethods(true);
        $entityGenerator->setRegenerateEntityIfExists(true);
        $entityGenerator->setUpdateEntityIfExists(true);
        $entityGenerator->setNumSpaces(4);
        $entityGenerator->setAnnotationPrefix('ORM\\');

        return $entityGenerator;
    }
}
