<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/06
     * Time: 1:07
     */
    namespace Dulcis\Dulcis\model\entity\base;

    /**
     * Interface EntityInterface
     *
     * @package Dulcis\Dulcis\model\entity\base
     *
     * @author dora56
     */
    interface EntityInterface {

        public function setField($name, $value);
        public function getField($name);
        public function fieldExists($name);
        public function removeField($name);
        public function toArray();
    }