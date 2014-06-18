<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/06
     * Time: 1:20
     */

    namespace Dulcis\Dulcis\model\entity\membars;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\entity\base\EntityAbstract;

    /**
     * Class Member
     *
     * @package Dulcis\Dulcis\model\entity\membars
     *
     * @author dora56
     */
    class Member extends EntityAbstract {

        protected $allowedFields = array('iｄ', 'mpass', 'mname', 'mmail', 'mpost', 'maddress', 'mtel', 'mpt', 'mcard');

        /**
         * @param $id
         *
         * @return $this
         * @throws InvalidArgumentException
         * @throws BadMethodCallException
         */
        public function setId($id) {

            if (isset($this->fields["id"])) {
                throw new BadMethodCallException(
                    "The ID for this user has been set already.");
            }
            if (!is_int($id) || $id < 1) {
                throw new InvalidArgumentException(
                    "The user ID is invalid.");
            }
            $this->fields["id"] = $id;

            return $this;
        }

        /**
         * @param $mpass
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMpass($mpass) {

            if (!preg_match("/^[a-zA-Z0-9]+$/", $mpass) || $mpass < 1 || $mpass > 7) {
                throw new InvalidArgumentException("無効です。");
            }
            $this->fields["mpass"]= $mpass;

            return $this;
        }

        /**
         * @param $mname
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMname($mname) {

            if (strlen($mname) < 1 || strlen($mname) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->fields["mname"] = htmlspecialchars(trim($mname), ENT_QUOTES);

            return $this;
        }

        /**
         * @param $mmail
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMmail($mmail) {

            if (!filter_var($mmail, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("無効なメールアドレスです。");
            }
            $this->fields["mmail"] = $mmail;

            return $this;
        }

        /**
         * @param $mpost
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMpost($mpost) {

            if (!preg_match('/^\d{3}\-\d{4}$/', $mpost)) {
                throw new InvalidArgumentException("無効な郵便番号です。");
            }
            $this->fields["mpost"] = $mpost;

            return $this;
        }

        /**
         * @param $maddress
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMaddress($maddress) {

            if (!is_string($maddress) || strlen($maddress) < 1 || strlen($maddress) > 100) {
                throw new InvalidArgumentException("無効な住所です。");
            }
            $this->fields["maddress"] = $maddress;

            return $this;
        }

        /**
         * @param $mtel
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMtel($mtel) {

            if (!preg_match('/^0\d{8,12}$/', $mtel)) {
                throw new InvalidArgumentException("無効な電話番号です。");
            }
            $this->fields["mtel"] = $mtel;

            return $this;
        }

        /**
         * @param $mpt
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setMpt($mpt) {

            if (!is_int($mpt)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->fields["mpt"] = $mpt;

            return $this;
        }

        /**
         * @param $mcard
         *
         * @return $this
         * @throws InvalidArgumentException
         */
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