<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/24
 * Time: 1:32
 */

namespace Dulcis\Test\model\dal\repository\factory;

use PHPUnit_Framework_TestCase;
use Dulcis\Dulcis\model\repository\factory\MemberUoWFactory;
class MemberUoWFactoryTest extends \PHPUnit_Framework_TestCase {

    protected $object;

    protected function setUp(){
        $this->object = new MemberUoWFactory();
    }

    public function testCreate(){
        $this->assertInstanceOf('Dulcis\Dulcis\model\repository\member\MemberUnitOfWork',$this->object->create());
    }
}
 