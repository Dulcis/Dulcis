<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace Dulcis\Dulcis\model\entity\cart;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\entity\base\EntityAbstract;
    /**
     * Description of CartEntity
     *
     * @author dora56
     */
    class CartEntity extends EntityAbstract{

        protected $allowedFields = array('cno', 'mno', 'ino', 'csum');

        /**
         * @param $cno
         *
         * @return $this
         * @throws BadMethodCallException
         * @throws InvalidArgumentException
         */
        public function setCno($cno) {
            if ($this->fields['cno'] !== null) {
                throw new BadMethodCallException(
                    "その番号はすでに設定されています。");
            }
            if (!is_int($cno) || $cno < 1 || $cno > 9999999) {
                throw new InvalidArgumentException("カート番号が無効です。");
            }
            $this->fields['cno'] = $cno;

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
    }
