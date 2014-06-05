<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/06
     * Time: 1:07
     */

    namespace Dulcis\Dulcis\model\Entity;


    interface EntityInterface {

        public function setField($name, $value);
        public function getField($name);
        public function fieldExists($name);
        public function removeField($name);
        public function toArray();
    }