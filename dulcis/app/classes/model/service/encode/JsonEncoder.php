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
        foreach (self::GeneratorByEntityCollection() as $val){
            
        }
         

    }
    
    private function GeneratorByEntityCollection(EntityCollectionInterface $collection){
        
        foreach ($collection as $key){    
        yield $key->toArray();
        }
    }

        public function encode() {
        return array_map("json_encode", $this->data);
    }

//put your code here
}
