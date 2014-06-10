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
 * Description of Order
 *
 * @author student
 */
class Order extends EntityAbstract{
    protected $allowedFields = array('ono', 'mno', 'oname', 'omail', 'opost', 
                                     'omail', 'oaddress','otel','ocard','odate',
                                     'osum', 'opt');
    
    public function setOno($ono){
        if (isset($this->fields["ono"])) {
                throw new BadMethodCallException(
                    "The 商品番号 for this user has been set already.");
        }
        if (!is_int($ono) || $ono < 1) {
                throw new InvalidArgumentException(
                    "The 商品番号 is invalid.");
            }
            $this->fields['ono'] = $ono;

            return $this;
    }
    
    public function setMno($mno) {
        
            if (!is_int($mno) || $mno < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields["mno"] = $mno;

            return $this;
    }
    
     public function setOname($oname) {

            if (strlen($oname) < 1 || strlen($oname) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->fields["oname"] = htmlspecialchars(trim($oname), ENT_QUOTES);

            return $this;
        }

        public function setOmail($omail) {

            if (!filter_var($omail, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("無効なメールアドレスです。");
            }
            $this->fields["opost"] = $omail;

            return $this;
        }

        public function setOpost($opost) {

            if (!preg_match('/^\d{3}\-\d{4}$/', $opost)) {
                throw new InvalidArgumentException("無効な郵便番号です。");
            }
            $this->fields["opost"] = $opost;

            return $this;
        }

        public function setoaddress($oaddress) {

            if (!is_string($oaddress) || strlen($oaddress) < 1 || strlen($oaddress) > 100) {
                throw new InvalidArgumentException("無効な住所です。");
            }
            $this->fields["oaddress"] = $oaddress;

            return $this;
        }

        public function setOtel($otel) {

            if (!preg_match('/^0\d{8,12}$/', $otel)) {
                throw new InvalidArgumentException("無効な電話番号です。");
            }
            $this->fields["otel"] = $otel;

            return $this;
        }

        public function setOcard($ocard) {

            if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}
                            |6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}
                            |3[47][0-9]{13}|(?:2131|1800|35[0-9]{3})[0-9]{11})$/", $ocard)
            ) {
                throw new InvalidArgumentException("無効なクレジットカードです。");
            }
            $this->fields["ocard"] = $ocard;

            return $this;
        }
        
        public function setoSum($osum){
            
            if (!is_int($osum)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->fields["osum"] = $osum;

            return $this;
        }

        public function setOpt($opt) {

            if (!is_int($opt)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->fields["opt"] = $opt;

            return $this;
        }
}
