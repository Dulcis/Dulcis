<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/18
     * Time: 23:48
     */
    namespace Dulcis\Dulcis\model\dal\mapper;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
    use Dulcis\Dulcis\model\entity\base\EntityInterface;
    use Dulcis\Dulcis\model\entity\order\Line;

    /**
     * Class LineMapper
     * 
     * 推奨　結果の1行を特定する場合、fetchByIdではなくfetchByColumnsを使用すること
     *
     * @package Dulcis\Dulcis\model\dal\mapper
     */
    class LineMapper extends AbstractDataMapper {

        public function update(EntityInterface $entity) {

            return $this->adapter->update($this->entityTable,
                $entity->toArray(), $this->tableId . " = $entity->ono AND lno = $entity->lno");
        }

        public function save(EntityInterface $entity) {

            return !($entity->flag)
                ? $this->adapter->insert($this->entityTable,
                    $entity->toArray())
                : $this->adapter->update($this->entityTable,
                    $entity->toArray(), $this->tableId .  " = $entity->ono AND lno = $entity->lno");
        }

        public function delete(EntityInterface $entity) {

            return $this->adapter->delete($this->entityTable,
                $this->tableId . " =  $entity->ono AND lno = $entity->lno");
        }

        protected function loadEntity(array $row) {
            return new Line(array(
                'ono'  => $row["ono"],
                'lno'  => $row["lno"],
                'ino' => $row["ino"],
                'lprice' => $row["lprice"],
                'lsum' => $row["lsum"],
                'lpt' => $row["lpt"]));
        }
    }