<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dulcis\Dulcis\model\service\encode;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
/**
 * Description of JsonEncoder
 *
 * @author student
 */
class JsonEncoder implements EncoderInterface{
    private $data = array();

    public function setData(array $data) {     
        foreach ($data as $key => $value) {
            if (is_object($value)) {
                $array = array();
                $reflect = new ReflectionObject($value);
 
                foreach ($reflect->getProperties() as $prop) {
                    $prop->setAccessible(true);
                    $array[$prop->getName()] =
                        $prop->getValue($value);
                }
                $data[$key] = $array;
            }
        }
         
        $this->data = $data;
        return $this;
        
        
        return $this;
    }
    public function encode() {
        return array_map("json_encode", $this->data);
    }

//put your code here
}
