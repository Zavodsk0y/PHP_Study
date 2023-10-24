<?php

namespace MyProject\Models;

use MyProject\Services\Db;
use ReflectionObject;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    /**
     * @param int $id
     * @return static|null
     */
    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM ' . static::getTableName() . ';', [], static::class);
    }

    public function save()
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    }

    public function delete(): void
    {
        $db = Db::getInstance();
        $db->query('DELETE FROM ' . static::getTableName() . ' WHERE id=:id;',
            [':id' => $this->id]);

        $this->id = null;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; // column1 = :param1
            $params2values[$param] = $value; // [:param1 => value1]
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    private function insert(array $mappedProperties): void
    {
        $mappedPropertiesFiltered = array_filter($mappedProperties);

        $columns = [];
        $params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedPropertiesFiltered as $column => $value) {
            $params[] = ':param' . $index; // :param1
            $columns[] = $column;
            $params2values[':param' . $index] = $value; // [:param1 => value1]
            $index++;
        }

        $sql = 'INSERT INTO ' . static::getTableName() . '(' . implode(" ,", $columns) . ')' .
            'VALUES (' . implode(" ,", $params) . ')';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
        $this->refresh();
    }

    private function refresh(): void
    {
        $objectFromDb = static::getById($this->id);
        $reflector = new ReflectionObject($objectFromDb);
        $properties = $reflector->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $this->$propertyName = $property->getValue($objectFromDb);
        }
    }

    abstract protected static function getTableName(): string;
}