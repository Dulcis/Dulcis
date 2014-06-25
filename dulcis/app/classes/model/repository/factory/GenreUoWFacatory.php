<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/25
 * Time: 21:00
 */

namespace Dulcis\Dulcis\model\repository\factory;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
use Dulcis\Dulcis\model\dal\mapper\GenreMappar;
use Dulcis\Dulcis\model\dal\storage\ObjectStorage;
use Dulcis\Dulcis\model\dal\factory\CreatePdoAdapter;
use Dulcis\Dulcis\model\dal\collection\EntityCollection;
use Dulcis\Dulcis\model\repository\item\GenreUnitOfWork;

class GenreUoWFacatory implements UoWFactory{

    private $adapter;
    public function create() {
        $this->adapter = new CreatePdoAdapter();

        return new GenreUnitOfWork(new GenreMappar($this->adapter->setPdoAdapter(),new EntityCollection(),
            'genre','gno'),new ObjectStorage());
    }
}