<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\repository\item;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

 use Dulcis\Dulcis\model\repository\base\UnitOfWorkInterface;
 use Dulcis\Dulcis\model\repository\base\AbstractUnitOfWork;
/**
 * Description of ItemUnitOfWork
 *
 * @author student
 */
class ItemUnitOfWork extends AbstractUnitOfWork implements UnitOfWorkInterface{
    public function fetchByIname($iname);
    public function fetchByGno($gno);
    public function fetchByIno($ino);
}
