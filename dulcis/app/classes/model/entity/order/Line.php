<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\entity\order;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\base\EntityAbstract;
/**
 * Description of Line
 *
 * @author student
 */
class Line extends EntityAbstract{
    
    protected $allowedFields = array('ono', 'lno', 'ino','lprice', 'lsum', 'lpt');
    
    public function setOno($ono){
        if (isset($this->fields["ono"])) {
                throw new BadMethodCallException(
                    "The 注文番号 for this user has been set already.");
        }
        if (!is_int($ono) || $ono < 1) {
                throw new InvalidArgumentException(
                    "The 注文番号 is invalid.");
            }
            $this->fields['ono'] = $ono;

            return $this;
    }
    
    public function setLno($lno){
        
        if (!is_int($lno) || $lno < 1) {
                throw new InvalidArgumentException(
                    "The 注文明細番号 is invalid.");
            }
            $this->fields['ono'] = $lno;

            return $this;
    }
    
    public function setIno($ino){
        if (isset($this->fields["ino"])) {
                throw new BadMethodCallException(
                    "The 商品番号 for this user has been set already.");
        }
        if (!is_int($ino) || $ino < 1) {
                throw new InvalidArgumentException(
                    "The 商品番号 is invalid.");
            }
            $this->fields['ino'] = $ino;

            return $this; 
    }
    
    public function setLprice($lprice){
        
        $this->fields['lprice'] = $lprice;

            return $this; 
    }
    
    public function setLsum($lsum){
        
         $this->fields['lsum'] = $lsum;

        return $this;
    }
    
    public function setLpt($lpt){
        
         $this->fields['lpt'] = $lpt;

        return $this;
    }
}
