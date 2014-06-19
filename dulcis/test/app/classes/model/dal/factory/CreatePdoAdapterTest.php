<?php

/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/17
 * Time: 22:31
 */
namespace Dulcis\Test\model\dal\factory;

use Dulcis\Dulcis\model\dal\factory\CreatePdoAdapter;

class CreatePdoAdapterTest extends PHPUnit_Framework_TestCase {
    
    protected $object;
    
    protected function setUp() {
        $this->object = new CreatePdoAdapter();
    }
    
    public function testSetPdoAdapter(){
        $this->assertInstanceOf('PdoAdapter',$this->object->setPdoAdapter('local'));
    }
}
