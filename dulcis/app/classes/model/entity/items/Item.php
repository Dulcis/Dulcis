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
     * Class Item
     *
     * @package Dulcis\Dulcis\model\entity\items
     *
     * @author dora56
     */
    class Item extends EntityAbstract{

        protected $allowedFields = array('id', 'iname', 'gno', 'iprice', 'isum', 'ico', 'iimg');

        /**
         * @param $id
         *
         * @return $this
         * @throws InvalidArgumentException
         * @throws BadMethodCallException
         */
        public function getId($id){
            if (isset($this->fields["ino"])) {
                throw new BadMethodCallException(
                    "The 商品番号 for this user has been set already.");
            }
            if (!is_int($id) || $id < 1) {
                throw new InvalidArgumentException(
                    "The 商品番号 is invalid.");
            }
            $this->fields['id'] = $id;

            return $this;
        }

        /**
         * @param $iname
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setIname($iname) {

            if (strlen($iname) < 1 || strlen($iname) > 80) {
                throw new InvalidArgumentException("商品の文字数が無効です。");
            }
            $this->fields["iname"] = htmlspecialchars(trim($iname), ENT_QUOTES);

            return $this;
        }

        /**
         * @param $gno
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setGno($gno){

            if (!is_int($gno) || $gno < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields['gno'] = $gno;

            return $this;
        }

        /**
         * @param $iprice
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setIprice($iprice){

            if (!is_int($iprice) || $iprice < 0) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields['gno'] = $iprice;

            return $this;
        }

        /**
         * @param $isum
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setIsum($isum){

            if(!is_int($isum)){
                throw new InvalidArgumentException(
                    "在庫 is invalid.");
            }
            $this->fields['isum'] = $isum;

            return $this;
        }

        /**
         * @param $ico
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setIco($ico){

            if(!is_string($ico)){
                throw new InvalidArgumentException(
                    "コメントが不正です");
            }
            $this->fields['ico'] = $ico;

            return $this;
        }

        /**
         * @param $iimg
         *
         * @return $this
         */
        public function setIimg($iimg){

            $this->fields['iimg'] = $iimg;

            return $this;
        }

    }
