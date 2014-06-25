<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 19:36
     */

    namespace Dulcis\Dulcis\model\service\cart;


    interface CartServiceInterface {
        public function getCart($cno);
        public function getCarts($mno);
        public function deleteCart($entity);
        public function deleteCarts($entity);
        public function updateCsum($entity);
    }