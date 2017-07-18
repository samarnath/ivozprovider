<?php

namespace EntityGeneratorBundle\Command;

use Doctrine\Bundle\DoctrineBundle\Command\GenerateEntitiesDoctrineCommand as ParentCommand;
use Doctrine\ORM\Tools\EntityGenerator;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use EntityGeneratorBundle\Tools\InterfaceGenerator;

/**
 * Generate entity classes from mapping information
 *
 * @author Mikel Madariaga <mikel@irontec.com>
 */
class GenerateInterfacesCommand extends ParentCommand
{
    use ExecuteGeneratorTrait;

    public function __construct($name = null)
    {
        $this->skipEmbedded = true;
        $this->skipEntities = true;

        return parent::__construct($name = null);
    }

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('provider:generate:interfaces')
            ->setAliases(array('generate:provider:interfaces'))
            ->setDescription('Generates entity interfaces from your mapping information')
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
                InputOption::VALUE_REQUIRED,
                'Do not backup existing entities files.',
                true
            );
    }

    /**
     * get a ivozprovider entity generator
     *
     * @return EntityGenerator
     */
    protected function getEntityGenerator()
    {
        $entityGenerator = new InterfaceGenerator();
        $entityGenerator->setGenerateAnnotations(false);
        $entityGenerator->setGenerateStubMethods(true);
        $entityGenerator->setRegenerateEntityIfExists(true);
        $entityGenerator->setUpdateEntityIfExists(true);
        $entityGenerator->setNumSpaces(4);
        $entityGenerator->setAnnotationPrefix('ORM\\');

        return $entityGenerator;
    }
}
