<?php
    namespace Dulcis\Dulcis\model\dal\factory;

    require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

    use Exception;

    /**
     * Class CreatePdoAdapter
     *
     * 渡されたステータスに合ったPdoAdapterをインスタンス化
     *
     * @package Dulcis\Dulcis\model\dal
     */
    class CreatePdoAdapter {

        const LOCAL = "local";
        const PUB = "pub";

        private $_pdo;

        /**
         * @param $status
         */
        public function __construct($status) {
            $this->setPdoAdapter($status);
        }

        /**
         * @param $status
         *
         * @return \Dulcis\Dulcis\model\dal\PdoAdapter
         * @throws \Exception
         */
        public function setPdoAdapter($status) {

            switch ($status) {
                case self::LOCAL:
                    $this->_pdo = new LocalPdoAdapterFactory();
                    break;
                case self::PUB:
                    $this->_pdo = null;
                    break;
                default:
                    throw new Exception("設定がまちがってます。");
                    break;
            }

            return $this->_pdo->create();
        }
    }