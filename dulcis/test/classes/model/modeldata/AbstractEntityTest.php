<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/05/30
 * Time: 19:14
 */
    require_once '../../../../lib/class_loader.php';

    use modeldata\Member;


class AbstractEntityTest extends PHPUnit_Framework_TestCase {

    private $member;

    public function setUp()
    {
        $this->member = new Member();
    }

    public function TestEntitySetGet() {

        $this->member->setNumber(1);
        $this->member->setName('Hanaoka');
        $this->member->setPassword(11111111);
        $this->member->setEmail('foo@example.com');
        $this->member->setPostnum('111-1111');
        $this->member->setAddress('福岡県福岡市');
        $this->member->setTel(012000000000);
        $this->member->setPoint(100);
        $this->member->setCord('3564356366541111');

        $this->assertEquals(1, $this->member->getNumber());
        $this->assertEquals('Hanaoka', $this->member->getName());
        $this->assertEquals(11111111, $this->member->getPassword());
        $this->assertEquals('foo@example.com', $this->member->getEmail());
        $this->assertEquals('111-1111' ,$this->member->gettPostnum());
        $this->assertEquals('福岡県福岡市', $this->member->getAddress());
        $this->assertEquals(012000000000, $this->member->getTel());
        $this->assertEquals(100, $this->member->getPoint());
        $this->assertEquals(3564356366541111, $this->member->getCord());
    }
}
 