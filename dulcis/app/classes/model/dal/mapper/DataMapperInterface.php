<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/15
 * Time: 18:41
 */
namespace Dulcis\Dulcis\model\dal\mapper;

use Dulcis\Dulcis\model\entity\base\EntityInterface;

interface DataMapperInterface {

    public function fetchById($id);
    public function fetchAll(array $conditions = array());
    public function insert(EntityInterface $entity);
    public function update(EntityInterface $entity);
    public function save(EntityInterface $entity);
    public function delete(EntityInterface $entity);
} 