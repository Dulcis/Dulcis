<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/05/30
     * Time: 20:03
     */
    namespace Dulcis\Dulcis\model\modeldata;

    use BadMethodCallException;
    use InvalidArgumentException;

    /**
     * Class Member
     *
     * 顧客エンティティです。
     *
     * @package modeldata
     * @author  dora56
     */
    class Member extends EntityAbstract implements MemberInterface {

        protected $_number;
        protected $_password;
        protected $_name;
        protected $_email;
        protected $_postnum;
        protected $_address;
        protected $_tel;
        protected $_point;
        protected $_card;

        /**
         * コンストラクタです。
         *
         * @param $number
         * @param $password
         * @param $name
         * @param $email
         * @param $postnum
         * @param $address
         * @param $tel
         * @param $point
         * @param $card
         */
        public function __construct($number, $password, $name, $email, $postnum, $address, $tel, $point, $card) {

            $this->setNumber($number);
            $this->setName($name);
            $this->setPassword($password);
            $this->setEmail($email);
            $this->setPostnum($postnum);
            $this->setAddress($address);
            $this->setTel($tel);
            $this->setPoint($point);
            $this->setCard($card);
        }

        /**
         * 顧客番号を設定します。
         *
         * @param $number
         *
         * @throws InvalidArgumentException
         * @throws BadMethodCallException
         *
         * @return $this
         */
        public function setNumber($number) {

            // TODO: Implement setNumber() method.
            if ($this->_number !== null) {
                throw new BadMethodCallException(
                    "その番号はすでに設定されています。");
            }
            if (!is_int($number) || $number < 1 || $number > 99999999) {
                throw new InvalidArgumentException("無効です。");
            }
            $this->_number = $number;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getNumber() {

            // TODO: Implement getNumber() method.
            return $this->_number;
        }

        /**
         * パスワードを設定
         *
         * @param $password
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setPassword($password) {

            // TODO: Implement setPassword() method.
            if (!preg_match("/^[a-zA-Z0-9]+$/", $password) || $password < 1 || $password > 7) {
                throw new InvalidArgumentException("無効です。");
            }
            $this->_password = $password;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPassword() {

            // TODO: Implement getPassword() method.
            return $this->_password;
        }

        /**
         * 名前を設定
         *
         * @param $name
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setName($name) {

            // TODO: Implement setName() method.
            if (strlen($name) < 1 || strlen($name) > 20) {
                throw new InvalidArgumentException("名前の文字数が無効です。");
            }
            $this->_name = htmlspecialchars(trim($name), ENT_QUOTES);

            return $this;
        }

        /**
         * @return mixed
         */
        public function getName() {

            // TODO: Implement getName() method.
            return $this->_name;
        }

        /**
         * メールアドレスの設定
         *
         * @param $email
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setEmail($email) {

            // TODO: Implement setEmail() method.
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("無効なメールアドレスです。");
            }
            $this->_email = $email;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getEmail() {

            // TODO: Implement getEmail() method.
            return $this->_email;
        }

        /**
         * 郵便番号の設定
         *
         * @param $postnum
         *
         * @return $this
         * @throws InvalidArgumentException
         */
        public function setPostnum($postnum) {

            // TODO: Implement setPostNum() method.
            if (!preg_match('/^\d{3}\-\d{4}$/', $postnum)) {
                throw new InvalidArgumentException("無効な郵便番号です。");
            }
            $this->_postnum = $postnum;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPostnum() {

            // TODO: Implement getPostNum() method.
            return $this->_postnum;
        }

        /**
         * 住所の設定
         *
         * @param $address
         *
         * @return $this
         * @throws \InvalidArgumentException
         */
        public function setAddress($address) {

            // TODO: Implement setAddress() method.
            if (!is_string($address) || strlen($address) < 1 || strlen($address) > 100) {
                throw new InvalidArgumentException("無効な住所です。");
            }
            $this->_address = $address;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getAddress() {

            // TODO: Implement getAddress() method.
            return $this->_address;
        }

        /**
         * 電話番号の設定
         *
         * @param $tel
         *
         * @return $this
         * @throws \InvalidArgumentException
         */
        public function setTel($tel) {

            // TODO: Implement setTel() method.
            if (!preg_match('/^0\d{8,12}$/', $tel)) {
                throw new InvalidArgumentException("無効な電話番号です。");
            }
            $this->_tel = $tel;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getTel() {

            // TODO: Implement getTel() method.
            return $this->_tel;
        }

        /**
         * 累計ポイントの設定
         *
         * @param $point
         *
         * @return $this
         * @throws \InvalidArgumentException
         */
        public function setPoint($point) {

            // TODO: Implement setPoint() method.
            if (!is_int($point)) {
                throw new InvalidArgumentException("整数を入力してください。");
            }
            $this->_point = $point;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getPoint() {

            // TODO: Implement getPoint() method.
            return $this->_point;
        }

        /**
         * クレジットカードの設定
         *
         * @param $card
         *
         * @return $this
         * @throws \InvalidArgumentException
         */
        public function setCard($card) {

            // TODO: Implement setCard() method.
            if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}
                            |6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}
                            |3[47][0-9]{13}|(?:2131|1800|35[0-9]{3})[0-9]{11})$/", $card)
            ) {
                throw new InvalidArgumentException("無効なクレジットカードです。");
            }
            $this->_card = $card;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCard() {

            // TODO: Implement getCard() method.
            return $this->_card;
        }

    }