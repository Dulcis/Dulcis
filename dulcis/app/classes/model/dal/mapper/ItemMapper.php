<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__) . '/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\items\Item;
/**
 * Description of ItemMapper
 *
 * @author student
 */
class ItemMapper extends AbstractDataMapper{
    protected function loadEntity(array $row) {
        return new Item(array(
            "id"    => $row["ino"],
            "iname"  => $row["iname"],
            "gno" => $row["gno"],
            "iprice"  => $row["iprice"],
            "isum"  => $row["isum"],
            "ico"  => $row["ico"],
            "iimg"  => $row["iimg"]));
    }

//put your code here
}
