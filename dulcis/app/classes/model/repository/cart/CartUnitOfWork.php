<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dulcis\Dulcis\model\repository\cart;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use \Dulcis\Dulcis\model\repository\base\AbstractUnitOfWork;
/**
 * Description of CartUnitOfWork
 *
 * @author dora56
 */
class CartUnitOfWork extends AbstractUnitOfWork implements CartUnitOfWorkInterface{
    
    public function fetchByCnoAndMnoAndIno($cno, $mno, $ino) {
        
        return $this->dataMapper->fetchByColumns(array("cno" => $cno,
                                                       "mno" => $mno,
                                                       "ino" => $ino));
    }

    public function fecchByIno($ino) {
        return $this->dataMapper->fecthAll(array("ino" => $ino));
    }

    public function fetchByCno($cno) {
        return $this->dataMapper->fecthAll(array("cno" => $cno));
    }

    public function fetchByMno($mno) {
        return $this->dataMapper->fecthAll(array("mno" => $mno));
    }
}
