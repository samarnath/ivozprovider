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
class AbstractEntityGenerator extends ParentGenerator
{
    protected $skipEmbeddedMethods = false;

    protected $codeCoverageIgnoreBlock = true;

    /**
     * @var string
     */
    protected static $valueObjectConstructorMethodTemplate =
        '
/**
 * Constructor
 */
public function __construct(<requiredFields>)<lineBreak>{
<requiredFieldsSetters><collections>
}
';

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

abstract public function __wakeup();

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
    $self = new static(<requiredFieldsGetters>);

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
     * @var string
     */
    protected static $setMethodTemplate =
'/**
 * <description>
 *
 * @param <variableType> $<variableName>
 *
 * @return self
 */
<visibility> function <methodName>(<methodTypeHint>$<variableName><variableDefault>)
{
<assertions>$this-><fieldName> = $<variableName>;

<spaces>return $this;
}';


    /**
     * @var string
     */
    protected static $getMethodTemplate =
'/**
 * <description>
 *
 * @return <variableType>
 */
public function <methodName>(<criteriaArgument>)
{<criteriaGetter>
<spaces>return $this-><fieldName><forcedArray>;
}';


    /**
     * @var string
     */
    protected static $addMethodTemplate =
'/**
 * <description>
 *
 * @param <variableType> $<variableName>
 *
 * @return <entity>
 */
protected function <methodName>(<methodTypeHint>$<variableName>)
{
<spaces>$this-><fieldName>[] = $<variableName>;

<spaces>return $this;
}';

    /**
     * @var string
     */
    protected static $removeMethodTemplate =
'/**
 * <description>
 *
 * @param <variableType> $<variableName>
 */
protected function <methodName>(<methodTypeHint>$<variableName>)
{
<spaces>$this-><fieldName>->removeElement($<variableName>);
}';

    /**
     * @var string
     */
    protected static $replaceMethodTemplate =
'/**
 * <description>
 *
 * @param \<relEntity>[] $<variableName>
 * @return self
 */
protected function <methodName>(array $<variableName>)
{
<spaces>$updatedEntities = [];
<spaces>$fallBackId = -1;
<spaces>foreach ($<variableName> as $entity) {
<spaces><spaces>$index = $entity->getId() ? $entity->getId() : $fallBackId--;
<spaces><spaces>$updatedEntities[$index] = $entity;
<spaces><spaces>$entity->set<mappedBy>($this);
<spaces>}
<spaces>$updatedEntityKeys = array_keys($updatedEntities);

<spaces>foreach ($this-><fieldName> as $key => $entity) {
<spaces><spaces>$identity = $entity->getId();
<spaces><spaces>if (in_array($identity, $updatedEntityKeys)) {
<spaces><spaces><spaces>$this-><fieldName>[$key] = $updatedEntities[$identity];
<spaces><spaces>} else {
<spaces><spaces><spaces>$this-><removeRel>($key);
<spaces><spaces>}
<spaces><spaces>unset($updatedEntities[$identity]);
<spaces>}

<spaces>foreach ($updatedEntities as $entity) {
<spaces><spaces>$this-><addRel>($entity);
<spaces>}

<spaces>return $this;
}';
    /**
     * {@inheritDoc}
     */
    public function writeEntityClass(ClassMetadataInfo $metadata, $outputDirectory)
    {
        return parent::writeEntityClass($this->transformMetadata($metadata), $outputDirectory);
    }

