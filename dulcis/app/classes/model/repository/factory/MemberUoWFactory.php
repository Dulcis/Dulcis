<?php
    /**
     * Created by PhpStorm.
     * User: Dora
     * Date: 14/06/23
     * Time: 23:02
     */
    namespace Dulcis\Dulcis\model\repository\factory;

    require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');


    use Dulcis\Dulcis\model\dal\mapper\MemberMapper;
    use Dulcis\Dulcis\model\dal\storage\ObjectStorage;
    use Dulcis\Dulcis\model\dal\factory\CreatePdoAdapter;
    use Dulcis\Dulcis\model\dal\collection\EntityCollection;
    use Dulcis\Dulcis\model\repository\member\MemberUnitOfWork;

    class MemberUoWFactory implements UoWFactory{

        private $adapter;

        public function create(){
            $this->adapter = new CreatePdoAdapter();

            return new MemberUnitOfWork(new MemberMapper($this->adapter->setPdoAdapter(),new EntityCollection(),
                'member','mno'),new ObjectStorage());
        }
    }