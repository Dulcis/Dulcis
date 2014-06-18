<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 14/06/18
 * Time: 22:51
 */
namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\order\Order;
/**
 * Class OrderMapper
 *
 * @package Dulcis\Dulcis\model\dal\mapper
 */
class OrderMapper extends AbstractDataMapper{

    protected function loadEntity(array $row) {
        return new Order(array(
            'id'  => $row["ono"],
            'mno'  => $row["mno"],
            'oname' => $row["oname"],
            'omail' => $row["onail"],
            'opost' => $row["opost"],
            'oaddress' => $row["oaddress"],
            'otel' => $row["otel"],
            'odate' => $row["odate"],
            'osum' => $row["osum"],
            'ocard' => $row["ocard"],
            'opt' => $row["opt"]));
    }
}