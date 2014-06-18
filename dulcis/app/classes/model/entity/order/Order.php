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
        protected $allowedFields = array('id', 'mno', 'oname', 'omail', 'opost',
            'omail', 'oaddress','otel','ocard','odate',
            'osum', 'opt');

        public function setId($id){
            if (isset($this->fields["ono"])) {
                throw new BadMethodCallException(
                    "The 注文番号 for this user has been set already.");
            }
            if (!is_int($id) || $id < 1) {
                throw new InvalidArgumentException(
                    "The 商品番号 is invalid.");
            }
            $this->fields['ono'] = $id;

            return $this;
        }

        /**
         * @param $mno
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMno($mno) {

            if (!is_int($mno) || $mno < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields["mno"] = $mno;

            return $this;
        }

        /**
         * @param $oname
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setOname($oname) {

            if (strlen($oname) < 1 || strlen($oname) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->fields["oname"] = htmlspecialchars(trim($oname), ENT_QUOTES);

            return $this;
        }

        /**
         * @param $omail
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setOmail($omail) {

            if (!filter_var($omail, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("無効なメールアドレスです。");
            }
            $this->fields["opost"] = $omail;

            return $this;
        }

        /**
         * @param $opost
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setOpost($opost) {

            if (!preg_match('/^\d{3}\-\d{4}$/', $opost)) {
                throw new InvalidArgumentException("無効な郵便番号です。");
            }
            $this->fields["opost"] = $opost;

            return $this;
        }

        /**
         * @param $oaddress
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setoaddress($oaddress) {

            if (!is_string($oaddress) || strlen($oaddress) < 1 || strlen($oaddress) > 100) {
                throw new InvalidArgumentException("無効な住所です。");
            }
            $this->fields["oaddress"] = $oaddress;

            return $this;
        }

        /**
         * @param $otel
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setOtel($otel) {

            if (!preg_match('/^0\d{8,12}$/', $otel)) {
                throw new InvalidArgumentException("無効な電話番号です。");
            }
            $this->fields["otel"] = $otel;

            return $this;
        }

        /**
         * @param $ocard
         *
         * @return $this
         * @throws InvalidArgumentException
         */
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
        /***
         * @param $osum
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setoSum($osum){

            if (!is_int($osum)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->fields["osum"] = $osum;

            return $this;
        }

        /**
         * @param $opt
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setOpt($opt) {

            if (!is_int($opt)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->fields["opt"] = $opt;

            return $this;
        }
        /**
         * 合計の計算
         * 
         * @param array $counts
         * @param type $result
         * @return type
         */
        public function addUp(array $counts,$result = null){
            foreach ($counts as $key) {
                $result = $result + $key;
            }
            yield $result;
        }
    }
