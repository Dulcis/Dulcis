<?php
    namespace Dulcis\Dulcis\model\dal\factory;

    require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\dal\factory\LocalPdoAdapterFactory;
    use Dulcis\Dulcis\model\dal\factory\HomePdoAdapterFactory;
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
        const HOME = "home";
        const PUB = "pub";

        private $adapter;

        /**
         * @param $status
         *
         * @return \Dulcis\Dulcis\model\dal\PdoAdapter
         * @throws \Exception
         */
        public function setPdoAdapter($status) {

            switch ($status) {
                case self::LOCAL:
                    $this->adapter = new LocalPdoAdapterFactory();
                    break;
                case self::HOME:
                    $this->adapter = new HomePdoAdapterFactory();
                    break;
                case self::PUB:
                    $this->adapter = null;
                    break;
                default:
                    throw new Exception("設定がまちがってます。");
            }

            return $this->adapter->create();
        }
    }