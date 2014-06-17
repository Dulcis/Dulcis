<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\dal\factory\CreatePdoAdapter;
use Dulcis\Dulcis\model\dal\mapper\DataMapperInterface;
use Dulcis\Dulcis\model\entity\base\EntityInterface;
/**
 * Description of AbstractDataMapper
 *
 * @author dora56
 */
abstract class AbstractDataMapper implements DataMapperInterface{
    
    protected $adapter;
    protected $collection;
    protected $entityTable;
    protected $tableId;
    
    public function __construct(CreatePdoAdapter $adapter, EntityCollectionInterface $collection, $entityTable = null, $tableId) {
        $this->adapter = $adapter;
        $this->collection = $collection;
        if ($entityTable !== null) {
            $this->setEntityTable($entityTable);
        }
        $this->id = $tableId;
    }
         
    public function setEntityTable($entityTable) {
        if (!is_string($entityTable) || empty($entityTable)) {
            throw new InvalidArgumentException(
                "The entity table is invalid.");
        }
        $this->entityTable = $entityTable;
        return $this;
    }
     
    public function fetchById($id) {
        $this->adapter->select($this->entityTable,
            array($this->tableId => $id));
        if (!$row = $this->adapter->fetch()) {
            return null;
        }
        return $this->loadEntity($row);
    }
     
    public function fetchAll(array $conditions = array()) {
        $this->adapter->select($this->entityTable, $conditions);
        $rows = $this->adapter->fetchAll();
        return $this->loadEntityCollection($rows);
    }
     
    public function insert(EntityInterface $entity) {
        return $this->adapter->insert($this->entityTable,
            $entity->toArray());
    }
     
    public function update(EntityInterface $entity) {
        return $this->adapter->update($this->entityTable,
            $entity->toArray(), $this->tableId . " = $entity->id");
    }
     
    public function save(EntityInterface $entity) {
        return !isset($entity->id)
            ? $this->adapter->insert($this->entityTable,
                $entity->toArray())
            : $this->adapter->update($this->entityTable,
                $entity->toArray(), $this->tableId .  " = $entity->id");
    }
     
    public function delete(EntityInterface $entity) {
        return $this->adapter->delete($this->entityTable,
            $this->tableId .  "= $entity->id");
    }
     
    protected function loadEntityCollection(array $rows) {
        $this->collection->clear();
        foreach ($rows as $row) {
            $this->collection[] = $this->loadEntity($row);
        }
        return $this->collection;
    }
     
    abstract protected function loadEntity(array $row);
}
