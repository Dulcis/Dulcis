<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/25
     * Time: 20:15
     */

    namespace Dulcis\Dulcis\model\service\cart;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\repository\cart\CartUnitOfWorkInterface;
    use Dulcis\Dulcis\model\repository\item\ItemUnitOfWorkInterface;

    class CartService implements CartServiceInterface {
        private $CartUoW;
        private $itemUoW;

        public function __construct(CartUnitOfWorkInterface $cartUnitOfWork,ItemUnitOfWorkInterface $itemUnitOfWork){

            $this->CartUoW = $cartUnitOfWork;
            $this->itemUoW = $itemUnitOfWork;
        }

        public function getCart($cno) {
            // TODO: Implement getCart() method.
        }

        public function getCarts($mno) {
            // TODO: Implement getCarts() method.
        }

        public function deleteCart($entity) {
            // TODO: Implement deleteCart() method.
        }

        public function deleteCarts($entity) {
            // TODO: Implement deleteCarts() method.
        }

        public function updateCsum($entity) {
            // TODO: Implement updateCsum() method.
        }
    }