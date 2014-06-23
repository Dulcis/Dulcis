<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\repository\cart;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\repository\base\UnitOfWorkInterface;

/**
 *
 * @author dora56
 */
interface CartUnitOfWorkInterface extends UnitOfWorkInterface{
public function fetchByCnoAndMnoAndIno($cno,$mno,$Ino);
public function fetchByCno($cno);
public function fetchByMno($mno);
public function fetchByIno($ino);
}
