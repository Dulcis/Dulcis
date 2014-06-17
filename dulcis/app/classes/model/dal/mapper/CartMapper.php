<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Dulcis\Dulcis\model\dal\mapper;

require_once(dirname(__FILE__).'/../../../../../../vendor/autoload.php');

use Dulcis\Dulcis\model\entity\cart;
/**
 * Description of CartMapper
 *
 * @author student
 */
class CartMapper extends AbstractDataMapper{

    protected function loadEntity(array $row) {
        return new cart(array(
            "id"    => $row["cno"],
            "mno"  => $row["mno"],
            "ino" => $row["ino"],
            "csum"  => $row["csum"]));
    }

//put your code here
}