    protected function transformMetadata(ClassMetadataInfo $metadata)
    {
        foreach ($metadata->associationMappings as $key => $association) {
            $metadata->associationMappings[$key]['targetEntity'] .= 'Interface';
        }

        return $metadata;
    }

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
            $this->generateEntityRealUse($metadata),
            $this->generateEntityDocBlock($metadata),
            $this->generateEntityClassName($metadata),
            $this->generateEntityBody($metadata)
        );

        $code = str_replace($placeHolders, $replacements, static::$classTemplate) . "\n";
        $code = str_replace('\\Doctrine\\Common\\Collections\\Collection', 'ArrayCollection', $code);
        $code = str_replace('\\Doctrine\\Common\\Collections\\ArrayCollection', 'ArrayCollection', $code);

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
        if ($metadata->isEmbeddedClass) {
            return 'class ' . $className;
        }

        $class = 'abstract class '
            . $className
            . ($this->extendsClass() ? ' extends ' . $this->getClassToExtendName() : null);

        return $class;
    }


    protected function generateEntityRealUse(ClassMetadata $metadata)
    {
        $useCollections = false;

        foreach ($metadata->associationMappings as $mapping) {
             if ($mapping['mappedBy']) {
                 $useCollections = true;
                 break;
             }
        }

        $response = [
            'use Assert\Assertion;'
        ];

        if (!$metadata->isEmbeddedClass  && !$metadata->isMappedSuperclass) {
            $response[] = 'use Core\Domain\Model\EntityInterface;';
        }

        if (!$metadata->isEmbeddedClass) {
            $response[] = 'use Core\Application\DataTransferObjectInterface;';
        }

        if ($useCollections) {
            $response[] = 'use Doctrine\\Common\\Collections\\ArrayCollection;';
            $response[] = 'use Doctrine\\Common\\Collections\\Criteria;';
        }

        return "\n". implode("\n", $response) ."\n";
    }

    /**
     * {@inheritDoc}
     */
    protected function generateFieldMappingPropertyDocBlock(array $fieldMapping, ClassMetadataInfo $metadata)
    {
        $field = (object) $fieldMapping;
        if (!array_key_exists('options', $fieldMapping)) {
            $fieldMapping['options'] = null;
        }
        $options  = (object) $fieldMapping['options'];

        $lines = array();
        $lines[] = $this->spaces . '/**';

        if (strtolower($field->fieldName) !== strtolower($field->columnName)) {
            $lines[] = $this->spaces . ' * @column ' . $field->columnName;
        }

        if (isset($options->comment)) {
            $comment = substr($options->comment, 1, -1);
            $lines[] = $this->spaces . ' * @comment ' . $comment;
        }

        $lines[] = $this->spaces . ' * @var ' . $this->getType($fieldMapping['type']);
        $lines[] = $this->spaces . ' */';

        return implode("\n", $lines);
    }

    /**
     * {@inheritDoc}
     */
    protected function generateEntityConstructor(ClassMetadataInfo $metadata)
    {
        if ($this->hasMethod('__construct', $metadata)) {
            return '';
        }

        if ($metadata->isEmbeddedClass && $this->embeddablesImmutable) {
            throw new \Exception('override generateEmbeddableConstructor private method');
            //return $this->generateEmbeddableConstructor($metadata);
        }

        $collections = array();
        foreach ($metadata->associationMappings as $mapping) {
            if ($mapping['type'] & ClassMetadataInfo::TO_MANY) {
                $collections[] = '$this->'.$mapping['fieldName'].' = new \Doctrine\Common\Collections\ArrayCollection();';
            }
        }

        list(
            $constructorArguments,
            $voContructor,
            $requiredSetters,
            $requiredGetters,
            $setters,
            $getters,
            $toArray,
            $updateFrom,
            $fromArray
        ) = $this->getConstructorFields($metadata);

        if (empty($collections) && empty($getters)) {
            return '';
        }

        if ($metadata->isEmbeddedClass || $this->embeddablesImmutable) {
            $response = static::$valueObjectConstructorMethodTemplate;
        } else {
            $response = static::$constructorMethodTemplate;
        }

        $spaces = str_repeat($this->spaces, 2);

        $requiredFields = '';
        $requiredFieldSetters = '';
        $requiredFieldGetters = '';
        $fromDTO = '';
        $updateFromDTO = '';
        $toDTO = '';
        $toArrayGetters = '';
        $lineBreak = "\n";

        if (!empty($requiredSetters)) {

            $requiredFields = implode(', ', $constructorArguments);
            $requiredFieldSetters =
                $this->spaces
                . '$this->'
                . implode("\n". $this->spaces .'$this->', $requiredSetters);

            $requiredFieldGetters .=
                "\n"
                . $spaces
                . '$dto->'
                . implode(",\n" . $spaces.'$dto->', $requiredGetters);


            if (!empty($voContructor)) {

                foreach ($voContructor as $key => $value) {
                    $requiredFieldGetters .=
                        ",\n" . $spaces
                        . '$'
                        . $key;
                }

                $requiredFieldGetters .= "\n" . $this->spaces;
            }

            if (strlen($requiredFields) > 40) {
                $requiredFields = "\n". $this->spaces . str_replace(', ', ",\n". $this->spaces, $requiredFields) . "\n";
                $lineBreak = ' ';
            }
        }

        if (is_array($voContructor)) {

            foreach ($voContructor as $key => $value) {
                $voContructor[$key] = implode(" ", $value);
            }

            $voContructor = implode("\n", $voContructor);
            if (!empty($voContructor)) {
                $voContructor = "\n" . $voContructor;
            }
        }

        if (!empty($setters)) {
            $fromDTO = "\n" . $spaces . '->' . implode("\n" . $spaces . '->', $setters) . "\n" . $this->spaces;
        }

        if (!empty($getters)) {
            $toDTO = "\n" . $spaces . '->' . implode("\n" . $spaces . '->', $getters);
        }

        if (!empty($toArray)) {
            $toArrayGetters = "\n" . $spaces . implode(",\n" . $spaces, $toArray) . "\n" . $this->spaces;
        }

//        if (!empty($fromArray)) {
//            $fromArraySetters = $this->spaces . implode("\n" . $spaces, $fromArray);
//        }

        if (!empty($updateFrom)) {
            $updateFromDTO = '$this' . "\n" . $spaces . '->' . implode("\n" . $spaces . '->', $updateFrom) . ";\n\n";
        }

        $response = str_replace('<requiredFields>', $requiredFields, $response);
        $response = str_replace('<requiredFieldsSetters>', $requiredFieldSetters, $response);
        $response = str_replace('<requiredFieldsGetters>', $requiredFieldGetters, $response);

        $namespaceSegments = explode('\\', $metadata->namespace);
        $namespace = end($namespaceSegments) . 'DTO';
        $response = str_replace('<dtoClass>', $namespace, $response);

        $response = str_replace('<voContructor>', $voContructor, $response);
        $response = str_replace('<fromDTO>', $fromDTO, $response);
        $response = str_replace('<updateFromDTO>', $updateFromDTO, $response);

        $response = str_replace('<toDTO>', $toDTO, $response);
        $response = str_replace('<lineBreak>', $lineBreak, $response);

        $response = str_replace('<toArray>', $toArrayGetters, $response);
//        $response = str_replace('<fromArray>', $fromArraySetters, $response);

        if (!empty($collections)) {

            $prefix = empty($requiredSetters) ? '' : "\n\n" . $this->spaces;
            $response = str_replace(
                "<collections>",
                $prefix . implode("\n" . $this->spaces, $collections),
                $response
            );

        } else {

            $response =  str_replace(
                "<collections>",
                '',
                $response
            );
        }

        $response = $this->prefixCodeWithSpaces($response);
        return $response;
    }

    protected function getConstructorFields(ClassMetadataInfo $metadata)
    {
        $constructorArguments = [];
        $voContructor = [];
        $requiredSetters = [];
        $requiredGetters = [];
        $setters = [];
        $getters = [];
        $toArray = [];
        $updateFrom = [];
        $fromArray = [];

        $mappings = array_merge($metadata->fieldMappings, $metadata->associationMappings);

        foreach ($mappings as $fieldMapping) {

            $field = (object) $fieldMapping;
            $fieldName = $field->fieldName;
            $attribute = Inflector::camelize($fieldName);

            if (!array_key_exists('options', $fieldMapping)) {
                $fieldMapping['options'] = null;
            }
            $options  = (object) $fieldMapping['options'];

            //$fromArray[] = $this->getFromArrayMethod($attribute, $fieldName, $field);
            if (isset($field->targetEntity)) {

                $isOneToMany = ($field->type == ClassMetadataInfo::ONE_TO_MANY);
                if ($isOneToMany) {

                    $updateFrom[] =
                        'replace'
                        . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName)
                        . '())';
                    $setters[$attribute] = 'replace'
                        . Inflector::classify($fieldName)
                        . '($dto->get'
                        . Inflector::classify($fieldName)
                        . '())';

                } else {

                    if (!isset($field->declared)) {
                        $updateFrom[] = 'set' . Inflector::classify($fieldName)
                            . '($dto->get' . Inflector::classify($fieldName) . '())';

                        $setters[$attribute] = 'set' . Inflector::classify($fieldName)
                            . '($dto->get' . Inflector::classify($fieldName) . '())';
                    }
                }

                list($associationToArray, $associationGetterAs) = $this
                    ->getConstructorAssociationFields($attribute, $fieldName, $isOneToMany);

                if (!is_null($associationToArray)) {
                    $toArray[] = $associationToArray;
                }

                if (!isset($field->declared)) {
                    $getters[$attribute] = $associationGetterAs;
                }

                continue;
            }

            if (strpos($fieldName, '.') && $metadata->isMappedSuperclass) {

                $segments = explode('.', $fieldName);
                $options = $fieldMapping['options'];
                $comment = array_key_exists('comment', $options)
                    ? $options['comment']
                    : '';

                $isMl = stripos($comment, '[ml]') !== false;
                $isFso = stripos($comment, '[fso') !== false;
                $ignorableFld = $segments[0] === $segments[1];

                $addVoContructor = ($isMl && $ignorableFld) || $isFso;

                if ($addVoContructor) {

                    $varName = $segments[0];
                    if (!array_key_exists($varName, $voContructor)) {
                        $voContructor[$varName] = [];
                    }
                    $voContructor[$varName][] = $this->getVoConstructor($varName, $metadata->fieldMappings);
                }

                $toArray[] =$this->embeddedToArrayGetter($segments);
                $setterMethod = 'set' . Inflector::classify($segments[0]);
                if ($segments[0] !== $segments[1]) {
                    $setterMethod .= Inflector::classify($segments[1]);
                }

                $getters[$segments[1]] =
                    $setterMethod
                    . '($this->get'
                    . Inflector::classify($segments[0])
                    . '()->get'
                    . Inflector::classify($segments[1])
                    . '()'
                    . ')';

                if ((isset($field->id) && $field->id) || isset($options->defaultValue)) {
                    continue;
                }

                $updateFrom[$segments[0]] =
                    'set'
                    . Inflector::classify($segments[0])
                    . '($' . $segments[0] . ')';

            } else if (!strpos($fieldName, '.') || $metadata->isMappedSuperclass) {

                if (!isset($field->declared)) {
                    $toArray[]  = '\''. $attribute .'\' => $this->get' . Inflector::classify($fieldName) . '()';
                    $getters[$attribute] = 'set' . Inflector::classify($fieldName)
                        . '($this->get' . Inflector::classify($fieldName) . '())';
                }

                if ((isset($field->id) && $field->id) || isset($options->defaultValue)) {
                    continue;
                }

                if (!isset($field->declared)) {
                    $updateFrom[] = 'set' . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName) . '())';
                }

                if (isset($field->nullable) && $field->nullable && !$metadata->isEmbeddedClass && !isset($field->declared)) {
                    $setters[$attribute] = 'set' . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName) . '())';
                    continue;
                }
            }

            if (array_key_exists('originalClass', $fieldMapping) && !isset($field->declared)) {
                $class = substr($fieldMapping['originalClass'], strrpos($fieldMapping['originalClass'], '\\') + 1);

                $declaredField = $fieldMapping['declaredField'];
                $attribute = $class . ' $' . $declaredField;

                $setter = 'set' . Inflector::classify($declaredField) . '($'. $declaredField .');';
                if (end($requiredSetters) !== $setter && $metadata->isMappedSuperclass) {
                    $requiredSetters[$attribute] = $setter;
                }
            } else if (!isset($field->declared)) {

                $setter = 'set' . Inflector::classify($fieldName) . '($'. $attribute .');';
                $getter = 'get' . Inflector::classify($fieldName) . '()';

                if (!isset($fieldMapping['declared'])) {
                    $requiredSetters[$attribute] = $setter;
                    $requiredGetters[$attribute] = $getter;
                }
            }

            if ($field->type[0] === '\\') {
                $class = substr($field->type, strrpos($field->type, '\\') + 1);
                $attribute = $class. ' $' . $attribute;
            } else if (strpos($attribute, ' ') === false) {
                $attribute = '$' . $attribute;
            }

            if (end($constructorArguments) === $attribute) {
                continue;
            }

            $constructorArguments[] = $attribute;
        }

        return array(
            $constructorArguments,
            $voContructor,
            $requiredSetters,
            $requiredGetters,
            $setters,
            $getters,
            $toArray,
            $updateFrom,
            $fromArray
        );
    }

    /**
     * @param $segments
     * @param $toArray
     * @return array
     */
    protected function embeddedToArrayGetter($segments)
    {
        return
            '\''
            . $segments[1]
            . '\' => $this->get'
            . Inflector::classify($segments[0])
            . '()->get' . Inflector::classify($segments[1])
            . '()';
    }

    protected function getVoConstructor($voName, array $fieldMappings)
    {
        $arguments = [];
        $class = [];

        foreach ($fieldMappings as $fieldMapping) {

            if (false === strpos($fieldMapping['fieldName'], '.')) {
                continue;
            }
            $segments = explode('.', $fieldMapping['fieldName']);
            if ($segments[0] !== $voName) {
                continue;
            }

            $class = explode("\\", $fieldMapping['originalClass']);
            $arguments[] =
                str_repeat($this->spaces, 1)
                . '$dto->get'
                . end($class)
                . Inflector::classify($segments[1])
                . '()';
        }
        $response = '$' . $voName . ' = new ' . end($class) . "(%s);\n";

        if (!empty($arguments)) {

            $value =
                "\n"
                . $this->spaces
                . implode(",\n" . str_repeat($this->spaces, 1), $arguments)
                . "\n"
                . $this->spaces;

            $response =
                $this->spaces
                . sprintf($response,$value);

        } else {
            $response = sprintf($response,'');
        }

        return $response;
    }

    /**
     * @param string $attribute
     * @param string $fieldName
     * @param stdClass $field
     * @return string
     * @deprecated
     *
    protected function getFromArrayMethod($attribute, $fieldName, \stdClass $field)
    {
        if (isset($field->mappedBy)) {
            return '';
        }

        return '->set' . ucfirst($attribute) .'('
            . 'isset($data[\'' . $fieldName . '\'])'
            . ' ? '
            . '$data[\'' . $fieldName . '\']'
            . ' : null)';
    }

    /**
     * @param string $attribute
     * @param string $fieldName
     * @return array
     */
    protected function getConstructorAssociationFields($attribute, $fieldName, $isOneToMany)
    {
        $response = [];

        if ($isOneToMany) {

            $response[] = null;
            $response[] =
                'set' . Inflector::classify($fieldName) . '('
                . '$this->get' . Inflector::classify($fieldName) . '()'
                . ')';

            return $response;
        }

        $response[]  =
            '\'' . $attribute .'Id\' => '
            . '$this->get' . Inflector::classify($fieldName) . '()'
            . ' ? '
            . '$this->get' . Inflector::classify($fieldName) . '()->getId()'
            . ' : null';

        $response[] =
            'set' . Inflector::classify($fieldName) . 'Id('
            . '$this->get' . Inflector::classify($fieldName) . '()'
            . ' ? '
            . '$this->get' . Inflector::classify($fieldName) . '()->getId()'
            . ' : null'
            . ')';

        return $response;
    }

    /**
     * {@inheritDoc}
     */
    protected function generateEntityStubMethods(ClassMetadataInfo $metadata)
    {
        $fieldMappings = $metadata->fieldMappings;
        $associationMapping = $metadata->associationMappings;
        $embeddedClasses = $metadata->embeddedClasses;

        $metadata->fieldMappings = [];
        $metadata->associationMappings = [];

        if ($this->skipEmbeddedMethods) {
            $metadata->embeddedClasses = [];
        }

        $parentMethodsStr = parent::generateEntityStubMethods($metadata);
        $parentMethods = explode("\n\n", $parentMethodsStr);

        $metadata->fieldMappings = $fieldMappings;
        $metadata->embeddedClasses = $embeddedClasses;
        $methods = array();

        foreach ($metadata->fieldMappings as $fieldMapping) {

            if (isset($fieldMapping['declaredField']) &&
                isset($metadata->embeddedClasses[$fieldMapping['declaredField']])
            ) {
                continue;
            }

            if (isset($fieldMapping['declared']) && $fieldMapping['declared'] !== $metadata->name) {
                continue;
            }

            if (( ! isset($fieldMapping['id']) ||
                    ! $fieldMapping['id'] ||
                    $metadata->generatorType == ClassMetadataInfo::GENERATOR_TYPE_NONE
                ) && (! $metadata->isEmbeddedClass || ! $this->embeddablesImmutable)
            ) {
                if ($code = $this->generateEntityStubMethod($metadata, 'set', $fieldMapping['fieldName'], $fieldMapping['type'])) {
                    $methods[] = $code;
                }
            }

            if ($code = $this->generateEntityStubMethod($metadata, 'get', $fieldMapping['fieldName'], $fieldMapping['type'])) {
                $methods[] = $code;
            }
        }

        $metadata->associationMappings = $associationMapping;
        foreach ($metadata->associationMappings as $associationMapping) {

            if (isset($associationMapping['declared'])) {
                continue;
            }

            if ($associationMapping['type'] & ClassMetadataInfo::TO_ONE) {
                $nullable = $this->isAssociationIsNullable($associationMapping) ? 'null' : null;

                if ($code = $this->generateEntityStubMethod($metadata, 'set', $associationMapping['fieldName'], $associationMapping['targetEntity'], $nullable)) {
                    $methods[] = $code;
                }
                if ($code = $this->generateEntityStubMethod($metadata, 'get', $associationMapping['fieldName'], $associationMapping['targetEntity'])) {
                    $methods[] = $code;
                }
            } elseif ($associationMapping['type'] & ClassMetadataInfo::TO_MANY) {
                if ($code = $this->generateEntityStubMethod($metadata, 'add', $associationMapping['fieldName'], $associationMapping['targetEntity'])) {
                    $methods[] = $code;
                }
                if ($code = $this->generateEntityStubMethod($metadata, 'remove', $associationMapping['fieldName'], $associationMapping['targetEntity'])) {
                    $methods[] = $code;
                }
                if ($code = $this->generateEntityStubMethod($metadata, 'replace', $associationMapping['fieldName'], 'IteratorAggregate')) {
                    $methods[] = $code;
                }
                if ($code = $this->generateEntityStubMethod($metadata, 'get', $associationMapping['fieldName'], 'Doctrine\Common\Collections\Collection')) {
                    $methods[] = $code;
                }
            }
        }

        $response = array_merge($methods, $parentMethods);

        if ($this->codeCoverageIgnoreBlock) {
            array_unshift($response, $this->spaces . "// @codeCoverageIgnoreStart");
            $response[] = $this->spaces . "// @codeCoverageIgnoreEnd";
        }

        return implode("\n\n", $response);
    }

    /**
     * @param ClassMetadataInfo $metadata
     *
     * @return string
     */
    protected function generateEntityAssociationMappingProperties(ClassMetadataInfo $metadata)
    {
        $lines = array();

        foreach ($metadata->associationMappings as $associationMapping) {
            if ($this->hasProperty($associationMapping['fieldName'], $metadata)) {
                continue;
            }

            if (isset($associationMapping['declared'])) {
                continue;
            }

            $lines[] = $this->generateAssociationMappingPropertyDocBlock($associationMapping, $metadata);
            $lines[] = $this->spaces . $this->fieldVisibility . ' $' . $associationMapping['fieldName']
                . ($associationMapping['type'] == 'manyToMany' ? ' = array()' : null) . ";\n";
        }

        return implode("\n", $lines);
    }

    /**
     * @param ClassMetadataInfo $metadata
     *
     * @return string
     */
    protected function generateEntityEmbeddedProperties(ClassMetadataInfo $metadata)
    {
        $lines = array();

        foreach ($metadata->embeddedClasses as $fieldName => $embeddedClass) {
            if (
                isset($embeddedClass['declaredField'])
                || isset($embeddedClass['declared'])
                || $this->hasProperty($fieldName, $metadata)
            ) {
                continue;
            }

            $class = $embeddedClass['class'];
            $classSegments = explode('\\', $embeddedClass['class']);
            $embeddedClass['class'] = end($classSegments);

            $embeddedProperties = $this->generateEmbeddedPropertyDocBlock($embeddedClass);
            $embeddedProperties = str_replace('\\' . $embeddedClass['class'] , $embeddedClass['class'] , $embeddedProperties);

            $lines[] = $embeddedProperties;
            $lines[] = $this->spaces . $this->fieldVisibility . ' $' . $fieldName . ";\n";
        }

        return implode("\n", $lines);
    }

    /**
     * @param array $segments
     * @return string
     */
    protected function getEmbeddedVarName(array $segments)
    {
        return $segments[0] !== $segments[1]
            ? $segments[0] . ucfirst($segments[1])
            : $segments[0];
    }

    /**
     * {@inheritDoc}
     */
    protected function isAssociationIsNullable($associationMapping)
    {
        if ($associationMapping['inversedBy']) {
            return true;
        }

        return parent::isAssociationIsNullable($associationMapping);
    }

    /**
     * {@inheritDoc}
     */
    protected function generateEntityStubMethod(ClassMetadataInfo $metadata, $type, $fieldName, $typeHint = null,  $defaultValue = null)
    {
        $currentField = null;
        $isNullable = false;
        $visibility = $metadata->isEmbeddedClass
            ? 'protected'
            : 'protected';

        if (array_key_exists($fieldName, $metadata->fieldMappings)) {
            $currentField = (object) $metadata->fieldMappings[$fieldName];
            $isNullable = isset($currentField->nullable) && $currentField->nullable;
        }

        if (is_null($defaultValue) && $isNullable) {
            $defaultValue = 'null';
        }

        if ($typeHint[0] === '\\') {
            // typehints are always prefixed in parent::generateEntityStubMethod
            $typeHint = substr($typeHint, 1);
        }

        $isCollection = strpos($typeHint, 'Doctrine\\Common\\Collections\\Collection') !== false;
        if ($isCollection) {
            $typeHint = 'array';
        }

        $parentResponse = parent::generateEntityStubMethod($metadata, $type, $fieldName, $typeHint,  $defaultValue);
        $parentResponse = str_replace('\\' . $metadata->namespace . '\\', '', $parentResponse);

        $assertions = [];

        if ($currentField) {
            $comment = '';
            if (isset($currentField->options) && isset($currentField->options['comment'])) {
                $comment = $currentField->options['comment'];
            }

            $spaces = '';
            if ($isNullable) {
                $spaces = str_repeat(' ', 4);
            }

            if (!$isNullable) {
                $assertions[] = $spaces. AssertionGenerator::notNull($fieldName);
            } else {
                $assertions[] = 'if (!is_null($' . $fieldName . ')) {';
            }

            if (in_array($currentField->type, ['boolean'])) {
                $assertions = array_merge(
                    $assertions,
                    [$spaces. AssertionGenerator::boolean($currentField->fieldName)]
                );
            }

            $arraySpacerFn = function ($value) use ($spaces) {
                return str_repeat($spaces, 1) .  $value;
            };

            if (in_array($currentField->type, ['smallint', 'integer', 'bigint'])) {

                $integerAssertions = $this->getIntegerAssertions($currentField);
                $integerAssertions = array_map($arraySpacerFn, $integerAssertions);

                $assertions = array_merge(
                    $assertions,
                    $integerAssertions
                );
            }

            if (in_array($currentField->type, ['decimal', 'float'])) {
                $floatAssertions = $this->getFloatAssertions($currentField);
                $floatAssertions = array_map($arraySpacerFn, $floatAssertions);

                $assertions = array_merge(
                    $assertions,
                    $floatAssertions
                );
            }

            if (in_array($currentField->type, ['string', 'text'])) {
                $stringAssertions = $this->getStringAssertions($currentField);
                $stringAssertions = array_map($arraySpacerFn, $stringAssertions);
                $assertions = array_merge(
                    $assertions,
                    $stringAssertions
                );
            }

            if (preg_match('/\[enum:(?P<fieldValues>.+)\]/', $comment, $matches)) {
                $acceptedValues = explode('|', $matches['fieldValues']);
                $acceptedValues = array_map($arraySpacerFn, $acceptedValues);

                $assertions[] = AssertionGenerator::choice(
                    $currentField->fieldName,
                    $acceptedValues
                );
            }

            if ($isNullable) {
                $assertions[] = '}';
            }
        }

        if (!empty($assertions)) {
            $assertions = $this->prefixCodeWithSpaces(implode("\n", $assertions), 2);
            $assertions = $assertions . "\n\n". str_repeat($this->spaces, 2);
        } else {
            $assertions =  str_repeat($this->spaces, 2);
        }

        $replacements = array(
            $this->spaces . '<assertions>' => $assertions,
            '<visibility>' => $visibility
        );

        if ($type == 'replace') {
            $replacements['<addRel>'] = Inflector::singularize(
                'add' . Inflector::classify($fieldName)
            );
            $replacements['<removeRel>'] = Inflector::singularize(
                'remove' . Inflector::classify($fieldName)
            );
            $replacements['<relEntity>'] = $metadata->associationMappings[$fieldName]['targetEntity'];
        }

        if (array_key_exists($fieldName, $metadata->associationMappings)) {

            $field = (object) $metadata->associationMappings[$fieldName];
            $isOneToMany = ($field->type == ClassMetadataInfo::ONE_TO_MANY);

            if ($field->inversedBy && $type === 'set') {
                $replacements['<visibility>'] = 'public';
            }

            if ($isOneToMany && !in_array($type, ['set', 'get'])) {
                $replacements['<mappedBy>'] = ucFirst($field->mappedBy);
            }
        }

        $response = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $parentResponse
        );


        //Collection + Criteria
        $criteriaArgument = '';
        $criteriaGetter = '';
        $forcedArray = '';

        if ($isCollection && $type === 'get') {

            $criteriaArgument = 'Criteria $criteria = null';
            $criteriaGetter = "\n";
            $criteriaGetter .= "if (!is_null(\$criteria)) {\n";
            $criteriaGetter .= $this->spaces;
            $criteriaGetter .= 'return $this->'. $fieldName ."->matching(\$criteria)->toArray();\n";
            $criteriaGetter .= "}\n";

            $forcedArray = '->toArray()';

            $criteriaGetter = $this->prefixCodeWithSpaces($criteriaGetter, 2);
        }

        $response = str_replace(
            ['<criteriaArgument>', '<criteriaGetter>', '<forcedArray>'],
            [$criteriaArgument, $criteriaGetter, $forcedArray],
            $response
        );

        return $response;
    }

    private function getFloatAssertions($currentField)
    {
        $assertions = [];
        if (!isset($currentField->options)) {
            $currentField->options = [];
        }
        $options = (object) $currentField->options;

        $assertions[] = AssertionGenerator::float($currentField->fieldName);

        if (isset($options->unsigned) && $options->unsigned) {
            $assertions[] = AssertionGenerator::greaterOrEqualThan($currentField->fieldName, 0);
        }

        if (
            !empty($assertions) &&
            isset($currentField->nullable) &&
            $currentField->nullable
        ) {

            foreach ($assertions as $key => $value) {
                $assertions[$key] = $this->spaces . $assertions[$key];
            }

            array_unshift(
                $assertions,
                AssertionGenerator::notNullCondition($currentField->fieldName)
            );
            $assertions[] = '}';
        }

        return $assertions;
    }

    private function getIntegerAssertions($currentField)
    {
        $assertions = [];
        if (!isset($currentField->options)) {
            $currentField->options = [];
        }
        $options = (object) $currentField->options;

        $assertions[] = AssertionGenerator::integer($currentField->fieldName);

        if (isset($options->unsigned) && $options->unsigned) {
            $assertions[] = AssertionGenerator::greaterOrEqualThan($currentField->fieldName, 0);
        }

        if (
            !empty($assertions) &&
            isset($currentField->nullable) &&
            $currentField->nullable
        ) {

            foreach ($assertions as $key => $value) {
                $assertions[$key] = $this->spaces . $assertions[$key];
            }

            array_unshift(
                $assertions,
                AssertionGenerator::notNullCondition($currentField->fieldName)
            );
            $assertions[] = '}';
        }

        return $assertions;
    }

    private function getStringAssertions($currentField)
    {
        $assertions = [];
        if (isset($currentField->length)) {
            $assertions[] = AssertionGenerator::maxLength(
                $currentField->fieldName,
                $currentField->length
            );
        }

        return $assertions;
    }
}
