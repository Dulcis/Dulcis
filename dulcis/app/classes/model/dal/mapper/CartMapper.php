<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
use Dulcis\Dulcis\model\entity\base\EntityInterface;
use Dulcis\Dulcis\model\entity\cart\CartEntity;
/**
 * Description of CartMapper
 *
 * 推奨　結果の1行を特定する場合、fetchByIdではなくfetchByColumnsを使用すること
 *
 * @author dora56
 */
class CartMapper extends AbstractDataMapper{

    public function update(EntityInterface $entity) {

        return $this->adapter->update($this->entityTable,
            $entity->toArray(), $this->tableId . " = $entity->id AND mno = $entity->mno AND ino = $entity->ino");
    }

    public function save(EntityInterface $entity) {

        return !($entity->flag)
            ? $this->adapter->insert($this->entityTable,
                $entity->toArray())
            : $this->adapter->update($this->entityTable,
                $entity->toArray(), $this->tableId .  " = $entity->id AND mno = $entity->mno AND ino = $entity->ino");
    }

    public function delete(EntityInterface $entity) {

        return $this->adapter->delete($this->entityTable,
            $this->tableId . " =  $entity->id AND mno = $entity->mno AND ino = $entity->ino");
    }

    protected function loadEntity(array $row) {

        return new CartEntity(array(
            "id"    => $row["cno"],
            "mno"  => $row["mno"],
            "ino" => $row["ino"],
            "csum"  => $row["csum"]));
    }

//put your code here
}
