<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Dulcis\Dulcis\model\repository\item;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\repository\base\UnitOfWorkInterface;
/**
 *
 * @author dora56
 */
interface ItemUnitOfWorkInterface extends UnitOfWorkInterface{
    public function fetchByIno($ino);
    public function fetchByIname($iname);
    public function fetchByGno($gno);
}
