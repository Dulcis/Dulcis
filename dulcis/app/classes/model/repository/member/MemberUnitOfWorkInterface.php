<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/23
 * Time: 19:23
 */

namespace Dulcis\Dulcis\model\repository\member;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\repository\base\UnitOfWorkInterface;

interface MemberUnitOfWorkInterface extends UnitOfWorkInterface{
    public function fetchByMno($mno);
    public function fetchByMname($mname);
    public function fetchByMmail($mmail);

} 