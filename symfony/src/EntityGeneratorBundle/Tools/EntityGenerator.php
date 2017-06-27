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
class EntityGenerator extends AbstractEntityGenerator
{
    protected $skipEmbeddedMethods = true;
    protected $codeCoverageIgnoreBlock = false;

    /**
     * @var string
     */
    protected static $constructorMethodTemplate =
        '
/**
 * Changelog tracking purpose
 * @var array
 */
protected $_initialValues = [];

/**
 * Constructor
 */
public function __construct(<requiredFields>)<lineBreak>{
<requiredFieldsSetters><collections>
}

public function __wakeup()
{
    if ($this->id) {
        $this->_initialValues = $this->__toArray();
    }
    // Do nothing: Doctrines requirement
}

/**
 * @return <dtoClass>
 */
public static function createDTO()
{
    return new <dtoClass>();
}

/**
 * Factory method
 * @param DataTransferObjectInterface $dto
 * @return self
 */
public static function fromDTO(DataTransferObjectInterface $dto)
{
    /**
     * @var $dto <dtoClass>
     */
    Assertion::isInstanceOf($dto, <dtoClass>::class);
<voContructor>
    $self = new self(<requiredFieldsGetters>);

    return $self<fromDTO>;
}

/**
 * @param DataTransferObjectInterface $dto
 * @return self
 */
public function updateFromDTO(DataTransferObjectInterface $dto)
{
    /**
     * @var $dto <dtoClass>
     */
    Assertion::isInstanceOf($dto, <dtoClass>::class);
<voContructor>
    <updateFromDTO>
    return $this;
}

/**
 * @return <dtoClass>
 */
public function toDTO()
{
    return self::createDTO()<toDTO>;
}

/**
 * @return array
 */
protected function __toArray()
{
    return [<toArray>];
}

';

    /**
     * {@inheritDoc}
     */
    protected function generateEntityFieldMappingProperties(ClassMetadataInfo $metadata)
    {
        $lines = array();

        foreach ($metadata->fieldMappings as $fieldMapping) {

            if (isset($fieldMapping['declared'])) {
                continue;
            }

            if ($this->hasProperty($fieldMapping['fieldName'], $metadata) ||
                $metadata->isInheritedField($fieldMapping['fieldName']) ||
                (
                    isset($fieldMapping['declaredField']) &&
                    isset($metadata->embeddedClasses[$fieldMapping['declaredField']])
                )
            ) {
                continue;
            }

            $lines[] = $this->generateFieldMappingPropertyDocBlock($fieldMapping, $metadata);
            $lines[] = $this->spaces . $this->fieldVisibility . ' $' . $fieldMapping['fieldName']
                . (isset($fieldMapping['options']['default']) ? ' = ' . var_export($fieldMapping['options']['default'], true) : null) . ";\n";
        }

        return implode("\n", $lines);
    }


    /**
     * {@inheritDoc}
     */
    protected function generateEntityClassName(ClassMetadataInfo $metadata)
    {
        $className = $this->getClassName($metadata);
        $class = 'class '
            . $className
            . ' extends '
            . $className . 'Abstract'
            . ' implements ' . $className . 'Interface, EntityInterface';

        return $class;
    }
}
