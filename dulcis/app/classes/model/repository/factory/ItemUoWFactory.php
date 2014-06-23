<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/24
     * Time: 0:27
     */

    namespace Dulcis\Dulcis\model\repository\factory;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

    use Dulcis\Dulcis\model\dal\mapper\ItemMapper;
    use Dulcis\Dulcis\model\dal\storage\ObjectStorage;
    use Dulcis\Dulcis\model\dal\factory\CreatePdoAdapter;
    use Dulcis\Dulcis\model\dal\collection\EntityCollection;
    use Dulcis\Dulcis\model\repository\item\ItemUnitOfWork;

    class ItemUoWFactory implements UoWFactory{

        private $adapter;

        public function create() {
            $this->adapter = new CreatePdoAdapter();

            return new ItemUnitOfWork(new ItemMapper($this->adapter->setPdoAdapter(),new EntityCollection(),
                                       'item','ino'),new ObjectStorage());
        }
    }