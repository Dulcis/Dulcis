<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/24
 * Time: 1:28
 */

namespace Dulcis\Test\model\dal\repository\factory;

use PHPUnit_Framework_TestCase;
use Dulcis\Dulcis\model\repository\factory\ItemUoWFactory;

class ItemUoWFactoryTest extends \PHPUnit_Framework_TestCase {

    protected $object;

    protected function setUp(){
        $this->object = new ItemUoWFactory();
    }

    public function testCreate(){
        $this->assertInstanceOf('Dulcis\Dulcis\model\repository\item\ItemUnitOfWork',$this->object->create());
    }
}
 