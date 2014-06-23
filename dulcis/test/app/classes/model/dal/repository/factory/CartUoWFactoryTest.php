<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/24
 * Time: 1:23
 */

namespace Dulcis\Test\model\dal\repository\factory;

use PHPUnit_Framework_TestCase;
use Dulcis\Dulcis\model\repository\factory\CartUoWFactory;

class CartUoWFactoryTest extends \PHPUnit_Framework_TestCase {

    protected $object;

    protected function setUp(){
        $this->object = new CartUoWFactory();
    }

    public function testCreate(){
        $this->assertInstanceOf('Dulcis\Dulcis\model\repository\cart\CartUnitOfWork',$this->object->create());
    }
}
 