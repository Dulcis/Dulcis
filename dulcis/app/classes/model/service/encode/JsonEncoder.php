<?php

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    namespace Dulcis\Dulcis\model\service\encode;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\entity\base\EntityInterface;
    use Dulcis\Dulcis\model\dal\collection\EntityCollectionInterface;
    /**
     * Description of JsonEncoder
     *
     * @author student
     */
    class JsonEncoder implements EncoderInterface{
        private $data = array();


        public function setCollectionData(EntityCollectionInterface $collection) {
            $array = $collection->toArray();
            foreach (self::GeneratorByArrayEntity($array) as $key => $val){
                $this->data[$key] = $val;
            }
            return $this;
        }
        public function setEntityData(EntityInterface $entity){

            $this->data = $entity->toArray();
            return  $this;
        }
        public function setArrayData(array $arrayData){

            $this->data = $arrayData;
            return $this;
        }

        private function GeneratorByArrayEntity($data){

            foreach ($data as $key){
                yield $key->toArray();
            }
        }

        public function encode() {
            return  json_encode($this->data,JSON_PRETTY_PRINT);//array_map("json_encode", $this->data);
        }
    }
