<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/05/30
     * Time: 19:37
     */
    namespace modeldata;

    /**
     * Interface MemberInterface
     *
     * @package modeldata
     *
     * @author  dora56
     */
    interface MemberInterface {

        public function setNumber($number);
        public function getNumber();

        public function setPassword($password);
        public function getPassword();

        public function setName($name);
        public function getName();

        public function setEmail($email);
        public function getEmail();

        public function setPostnum($postnum);
        public function getPostnum();

        public function setAddress($address);
        public function getAddress();

        public function setTel($tel);
        public function getTel();

        public function setPoint($point);
        public function getPoint();

        public function setCard($card);
        public function getCard();
    }