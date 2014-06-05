<?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    namespace Dulcis\Dulcis\model\modeldata;

    require_once(dirname(__FILE__).'/../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\modeldata\EntityAbstract;
    use Dulcis\Dulcis\model\modeldata\CartEntityInterface;
    use InvalidArgumentException;
    use BadMethodCallException;

    /**
     * Class CartEntity
     *
     * @author dora56
     */
    class CartEntity extends EntityAbstract implements CartEntityInterface {

        protected $_id;
        protected $_member;
        protected $_item;
        protected $_quantity;

        public function __construct(MemberInterface $member, ItemEntityInterface $item, $quantity) {

            $this->setMember($member);
            $this->getItem($item);
            $this->setQuantity($quantity);
        }

        /**
         * @param $id
         *
         * @return $this
         * @throws \InvalidArgumentException
         * @throws \BadMethodCallException
         */
        public function setId($id) {
            if ($this->_id !== null) {
                throw new BadMethodCallException(
                    "その番号はすでに設定されています。");
            }
            if (!is_int($id) || $id < 1 || $id > 9999999) {
                throw new InvalidArgumentException("カート番号が無効です。");
            }
            $this->_id = $id;

            return $this;
        }

        public function getId() {
            return $this->_id;
        }

        /**
         * @param MemberInterface $member
         *
         * @return $this
         */
        public function setMember(MemberInterface $member) {

            $this->_member = $member;
            return $this;
        }

        public function getMember() {
            return $this->_member;
        }

        /**
         * @param ItemEntityInterface $item
         *
         * 商品エンティティを格納
         *
         * 商品の参照をしやすくする。
         *
         * @return $this
         */
        public function setItem(ItemEntityInterface $item) {

            $this->_item = $item;
            return $this;
        }

        public function getItem() {
            return $this->_item;
        }

        public function setQuantity($quantity) {

            if(!is_int($quantity)) {
                throw new InvalidArgumentException("数字を入力してください");
            }
            $this->_quantity = $quantity;

            return $this;
        }

        public function getQuantity() {
            return $this->_quantity;
        }

    }
