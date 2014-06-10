<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\entity\items;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\base\EntityAbstract;

/**
 * Description of Item
 *
 * @author dora56
 */
class Item extends EntityAbstract{
    
    protected $allowedFields = array('ino', 'iname', 'gno', 'iprice', 'isum', 'ico', 'iimg');
    
    public function getIno($ino){
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
    
    public function setIname($iname) {

            if (strlen($iname) < 1 || strlen($iname) > 80) {
                throw new InvalidArgumentException("商品の文字数が無効です。");
            }
            $this->fields["iname"] = htmlspecialchars(trim($iname), ENT_QUOTES);

            return $this;
    }
    
    public function setGno($gno){
        
        if (!is_int($gno) || $gno < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields['gno'] = $gno;

            return $this;       
    }
    
    public function setIprice($iprice){
        
        if (!is_int($iprice) || $iprice < 0) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields['gno'] = $iprice;

            return $this;       
    }
    
    public function setIsum($isum){
        
        if(!is_int($isum)){
            throw new InvalidArgumentException(
                    "在庫 is invalid.");
        }
        $this->fields['isum'] = $isum;

            return $this;
    }
    
    public function setIco($ico){
        
        if(!is_string($ico)){
            throw new InvalidArgumentException(
                    "コメントが不正です");
        }
        $this->fields['ico'] = $ico;

            return $this;
    }
    
    public function setIimg($iimg){
        
        $this->fields['iimg'] = $iimg;

            return $this;
    }
    
}
