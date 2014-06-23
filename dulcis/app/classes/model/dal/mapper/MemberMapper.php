<?php
namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');
use Dulcis\Dulcis\model\entity\members\Member;

/**
 * Description of MemberMapper
 *
 * @author dora56
 */
class MemberMapper extends AbstractDataMapper{
    protected function loadEntity(array $row) {
        return new Member(array(
            'id'  => $row["mno"],
            'mpass' => $row["mpass"],
            'mname' => $row["mname"],
            'mmail' => $row["mmail"],
            'mpost' => $row["mpost"],
            'maddress' => $row["maddress"],
            'mtel' => $row["mtel"],
            'mpt' => $row["mpt"],
            'mcard' => $row["mcard"]));
    }
}
