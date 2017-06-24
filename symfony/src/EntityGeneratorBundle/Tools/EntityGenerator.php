<?php

namespace EntityGeneratorBundle\Tools;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools\EntityGenerator as ParentGenerator;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\Common\Util\Inflector;

/**
 * Description of EntityGenerator
 *
 * @author Mikel Madariaga <mikel@irontec.com>
 */
class EntityGenerator extends ParentGenerator
{
    /**
     * {@inheritDoc}
     */
    public function generateEntityClass(ClassMetadataInfo $metadata)
    {
        $placeHolders = array(
            '<namespace>',
            '<useStatement>',
            '<entityAnnotation>',
            '<entityClassName>',
            '<entityBody>'
        );

        $this->setFieldVisibility(self::FIELD_VISIBLE_PROTECTED);

        $replacements = array(
            $this->generateEntityNamespace($metadata),
            '',
            $this->generateEntityDocBlock($metadata),
            $this->generateEntityClassName($metadata),
            ''
        );

        $code = str_replace($placeHolders, $replacements, static::$classTemplate) . "\n";
        return str_replace('<spaces>', $this->spaces, $code);
    }


    /**
     * @param ClassMetadataInfo $metadata
     *
     * @return string
     */
    protected function generateEntityClassName(ClassMetadataInfo $metadata)
    {
        $className = $this->getClassName($metadata);
        $class = 'class '
            . $className
            . ' extends '
            . $className . 'Abstract'
            . ' implements ' . $className . 'Interface';

        return $class;
    }
}
