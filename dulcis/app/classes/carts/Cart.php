<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dulcis\app\classes\carts;

/**
 * Description of Cart
 *
 * @author dora56
 */
class CartDto {
    //put your code here
    
    private $cartid;
    private $menberid;
    private $itemid;
    private $quantity;
    
    /*
     * カートのコンストラクタ
     */
    public function __construct() {
        $this->cartid = NULL;
        $this->menberid = NULL;
        $this->itemid = array();       
        $this->quantity = 0;
    }
    
    public function itemadd($items) {
        $this->itemid += $items;
    }
}
$data[] = new \dulcis\app\classes\carts\CartDto;