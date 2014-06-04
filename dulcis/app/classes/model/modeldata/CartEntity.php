<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\modeldata;

require_once(dirname(__FILE__).'/../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\modeldata\EntityAbstract;
use Dulcis\Dulcis\model\modeldata\CartEntityInterface;

/**
 * Class CartEntity
 *
 * @author dora56
 */
class CartEntity extends EntityAbstract implements CartEntityInterface {
    protected $_id;
    protected $_memberid;
    protected $_itemid;
    protected $_quantity;

    public function __construct($id, $memberid, $itemid, $quantity) {
        
        $this->setId($id);
        $this->setMemberId($memberid);
        $this->getItemId($itemid);
        $this->setQuantity($quantity);
    }

    public function setId($id) {
        if ($this->_id !== null) {
                throw new BadMethodCallException(
                    "その番号はすでに設定されています。");
            }
            if (!is_int($id) || $id < 1 || $id > 9999999) {
                throw new InvalidArgumentException("無効です。");
            }
            $this->_id = $id;

            return $this;
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function setMemberId() {
        
    }

    public function getMemberId() {
        return $this->_memberid;
    }
    
    public function setItemId() {
        
    }
    
    public function getItemId() {
        
    }
    
    public function setQuantity() {
        
    }
    
    public function getQuantity() {
        
    }

}
