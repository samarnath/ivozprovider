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
    protected $codeCoverageIgnoreBlock = true;

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
 * @param <dtoClass> $dto
 * @return self
 */
public static function fromDTO(DataTransferObjectInterface $dto)
{
    Assertion::isInstanceOf($dto, <dtoClass>::class);

    $self = new self(<requiredFieldsGetters>);

    return $self<fromDTO>;
}

/**
 * @param <dtoClass> $dto
 * @return self
 */
public function updateFromDTO(DataTransferObjectInterface $dto)
{
    Assertion::isInstanceOf($dto, <dtoClass>::class);

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
 * @return <entity>
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
<spaces>return $this-><fieldName>;
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
 * @param <variableType> $<variableName>
 * @return <entity>
 */
protected function <methodName>(<methodTypeHint>$<variableName>)
{
<spaces>$updatedEntities = [];
<spaces>$fallBackId = -1;
<spaces>foreach ($<variableName> as $entity) {
<spaces><spaces>$updatedEntities[$entity->getId() ?? $fallBackId--] = $entity;
<spaces><spaces>$entity->set<mappedBy>($this);
<spaces>}
<spaces>$updatedEntityKeys = array_keys($updatedEntities);

<spaces>foreach ($this-><fieldName> as $key => $entity) {
<spaces><spaces>$identity = $entity->getId();
<spaces><spaces>if (in_array($identity, $updatedEntityKeys)) {
<spaces><spaces><spaces>$this->relPatterns[$key] = $updatedEntities[$identity];
<spaces><spaces>} else {
<spaces><spaces><spaces>$this-><fieldName>->remove($key);
<spaces><spaces>}
<spaces><spaces>unset($updatedEntities[$identity]);
<spaces>}

<spaces>foreach ($updatedEntities as $entity) {
<spaces><spaces>$this-><fieldName>->add($entity);
<spaces>}

<spaces>return $this;
}';

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
        $class = 'class '
            . $this->getClassName($metadata)
            . ($this->extendsClass() ? ' extends ' . $this->getClassToExtendName() : null);

        $class .= ' implements EntityInterface';

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

        $dtoClass = str_replace('\\Model\\', '\\Application\\DTO\\',  $metadata->namespace) . 'DTO';

        $response = [
            'use Assert\\Assertion;',
            'use ' . $dtoClass . ';',
            'use Core\\Model\\EntityInterface;',
            'use Core\Application\DataTransferObjectInterface;',
        ];
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

        $response = static::$constructorMethodTemplate;
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

            $requiredFields = '$' . implode(', $', array_keys($requiredSetters)) . '';
            $requiredFieldSetters = $this->spaces
                . '$this->'
                . implode("\n". $this->spaces .'$this->', $requiredSetters);

            $requiredFieldGetters = "\n"
                . $spaces
                .'$dto->'
                . implode(",\n". $spaces.'$dto->', $requiredGetters)
                . "\n" . $this->spaces;

            if (strlen($requiredFields) > 40) {

                $requiredFields = "\n". $this->spaces . str_replace(', ', ",\n". $this->spaces, $requiredFields) . "\n";
                $lineBreak = ' ';
            }
        }

        if (!empty($setters)) {
            $fromDTO = "\n" . $spaces . '->' . implode("\n" . $spaces . '->', $setters);
        }

        if (!empty($getters)) {
            $toDTO = "\n" . $spaces . '->' . implode("\n" . $spaces . '->', $getters);
        }

        if (!empty($toArray)) {
            $toArrayGetters = "\n" . $spaces . implode(",\n" . $spaces, $toArray) . "\n" . $this->spaces;
        }

        if (!empty($fromArray)) {
            $fromArraySetters = $this->spaces . implode("\n" . $spaces, $fromArray);
        }

        if (!empty($updateFrom)) {
            $updateFromDTO = '$this' . "\n" . $spaces . '->' . implode("\n" . $spaces . '->', $updateFrom) . ";\n\n";
        }

        $response = str_replace('<requiredFields>', $requiredFields, $response);
        $response = str_replace('<requiredFieldsSetters>', $requiredFieldSetters, $response);
        $response = str_replace('<requiredFieldsGetters>', $requiredFieldGetters, $response);

        $namespaceSegments = explode('\\', $metadata->namespace);
        $namespace = end($namespaceSegments) . 'DTO';
        $response = str_replace('<dtoClass>', $namespace, $response);

        $response = str_replace('<fromDTO>', $fromDTO, $response);
        $response = str_replace('<updateFromDTO>', $updateFromDTO, $response);

        $response = str_replace('<toDTO>', $toDTO, $response);
        $response = str_replace('<lineBreak>', $lineBreak, $response);

        $response = str_replace('<toArray>', $toArrayGetters, $response);
        $response = str_replace('<fromArray>', $fromArraySetters, $response);

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

            if ($metadata->isEmbeddedClass || $this->embeddablesImmutable) {
                continue;
            }

            $fromArray[] = $this->getFromArrayMethod($attribute, $fieldName, $field);
            if (isset($field->targetEntity)) {

                $isOneToMany = ($field->type == ClassMetadataInfo::ONE_TO_MANY);

                if ($isOneToMany) {

                    $updateFrom[] = 'replace' . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName) . '())';
                    $setters[$attribute] = 'replace' . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName) . '())';

                } else {

                    $updateFrom[] = 'set' . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName) . '())';
                    $setters[$attribute] = 'set' . Inflector::classify($fieldName)
                        . '($dto->get' . Inflector::classify($fieldName) . '())';
                }

                list($associationToArray, $associationGetterAs) = $this
                    ->getConstructorAssociationFields($attribute, $fieldName, $isOneToMany);

                if (!is_null($associationToArray)) {
                    $toArray[] = $associationToArray;
                }

                $getters[$attribute] = $associationGetterAs;

                continue;
            }

            $toArray[]  = '\''. $attribute .'\' => $this->get' . Inflector::classify($fieldName) . '()';

            $getters[$attribute] = 'set' . Inflector::classify($fieldName)
                . '($this->get' . Inflector::classify($fieldName) . '())';

            if ((isset($field->id) && $field->id) || isset($options->defaultValue)) {
                continue;
            }

            $updateFrom[] = 'set' . Inflector::classify($fieldName)
                . '($dto->get' . Inflector::classify($fieldName) . '())';

            if (isset($field->nullable) && $field->nullable) {
                $setters[$attribute] = 'set' . Inflector::classify($fieldName)
                    . '($dto->get' . Inflector::classify($fieldName) . '())';
                continue;
            }

            $setter = 'set' . Inflector::classify($fieldName) . '($'. $attribute .');';
            $getter = 'get' . Inflector::classify($fieldName) . '()';

            $requiredSetters[$attribute] = $setter;
            $requiredGetters[$attribute] = $getter;
        }

        return [
            $requiredSetters,
            $requiredGetters,
            $setters,
            $getters,
            $toArray,
            $updateFrom,
            $fromArray
        ];
    }

    /**
     * @param string $attribute
     * @param string $fieldName
     * @param stdClass $field
     * @return string
     */
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
        $metadata->fieldMappings = [];
        $metadata->associationMappings = [];

        $parentMethodsStr = parent::generateEntityStubMethods($metadata);
        $parentMethods = explode("\n\n", $parentMethodsStr);

        $metadata->fieldMappings = $fieldMappings;
        $methods = array();

        foreach ($metadata->fieldMappings as $fieldMapping) {

            if (isset($fieldMapping['declaredField']) &&
                isset($metadata->embeddedClasses[$fieldMapping['declaredField']])
            ) {
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
        $defaultVisibility = 'protected';

        if (array_key_exists($fieldName, $metadata->fieldMappings)) {
            $currentField = (object) $metadata->fieldMappings[$fieldName];
            $isNullable = isset($currentField->nullable) && $currentField->nullable;
        }

        if (is_null($defaultValue) && $isNullable) {
            $defaultValue = 'null';
        }

        $parentResponse = parent::generateEntityStubMethod($metadata, $type, $fieldName, $typeHint,  $defaultValue);
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
            '<visibility>' => $defaultVisibility
        );

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
        $isCollection = strpos($typeHint, 'Doctrine\\Common\\Collections\\Collection') !== false;
        $criteriaArgument = '';
        $criteriaGetter = '';

        if ($isCollection && $type === 'get') {

            $criteriaArgument = 'Criteria $criteria = null';
            $criteriaGetter = "\n";
            $criteriaGetter .= "if (!is_null(\$criteria)) {\n";
            $criteriaGetter .= $this->spaces . 'return $this->'. $fieldName ."->matching(\$criteria);\n";
            $criteriaGetter .= "}\n";

            $criteriaGetter = $this->prefixCodeWithSpaces($criteriaGetter, 2);
        }

        $response = str_replace(
            ['<criteriaArgument>', '<criteriaGetter>'],
            [$criteriaArgument, $criteriaGetter],
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
