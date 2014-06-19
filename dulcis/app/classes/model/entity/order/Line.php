<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace Dulcis\Dulcis\model\entity\order;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
    use BadMethodCallException;
    use Dulcis\Dulcis\model\entity\base\EntityAbstract;
    use InvalidArgumentException;

    /**
     * Description of Line
     *
     * @author student
     */
    class Line extends EntityAbstract{

        protected $allowedFields = array('ono', 'lno', 'ino','lprice', 'lsum', 'lpt', 'Flag'=> false);

        /**
         * @param $ono
         *
         * @return $this
         * @throws InvalidArgumentException
         * @throws BadMethodCallException
         */
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

        /**
         * @param $lno
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setLno($lno){

            if (!is_int($lno) || $lno < 1) {
                throw new InvalidArgumentException(
                    "The 注文明細番号 is invalid.");
            }
            $this->fields['ono'] = $lno;

            return $this;
        }

        /**
         * @param $ino
         *
         * @return $this
         * @throws InvalidArgumentException
         * @throws BadMethodCallException
         */
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

        /**
         * @param $lprice
         *
         * @return $this
         */
        public function setLprice($lprice){

            $this->fields['lprice'] = $lprice;

            return $this;
        }

        /**
         * @param $lsum
         *
         * @return $this
         */
        public function setLsum($lsum){

            $this->fields['lsum'] = $lsum;

            return $this;
        }

        /**
         * データベースなどから取ってきたポイントカラムに値をセットする。
         *
         * @param $lpt
         *
         * @return $this
         */
        public function setLpt($lpt){

            $this->fields['lpt'] = $lpt;

            return $this;
        }

        /**
         * UPDATEのフラグ管理
         *
         * @param $flag
         *
         * @return $this
         * @throws \InvalidArgumentException
         */
        public function setFlag($flag){
             if(!is_bool($flag)){
                 throw new InvalidArgumentException(
                     "bool型で入れてください");
             }
             $this->fields['flag'] = $flag;
             return $this;
         }

        /**
         * 渡された値段からポイント計算をして、ポイントをセットする。
         *
         * @param $price
         *
         * @return $this
         */
        public function calculatePoint($price) {
            $price = $price / 10;
            $point = floor($price);

            $this->fields['lpt'] = $point;

            return $this;
        }
    }
