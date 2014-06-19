<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace Dulcis\Dulcis\model\entity\cart;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
    use BadMethodCallException;
    use Dulcis\Dulcis\model\entity\base\EntityAbstract;
    use InvalidArgumentException;

    /**
     * Description of CartEntity
     *
     * @author dora56
     */
    class CartEntity extends EntityAbstract{

        protected $allowedFields = array('id', 'mno', 'ino', 'csum', 'flag' => false);

        /**
         * @param $id
         *
         * @return $this
         * @throws BadMethodCallException
         * @throws InvalidArgumentException
         */
        public function setId($id) {
            if ($this->fields['cno'] !== null) {
                throw new BadMethodCallException(
                    "その番号はすでに設定されています。");
            }
            if (!is_int($id) || $id < 1 || $id > 9999999) {
                throw new InvalidArgumentException("カート番号が無効です。");
            }
            $this->fields['id'] = $id;

            return $this;
        }

        /**
         * @param $mno
         *
         * @return $this
         */
        public function setMno($mno) {

            $this->fields['mno'] = $mno;
            return $this;
        }

        public function setIno($ino) {

            $this->fields['ino'] = $ino;
            return $this;
        }

        /**
         * @param $csum
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setCsum($csum) {

            if(!is_int($csum)) {
                throw new InvalidArgumentException("数字を入力してください");
            }
            $this->fields['csum'] = $csum;

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
    }
