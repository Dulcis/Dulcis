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
        protected $_memberId;
        protected $_itemId;
        protected $_quantity;

        public function __construct($id, $memberId, $itemId, $quantity) {

            $this->setId($id);
            $this->setMemberId($memberId);
            $this->getItemId($itemId);
            $this->setQuantity($quantity);
        }

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

        public function setMemberId($memberId) {

        }

        public function getMemberId() {
            return $this->_memberId;
        }

        public function setItemId($itemId) {

        }

        public function getItemId() {
            return $this->_itemId;
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
