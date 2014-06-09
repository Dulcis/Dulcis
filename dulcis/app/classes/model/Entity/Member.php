<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/06
     * Time: 1:20
     */

    namespace Dulcis\Dulcis\model\Entity;


    class Member extends EntityAbstract {

        protected $allowedFields = array('mno', 'mpass', 'mname', 'mmail', 'mpost', 'maddress', 'mtel', 'mpt', 'mcard');

        public function setMno($mno) {

            if (isset($this->fields["mno"])) {
                throw new BadMethodCallException(
                    "The ID for this user has been set already.");
            }
            if (!is_int($mno) || $mno < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields["mno"] = $mno;

            return $this;
        }

        public function setMpass($mpass) {

            if (!preg_match("/^[a-zA-Z0-9]+$/", $mpass) || $mpass < 1 || $mpass > 7) {
                throw new InvalidArgumentException("無効です。");
            }
            $this->fields["mpass"]= $mpass;

            return $this;
        }

        public function setMname($mname) {

            if (strlen($mname) < 1 || strlen($mname) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->fields["mname"] = htmlspecialchars(trim($mname), ENT_QUOTES);

            return $this;
        }

        public function setMmail($mmail) {

            if (!filter_var($mmail, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("無効なメールアドレスです。");
            }
            $this->fields["mmail"] = $mmail;

            return $this;
        }

        public function setMpost($mpost) {

            if (!preg_match('/^\d{3}\-\d{4}$/', $mpost)) {
                throw new InvalidArgumentException("無効な郵便番号です。");
            }
            $this->fields["mpost"] = $mpost;

            return $this;
        }

        public function setMaddress($maddress) {

            if (!is_string($maddress) || strlen($maddress) < 1 || strlen($maddress) > 100) {
                throw new InvalidArgumentException("無効な住所です。");
            }
            $this->fields["maddress"] = $maddress;

            return $this;
        }

        public function setMtel($mtel) {

            if (!preg_match('/^0\d{8,12}$/', $mtel)) {
                throw new InvalidArgumentException("無効な電話番号です。");
            }
            $this->fields["mtel"] = $mtel;

            return $this;
        }

        public function setMpt($mpt) {

            if (!is_int($mpt)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->fields["mpt"] = $mpt;

            return $this;
        }

        public function setMcard($mcard) {

            if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}
                            |6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}
                            |3[47][0-9]{13}|(?:2131|1800|35[0-9]{3})[0-9]{11})$/", $mcard)
            ) {
                throw new InvalidArgumentException("無効なクレジットカードです。");
            }
            $this->fields["mcard"] = $mcard;

            return $this;
        }
    }