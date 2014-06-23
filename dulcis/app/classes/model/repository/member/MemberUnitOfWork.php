<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/23
 * Time: 19:29
 */

namespace Dulcis\Dulcis\model\repository\member;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\repository\base\AbstractUnitOfWork;

class MemberUnitOfWork extends AbstractUnitOfWork implements MemberUnitOfWorkInterface{

    public function fetchByMno($mno){
        return $this->dataMapper->fetchById($mno);
    }

    public function fetchByMname($mname) {
        return $this->dataMapper->fetchAll(array("mname" => $mname));
    }

    public function fetchByMmail($mmail) {
        return $this->dataMapper->fetchByColumns(array("mmail" => $mmail));
    }
}