<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/23
 * Time: 19:38
 */
namespace Dulcis\Test\model\dal\repository\member;

use PHPUnit_Framework_TestCase;
use Dulcis\Dulcis\model\dal\mapper\MemberMapper;
use Dulcis\Dulcis\model\dal\storage\ObjectStorage;
use Dulcis\Dulcis\model\dal\factory\CreatePdoAdapter;
use Dulcis\Dulcis\model\dal\collection\EntityCollection;
use Dulcis\Dulcis\model\repository\member\MemberUnitOfWork;

class MemberUnitOfWorkTest extends \PHPUnit_Framework_TestCase {

    protected $object;
    protected $connect;
    protected $adapter;
    protected $test1;
    protected $test2;
    protected $test3;

    protected function setUp(){
        $this->connect = new CreatePdoAdapter();
        $this->adapter = $this->connect->setPdoAdapter();
        $this->object = new MemberUnitOfWork(new MemberMapper($this->adapter,new EntityCollection(),'member','mno'),new ObjectStorage());
    }
    public function testFetchByMname(){
        $this->test1 = $this->object->fetchByMname('a');
        $this->assertInstanceOf('Dulcis\Dulcis\model\dal\collection\EntityCollection',$this->test1);

    }

    public function testFetchByMmail(){
        $this->test2 = $this->object->fetchByMmail('foo@exsample.com');
        $this->assertInstanceOf('Dulcis\Dulcis\model\entity\members\member',$this->test2);
    }
    public function testFetchByMno(){
        $this->test3 = $this->object->fetchByMno('1');
        $this->assertInstanceOf('Dulcis\Dulcis\model\entity\members\member',$this->test3);
    }
}
 